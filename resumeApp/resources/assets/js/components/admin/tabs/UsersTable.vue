<template>
    <v-data-table
            :headers="headers"
            :items="tableUsers"
            sort-by="name"
            class="elevation-1 users-table"
    >
        <template v-slot:top>
            <v-toolbar flat color="white">
                <v-toolbar-title>CIV Users</v-toolbar-title>
                <v-divider
                        class="mx-4"
                        inset
                        vertical
                ></v-divider>
                <v-spacer></v-spacer>
                <v-dialog v-model="dialog" max-width="500px">
                    <template v-slot:activator="{ on }">
                        <v-btn color="primary" dark class="mb-2" v-on="on">Create new user</v-btn>
                    </template>
                    <v-card>
                        <v-card-title>
                            <span class="headline">{{ formTitle }}</span>
                        </v-card-title>

                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col cols="12" sm="6" md="4">
                                        <v-text-field v-model="editedItem.name" label="Name"></v-text-field>
                                        <div  class="error" style="background-color: white !important;"  v-if="errors.name">
                                            {{ Array.isArray(errors.name) ? errors.name[0] : errors.name}}
                                        </div>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                        <v-text-field v-model="editedItem.email" label="Email"></v-text-field>
                                        <div  class="error" style="background-color: white !important;"  v-if="errors.email">
                                            {{ Array.isArray(errors.email) ? errors.email[0] : errors.email}}
                                        </div>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                        <v-text-field v-model="editedItem.username" label="Username"></v-text-field>
                                        <div  class="error" style="background-color: white !important;"  v-if="errors.username">
                                            {{ Array.isArray(errors.username) ? errors.username[0] : errors.username}}
                                        </div>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4" v-show="canEditPassword">
                                        <v-text-field type="password" v-model="editedItem.password" label="Password"></v-text-field>
                                        <div  class="error" style="background-color: white !important;"  v-if="errors.password">
                                            {{ Array.isArray(errors.password) ? errors.password[0] : errors.password}}
                                        </div>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4" v-show="canEditPassword">
                                        <v-text-field type="password" v-model="editedItem.password_confirmation" label="Password Confirmation"></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                            <v-btn color="blue darken-1" text @click="save">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-toolbar>
        </template>
        <template v-slot:item.actions="{ item }">
            <v-icon
                    small
                    v-show="!item.is_admin"
                    class="mr-2"
                    @click="editItem(item)"
            >
                mdi-pencil
            </v-icon>
            <v-icon
                    small
                    v-show="!item.is_admin"
                    @click="deleteItem(item)"
            >
                mdi-delete
            </v-icon>
        </template>
        <template v-slot:item.profileLink="{ item }">
            <div class="NoDecor">
                <a :href="'/workforce-admin/' + item.username + '/resume-builder'" target="_blank">{{item.username}}</a>
            </div>
        </template>
        <template v-slot:item.lastActivity="{ item }">
            {{getElapsedTime(item.last_activity).length > 0 ? getElapsedTime(item.last_activity) : 'a few moments'}} ago
        </template>
        <template v-slot:no-data>
            No available data
        </template>
    </v-data-table>
</template>

<script>

    export default {
        name:'usersTable',
        props:['users'],
        data: () => ({
            dialog: false,
            headers: [
                {
                    text: 'Full name',
                    align: 'start',
                    sortable: false,
                    value: 'name',
                },
                { text: 'Email', value: 'email' },
                { text: 'Link to resume builder', value: 'profileLink'},
                { text: 'Sub. Status', value: '' },
                { text: 'Signup date', value: 'created_at' },
                { text: 'Last activity', value: 'lastActivity' },
                { text: 'Sub. Renewal', value: '' },
                { text: 'Status', value: '', sortable: false },
                { text: 'Notes', value: '', sortable: false },
                { text: 'Actions', value: 'actions', sortable: false },
            ],
            tableUsers: [],
            editedIndex: -1,
            editedItem: {
                id: '',
                name: '',
                email: '',
                username: '',
                password: '',
                password_confirmation: ''
            },
            defaultItem: {
                id: '',
                name: '',
                email: '',
                username: '',
                password: '',
                password_confirmation: ''
            },
            errors:[],
        }),

        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'New User' : 'Edit User'
            },
            canEditPassword(){
                return this.editedIndex === -1;
            }
        },

        watch: {
            dialog (val) {
                val || this.close()
            },
        },

        created () {
            this.initialize()
        },

        methods: {
            initialize () {
                this.tableUsers = this.users ;
            },

            editItem (item) {
                this.editedIndex = this.tableUsers.indexOf(item);
                this.editedItem  = Object.assign({}, item);
                this.dialog = true;
            },

            deleteItem (item) {
                const index = this.tableUsers.indexOf(item);
                if (!confirm('Are you sure you want to permanently delete this user?')) {
                    return;
                }

                // delete item:
                axios.delete('/api/admin/delete-user/' + item.id).then( (response) => {
                    this.$store.dispatch('flyingNotificationDelete');
                    this.tableUsers.splice(index, 1);
                });
            },

            close () {
                this.dialog = false;
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            save () {
                this.errors = [] ;
                if (this.editedIndex > -1) {
                    // edit item
                    axios.put('/api/admin/update-user', this.editedItem)
                        .then( (response) => {
                            Object.assign(this.tableUsers[this.editedIndex], this.editedItem);
                            this.$store.dispatch('flyingNotification');
                            this.close();
                        })
                        .catch(error => {
                            this.canSubmit = true;
                            if (typeof error.response.data === 'object') {
                                this.errors = error.response.data.errors;
                            } else {
                                this.errors = ['Something went wrong. Please try again.'];
                            }
                            this.$store.dispatch('flyingNotification', {
                                message: 'Error',
                                iconSrc: '/images/resume_builder/error.png'
                            });
                        });

                } else {
                    // new item
                    axios.post('/api/admin/create-user', this.editedItem)
                        .then( (response) => {
                            this.tableUsers.push(response.data.user);
                            this.$store.dispatch('flyingNotification');
                            this.close();
                        })
                        .catch(error => {
                            this.canSubmit = true;
                            if (typeof error.response.data === 'object') {
                                this.errors = error.response.data.errors;
                            } else {
                                this.errors = ['Something went wrong. Please try again.'];
                            }
                            this.$store.dispatch('flyingNotification', {
                                message: 'Error',
                                iconSrc: '/images/resume_builder/error.png'
                            });
                        });
                }
            },
            getElapsedTime (timeInSeconds) {
                let days    =  Math.floor(timeInSeconds / 86400);
                let hours   =  Math.floor((timeInSeconds % 86400) / 3600);
                let minutes =  Math.floor(((timeInSeconds % 86400) % 3600) / 60);

                let daysText = '';
                let hoursText = '';
                let minutesText = '';

                if(days === 1 ){
                    daysText = days + ' day '
                }
                if(days > 1){
                    daysText = days + ' days '
                }

                if(hours === 1 ){
                    hoursText = hours + ' hour '
                }
                if(hours > 1){
                    hoursText = hours + ' hours '
                }

                if(minutes === 1 ){
                    minutesText = minutes + ' minute '
                }
                if(minutes > 1){
                    minutesText = minutes + ' minutes '
                }

                return daysText + hoursText + ( days >= 1 ? '' : minutesText) ;
            }
        },

        mounted() {
            // console.log(this.users);
        }
    }
</script>

<style lang="scss" scoped>
    .users-table{
        margin-top: 37px;
    }

    .error{
        color: red;
    }
</style>

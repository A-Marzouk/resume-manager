<template>
    <div>
        <transition-group name="list"
                          class="row">
            <reference-component v-for="(reference,index) in references"
                                 v-bind:key="index"
                                 class="list-item workExperience col-12"
                                 style="margin: 0px 10px 20px;">
        <span class="deleteWorkBtn NoDecor" @click="deleteReference(reference)">
                    <a href="javascript:void(0)">
                        <img src="/images/close_blue.png" alt="edit profile">
                        Delete
                    </a>
                </span>
                <span class="deleteWorkBtn NoDecor" @click="editReference(reference.id)"
                      style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addReferenceModal" data-toggle="modal">
                        <img src="/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">Title
                    : {{reference.title}}</b><br/>
                <div style="color: #30323D;font-family: Roboto;">Details : {{reference.details}}</div>
                <div style="color: #30323D;font-family: Roboto;">Company : {{reference.company}}</div>
                <div style="color: #30323D;font-family: Roboto;">phone : {{reference.phone}}</div>
                <div style="color: #30323D;font-family: Roboto;">email : {{reference.email}}</div>
            </reference-component>
        </transition-group>
        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addReferenceModal">
                <img src="/images/add_blue.png" alt="edit profile">
                Add reference
            </a>
        </span>
        <br/>
        <add-reference-modal @referenceAdded="addReference"
                             :toBeEditedReference="toBeEditedReference"></add-reference-modal>
    </div>
</template>
<script>
    import addReferenceModal from './addReferenceComponent';
    export default {
        props: ['user_id'],
        components:{
            'add-reference-modal' : addReferenceModal
        },
        data() {
            return {
                references: [],
                canAdd: true,
                toBeEditedReference: {
                    'id': '',
                    'user_id': this.user_id,
                    'title': '',
                    'details': '',
                    'name': '',
                    'phone': '',
                    'email': '',
                    'company': ''
                }
            }
        },

        methods: {
            getCurrentReferences() {
                axios.get('/freelancer/references?user_id=' + this.user_id).then(
                    (response) => {
                        let currReferences = response.data;
                        $.each(currReferences, function (i) {
                        });
                        this.references = currReferences;
                        this.checkMaxReferences();
                    }
                );
            },

            addReference(newReference) {
                this.references.push(newReference);
                this.checkMaxReferences();
            },

            deleteReference(reference) {
                if (!confirm('Are you sure you want to delete this reference?')) {
                    return;
                }
                axios.post('/freelancer/deletereference', {referenceID: reference.id}).then((response) => {
                    let references = this.references;
                    $.each(references, function (i) {
                        if (references[i].id === reference.id) {
                            references.splice(i, 1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    }, 2000);

                    this.checkMaxReferences();

                });
            },

            editReference(referenceID) {
                let references = this.references;
                let editedReference = {};

                $.each(references, function (i) {
                    if (references[i].id === referenceID) {
                        editedReference = references[i];
                    }
                });
                this.toBeEditedReference = editedReference;
            },

            checkMaxReferences() {
                if (this.references.length > 4) {
                    this.canAdd = false;
                } else {
                    this.canAdd = true;
                }
            },

            clearData() {
                this.toBeEditedReference = {
                    'id': '',
                    'user_id': this.user_id,
                    'title': '',
                    'details': '',
                    'name': '',
                    'phone': '',
                    'email': '',
                    'company': '',
                };
            },
        },

        created() {
            this.getCurrentReferences();
        }
    }
</script>
<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
    }

    .list-enter-active,
    .list-leave-active {
        transition: all 1s;
    }

    .list-enter,
    .list-leave-to

        /* .list-leave-active below version 2.1.8 */
    {
        opacity: 0;
        transform: translateY(30px);
    }
</style>

<template>
    <div>
        <div class="type-entry-block">
            <div class="upper-bar">
                <div class="type-entry-label d-flex justify-content-between align-items-center w-100">
                    <div class="title">Edit your entry</div>
                    <div class="deleteText" @click="deleteLog">
                        Delete log
                    </div>
                </div>
            </div>
            <div class="entry-input-block">
                <div class="input-container">
                    <status-selector :setStatus="setStatus" :status="logStatusCode[editedLog.status]"></status-selector>
                    <textarea class="entry-input" placeholder="Type your entry here"
                              v-model="editedLog.log_text"></textarea>
                </div>
                <div class="entry-comment">
                    Please don't forget to mention N° of the client (company) in the document
                </div>
                <div v-if="this.errors.entry !== ''" class="error">{{errors.entry}}</div>
                <div v-if="this.errors.status !== ''" class="error">{{errors.status}}</div>

                <br/>

                <div class="btn-container">
                    <button type="button" name="button"
                            class="btn btn-link"
                            v-on:click="() => {entry = ''; clear()}"
                    >CANCEL
                    </button>
                    <button v-on:click="updateEntry" class="btn btn-submit btn-primar"
                            :class="{ disabled: editedLog.log_text === '' }">
                        SAVE ENTRY
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import logStatusSelector from '../Log-status-selector'

    export default {
        props: ['clear', 'log'],
        components: {
            'status-selector': logStatusSelector
        },
        data() {
            return {
                logStatusCode: {
                    1: 'email-request',
                    2: 'call-back',
                    3: 'not-interested',
                    4: 'appointment-set',
                    5: 'contacts-received',
                    6: 'successful',
                },
                errors: {
                    entry: '',
                    status: ''
                },
                editedLog: {
                    'id': this.log.id,
                    'log_text': this.log.log_text,
                    'status': this.log.status,
                }
            }
        },
        methods: {
            updateEntry: function () {
                if (this.editedLog.log_text.trim() === '') {
                    this.errors.entry = 'Entry is empty';
                    return;
                }
                if (this.editedLog.status === '') {
                    this.errors.status = 'Please select status';
                    return;
                }
                axios.post('/agent/logs/update', this.editedLog)
                    .then((response) => {
                        let log = response.data;
                        this.$emit('activityLogUpdated', log);
                        this.clear();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            setStatus(status) {
                this.editedLog.status = Object.keys(this.logStatusCode).find(key => this.logStatusCode[key] === status);
            },
            deleteLog() {
                if (!confirm('Are you sure you want to delete this activity log ?')) {
                    return;
                }
                let logID = this.log.id;
                axios.post('/agent/logs/delete', {log_id: logID})
                    .then((response) => {
                        if (response.data.status === 'success') {
                            this.$emit('activityLogDeleted', logID);
                            this.clear();
                        }
                    })
                    .catch(() => {

                    });
            }
        }
    }

</script>

<style scoped lang="scss">
    .disabled:hover {
        background: #E4E4E4 !important;
    }

    .btn-container {
        margin-top: 10px !important;
    }

    .input-container {
        height: 85px !important;
    }

    .deleteText {
        color: orangered;
        cursor: pointer;
    }

</style>

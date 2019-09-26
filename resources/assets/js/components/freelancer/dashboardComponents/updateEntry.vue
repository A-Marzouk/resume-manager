<template>
    <div>
        <div class="type-entry-block">
            <div class="upper-bar">
                <div class="type-entry-label">
                    <div class="title">Edit your entry</div>
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
        props: ['clear','log'],
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
                    'id' : this.log.id,
                    'log_text' : this.log.log_text,
                    'status' : this.log.status,
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
            }
        }
    }

</script>

<style scoped lang="scss">
    .disabled:hover {
        background: #E4E4E4 !important;
    }

    .btn-container{
        margin-top: 10px!important;
    }
    .input-container{
        height: 85px !important;
    }

</style>

<template>
    <div>
        <div class="type-entry-block">
            <div class="upper-bar">
                <div class="type-entry-label">
                    <div class="title">Type your entry</div>
                </div>
            </div>
            <div class="entry-input-block">
                <div class="input-container">
                    <status-selector :setStatus="setStatus"></status-selector>
                    <textarea class="entry-input" placeholder="Type your entry here"
                              v-model="entryData.log_text"></textarea>
                </div>
                <div class="entry-comment">
                    Please don't forget to mention N° of the client (company) in the document
                </div>
                <div v-if="this.errors.entry !== ''" class="error">{{errors.entry}}</div>
                <div v-if="this.errors.status !== ''" class="error">{{errors.status}}</div>
                <!--<div class="add-recording-action">-->
                <!--<a href="javascript:void(0);">ADD RECORDING</a>-->
                <!--</div>-->
                <br/>

                <!--<div>-->
                <!--<div class="">-->
                <!--<div class="upper-bar">-->
                <!--<div class="type-document-label">-->
                <!--<div class="title">Document link</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="document-input-block">-->
                <!--<input type="text" class="document-input" placeholder="Add a document link">-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->


                <div class="btn-container">
                    <button type="button" name="button"
                            class="btn btn-link"
                            v-on:click="() => {entry = ''; clear()}"
                    >CANCEL
                    </button>
                    <button v-on:click="addEntry" class="btn btn-submit btn-primar"
                            :class="{ disabled: entryData.log_text === '' }">
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
        props: ['clear', 'campaign_id', 'agent_id'],
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
                entryData: {
                    log_text: '',
                    status: '',
                    agent_id: this.agent_id,
                    campaign_id: this.campaign_id
                }
            }
        },
        methods: {
            addEntry: function () {
                if (this.entryData.log_text.trim() === '') {
                    this.errors.entry = 'Entry is empty';
                    return;
                }
                if (this.entryData.status === '') {
                    this.errors.status = 'Please select status';
                    return;
                }
                axios.post('/agent/logs/add', this.entryData)
                    .then((response) => {
                        let log = response.data;
                        this.$emit('activityLogAdded', log);
                        this.clearEntryData();
                        this.clear();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            setStatus(status) {
                this.entryData.status = Object.keys(this.logStatusCode).find(key => this.logStatusCode[key] === status);
            },
            clearEntryData() {
                this.entryData = {
                    log_text: '',
                    status: '',
                    agent_id: this.agent_id,
                    campaign_id: this.campaign_id
                }
            }
        }
    }

</script>

<style scoped lang="scss">
    .disabled:hover {
        background: #E4E4E4 !important;
    }
</style>

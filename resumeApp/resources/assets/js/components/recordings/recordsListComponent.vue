<template>
    <div>
        <transition-group name="list" class="row">
            <record-component v-for="(record,index) in records" v-bind:key="index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">

                <span class="deleteWorkBtn NoDecor" @click="deleteRecord(record)">
                    <a href="javascript:void(0)">
                        <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                        Delete
                    </a>
                </span>

                <span class="deleteWorkBtn NoDecor"  @click="editRecord(record.id)" style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addRecordModal"  data-toggle="modal">
                        <img src="/resumeApp/resources/assets/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>
                <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">{{record.title}}</b><br/>
                <div  style="color: #30323D;font-family: Roboto;">{{record.transcription}}</div>
                <div  style="color: #30323D;font-family: Roboto;">{{record.src}}</div>
            </record-component>
        </transition-group>

        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addRecordModal">
                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile">
                Add record
            </a>
        </span>
        <br/>
        <add-record-modal @recordAdded="addRecord" :toBeEditedRecord="toBeEditedRecord"></add-record-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                records: [],
                canAdd:true,
                toBeEditedRecord:{
                    'id':'',
                    'title' :'',
                    'transcription':'',
                }
            }
        },

        methods: {
            getCurrentRecords() {
                axios.get('/freelancer/records').then(
                    (response) => {
                        let currRecords =  response.data;
                        $.each(currRecords, function(i){
                            
                        });
                        this.records = currRecords;
                        this.checkMaxRecords();
                    }
                );
            },

            addRecord(newRecord) {
                this.records.push(newRecord);
                this.checkMaxRecords();
            },

            deleteRecord(record){
                if(!confirm('Are you sure you want to delete this record?')){
                    return;
                }
                axios.post('/freelancer/deleterecord',{recordID:record.id}).then((response)=>{
                    let records = this.records;
                    $.each(records, function(i){
                        if(records[i].id === record.id) {
                            records.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxRecords();

                });
            },

            editRecord(recordID){
                let records = this.records;
                let editedRecord =  {};

                $.each(records, function(i){
                    if(records[i].id === recordID){
                        editedRecord = records[i];
                    }
                });
                this.toBeEditedRecord = editedRecord;
            },

            checkMaxRecords(){
                if(this.records.length > 4){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },

            clearData(){
                this.toBeEditedRecord={
                        'id':'',
                        'title' :'',
                        'transcription':'',
                        'src' :'',
                };
            }
        },

        created() {
            this.getCurrentRecords();
        }
    }
</script>

<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
    }
    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
</style>
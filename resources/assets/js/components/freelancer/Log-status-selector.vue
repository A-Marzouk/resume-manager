<template>
    <div>
        <div class="status-selector-component">
            <div class="status-list" v-bind:class="{ show: showStatusList }" >
                <div class="status-component">
                    <a v-on:click="selectStatus('email-request')" href="javascript:void(0)" class="icon email-request">ER</a>
                    <span class="icon-name">E-mail<br>request</span>
                </div>
                <div class="status-component">
                    <a  v-on:click="selectStatus('call-back')" href="javascript:void(0)" class="icon call-back">CB</a>
                    <span class="icon-name">Call back</span>
                </div>
                <div class="status-component">
                    <a  v-on:click="selectStatus('not-interested')"  href="javascript:void(0)" class="icon not-interested">NI</a>
                    <span class="icon-name">Not<br>interested</span>
                </div>
                <div class="status-component">
                    <a v-on:click="selectStatus('appointment-set')"  href="javascript:void(0)"  style="background: #8567FF;" class="icon">AS</a>
                    <span class="icon-name">Appointment<br>set</span>
                </div>
                <div class="status-component">
                    <a  v-on:click="selectStatus('contacts-received')" href="javascript:void(0)"  style="background: #4ABFF1;" class="icon">CR</a>
                    <span class="icon-name">Decission<br>maker<br>contacts received</span>
                </div>
                <div class="status-component">
                    <a  v-on:click="selectStatus('successful')"  href="javascript:void(0)"  style="background: #2ABD68;" class="icon">S</a>
                    <span class="icon-name">Successful</span>
                </div>
            </div>
        </div>
        <div class="status-selector-component" style="position: center; top: 0px;">
            <a href="javascript:void(0)" v-on:click="showStatusList = !showStatusList" class="recording-status icon" v-bind:class="selectedStatus">{{ printStatus() }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'status','setStatus'
        ],
        data () {
            return {
                showStatusList: false,
                selectedStatus: this.status || 'status-default',
                currentStatus:'',
            }
        },
        methods: {
            printStatus: function () {
                let splittedStatusName = this.selectedStatus.split('-')
                return this.selectedStatus !== 'status-default' ? (splittedStatusName.length > 1) ? splittedStatusName[0].charAt(0).toUpperCase() + splittedStatusName[1].charAt(0).toUpperCase() : splittedStatusName[0].charAt(0).toUpperCase() : 'S'
            },
            selectStatus(selectedStatus){
                this.selectedStatus = selectedStatus;
                this.showStatusList = !this.showStatusList ;
                this.setStatus(selectedStatus);
            }
        },
        watch: {
            selectedStatus: function (status) {
                if (this.currentStatus !== null || this.currentStatus !== undefined) {
                    if(status === 'successful'){
                        this.currentStatus = true ;
                    }
                    else {
                        this.currentStatus = false ;
                    }
                }
            }
        }
    }
</script>


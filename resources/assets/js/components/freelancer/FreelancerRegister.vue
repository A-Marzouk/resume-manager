<template>
    <div class="d-flex justify-content-center flex-column align-items-center">
        <div class="account-info-edit-wrapper">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/admin/agents">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    <span v-if="step !== 6">AGENT REGISTER</span>
                    <span v-else>REGISTRATION COMPLETED</span>
                </div>
            </nav>
            <keep-alive>
                <router-view :changeStep="changeStep" :getData="getData" @formReady="submitForm"></router-view>
            </keep-alive>
            <span v-if="step !== 6" class="step-footer">Step {{ step }} / 5</span>
        </div>

        <div class="pt-3 no-decoration d-flex justify-content-center base-text align-items-center">
            Already have an account ? <a href="#" class="ml-2 base-link"> LOG IN </a>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                step: 1,
                formData: {},
                canSubmit: false,
                errors:[]
            }
        },
        methods:{
            submitForm(){
                if($('#submitBtnWrapper').hasClass('disabled-btn')){
                    return ;
                }
                this.canSubmit = false;
                let form_data = new FormData();
                form_data.append('recordingFile', this.formData.resumeData.recordingFile);
                form_data.append('resumeFile', this.formData.resumeData.resumeFile);
                form_data.append('profilePicture', this.formData.profileData.profilePicture);

                form_data.append('resumeData', JSON.stringify(this.formData.resumeData));
                form_data.append('personalData', JSON.stringify(this.formData.personalData));
                form_data.append('professionalData', JSON.stringify(this.formData.professionalData));

                form_data.append('password', this.formData.password);
                form_data.append('password2', this.formData.password2);

                axios.post('/agent/register/submit',
                    form_data).then( (response) => {
                    if(response.data.status === 'success'){
                        // redirect to admin
                        window.location.replace('/freelancer/register/completed')
                    }
                    this.errors = response.data.errors;
                });
            },
            clearInput(inputName){
                this.formData[inputName] = '' ;
            },
            changeStep(step) {
                this.step = step
            },
            getData(data) {
                this.formData = {...this.formData, ...data}
            }
        },
        watch: {
            formData: {
                handler(){
                    // check if all formData values are filled
                    let values = Object.values(this.formData);
                    let isAll_filled = true;
                    for (const section of values) {
                        for (let value in section) {
                            if (value.trim() !== '') {
                                isAll_filled = false;
                                break
                            }
                        }
                        if (!isAll_filled) break
                    }
                    this.canSubmit = isAll_filled;
                },
                deep: true
            },
            $route: {
                handler (val, oldVal) {
                    let splittedPath = val.path.split('/')
                    if (splittedPath[3] === '') this.step = 1
                    else this.step = splittedPath[3].charAt(4)
                }
            }
        }
    }
</script>

<style scoped>
    .error{
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 30px;/* identical to box height, or 187% */
        color: #F56F6F;
    }
</style>

<template>
    <div class="d-flex justify-content-center flex-column align-items-center">
        <div class="account-info-edit-wrapper">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/">
                        <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    BECOME AN AGENT
                </div>
            </nav>
            <keep-alive>
                <router-view :changeStep="changeStep" :getData="getData" ></router-view>
            </keep-alive>
            <span class="step-footer">Step {{ step }} / 5</span>
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
                axios.post('/freelancer/register/submit',this.formData).then( (response) => {
                    if(response.data.status === 'success'){
                        // redirect to client dashboard
                        window.location.href = '/freelancer';
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
                    for (const value of values) {
                        if (value.trim().length < 1) {
                            isAll_filled = false;
                            break
                        }
                    }
                    this.canSubmit = isAll_filled;
                },
                deep: true
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
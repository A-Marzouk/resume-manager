<template>
    <div class="d-flex flex-column align-items-start pl-5 pr-5">
        <h2>Please upload your cv in pdf format </h2>
        <hr>
        <div class="form-group">
            <input type="file" ref="file" @change="handleFileUpload">
        </div>
        <a href="javascript:void(0)" class="btn btn-dark" @click="uploadPDFFile">
            Extract text
        </a>

        <div class="border-dark m-3 p-2" style="white-space: pre-line; border: 1px dotted;" v-show="extractedText.length > 0">
            {{extractedText}}
        </div>

        <div v-show="errors.pdf_cv" style="color: red;" class="mt-3">
            {{errors.pdf_cv}}
        </div>
    </div>
</template>

<script>
    export default {
        name: "ExtractTextFromPDF",
        data(){
            return{
                file: '',
                extractedText: '',
                errors:[]
            }
        },
        methods:{
            uploadPDFFile(){
                this.errors = [] ;
                let formData = new FormData() ;
                formData.append('pdf_cv', this.file);
                axios.post('/pdf/extract-text',formData)
                    .then((response) => {
                        console.log(response.data);
                        if (response.data.length > 0) {
                            this.extractedText = response.data ;
                        }else{
                            this.extractedText = 'This file does not contain any text to be extracted!' ;
                        }
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                            console.log(this.errors);
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
            },
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>

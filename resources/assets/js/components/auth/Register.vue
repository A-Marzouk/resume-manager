<template>
    <v-app style="width:100%;" class="app-container">

        <v-container>
            <div class="main-bar">
                <a class="back-btn" href="/">
                    <img src="/images/back-btn.png" alt="back btn">
                </a>
                <div class="home-text">
                    <a href="/">
                        HOME
                    </a>
                </div>
            </div>
        </v-container>

        <!-- main container -->
        <v-container class="main-container">
            <register-form></register-form>
        </v-container>
    </v-app>
</template>

<script>
    import RegisterForm from './partials/RegisterForm'
    export default {
        name: "Register",
        components:{
            'register-form' : RegisterForm
        },
    }
</script>


<style lang="scss" scoped>
    .main-bar{
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        padding:  25px 25px 0 25px;

        .back-btn{
            img{
                width: 54px;
                height: 54px;
            }
            &:hover{
                cursor: pointer;
            }
        }

        .home-text{
            a{
                font-family: Montserrat, sans-serif;
                font-style: normal;
                font-weight: bold;
                font-size: 18px;
                line-height: 22px;
                color: #0046FE;

                &:hover{
                    text-decoration: none;
                }
            }
        }
    }
</style>


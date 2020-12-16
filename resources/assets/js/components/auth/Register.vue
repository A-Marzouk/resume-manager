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


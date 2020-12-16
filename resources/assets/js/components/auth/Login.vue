<template>
    <v-app style="width:100%;" class="app-container">
        <!-- main container -->
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

        <v-container style="margin-top: 40px;">
            <login-form></login-form>
        </v-container>
    </v-app>
</template>

<script>
    import LoginForm from "./partials/LoginForm";
    export default {
        name: "Login",
        components: {
            "login-form": LoginForm
        }
    };
</script>
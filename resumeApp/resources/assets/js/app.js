
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-message', require('./components/chatMessage.vue'));
Vue.component('chat-log', require('./components/chatLog.vue'));
Vue.component('chat-composer', require('./components/chatComposer.vue'));

const app = new Vue({
    el: '#app',
    data:{
        messages:[],
        usersInRoom:[],
    },
    methods:{
        addMessage(message){
            // add to the existing messages
            // message.created_at = new Date();
            this.messages.push({
                message:message.message,
                created_at:'just now',
                user:{
                    firstName:''
                },
                client:{
                    firstName:''
                },
                visitor:{
                    firstName:''
                }
            });
            //scroll down :
            $('#chatBox').animate({scrollTop: $('#chatBox')[0].scrollHeight}, 'slow');
            // save to DB and so on.
            axios.post('/messages',message);
        }
    },
    created(){
        axios.get('/messages/').then(response =>{
            this.messages = response.data;
        });

        Echo.channel('talkToSales')
            .listen('MessagePosted',(e) =>{
                // handle event here
                // console.log(e.message);
                // this.messages.push({
                //     message:e.message.message,
                //     created_at:e.message.created_at,
                //     user: e.user
                // });
                axios.get('/messages/').then(response =>{
                    this.messages = response.data;
                });
            })

    }
});

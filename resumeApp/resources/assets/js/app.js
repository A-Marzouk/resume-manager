
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
        usersInRoom:[]
    },
    methods:{
        addMessage(message){
            // add to the existing messages
            // this.messages.push(message);
            // save to DB and so on.
            axios.post('/messages',message);
        }
    },
    created(){
        axios.get('/messages').then(response =>{
            this.messages = response.data;
        });

        Echo.channel('talkToSales')
            // .here((users) => {
            //     this.usersInRoom = users;
            // })
            // .leaving((user)=>{
            //     this.usersInRoom = this.usersInRoom.filter(u => u !== user);
            // })
            // .joining((user)=> {
            //     this.usersInRoom.push(user);
            // })
            .listen('MessagePosted',(e) =>{
                // handle event here
                this.messages.push({
                    message:e.message.message,
                    created_at:e.message.created_at,
                    user: e.user
                })
            })

    }
});

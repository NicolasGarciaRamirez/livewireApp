require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Vue from 'vue';
import chat from './chat.vue';

const app = new Vue({
    el: '#app',
    data(){
        return {
            messages: [],
            newMessage: ''
        }
    },
    created(){
        this.fetchMessages()
        Echo.private('chat').listen('MessageSendEvent', (e) => {
            console.log(e)
            this.message.push({
                message: e.message.message,
                user: e.user
            })
        })
    },
    methods:{
        
        fetchMessages(){
            console.log('fetch mesages');
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message){
            console.log('add message');
            axios.post('/messages', {message}).then(response =>{
                this.messages.push({
                    message: response.data.message.message,
                    user: response.data.user
                });
            });
        },

        sendMessage(){
            console.log('sendMessage');
            this.addMessage(this.newMessage);
            this.newMessage = '';
        }
    }
})

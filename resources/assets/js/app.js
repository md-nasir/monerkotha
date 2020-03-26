/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'

Vue.use(VueChatScroll)

Vue.component('messagebox', require('./components/MessageBox.vue'));

const app = new Vue({
    el: '#app',
    data: {
        message: '',
        conversation: {
            message: [],
            user: [],
            msgtype: [],
            time: []
        },
    },
    methods: {
        sendMessage() {
            if (this.message.length) {
                axios.post('/send', {
                    message: this.message,
                })
                    .then(response => {
                        this.conversation.message.push(this.message);
                        this.conversation.msgtype.push('outgoing');
                        this.conversation.time.push(this.getTime());
                        this.message = ''
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        getTime() {
            return new Date().toLocaleString();
        },
    },
    mounted() {
        Echo.private('monerkotha')
            .listen('ConversationEvent', (e) => {
                this.conversation.message.push(e.message);
                this.conversation.user.push(e.user);
                this.conversation.msgtype.push('incomming');
                this.conversation.time.push(this.getTime());
            });
    }
});

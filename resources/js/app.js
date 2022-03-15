require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Vue from 'vue';
import chat from './chat.vue';

const app = new Vue({
    el: '#app',
})

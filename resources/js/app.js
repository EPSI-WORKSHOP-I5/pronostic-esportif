// TODO Refactor apps to proper components. This will be the main file.

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import router from './router/index';
import BootstrapVue from 'bootstrap-vue';

// TODO Refactor bootstrap v3 to Vue's v4

Vue.use(BootstrapVue);

new Vue({
    el: "#app",
    router,

    mounted() {
        console.log('app.js is here');
    }
});
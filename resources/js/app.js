

require('./bootstrap');

window.Vue = require('vue').default;
import router from './routes.js';
import VueRouter from 'vue-router';
import storeDefinition from './store.js';
import Vuex from 'vuex';
import Vue from 'vue';



import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css';



Vue.component('App', require('./components/App.vue').default);

Vue.use(VueRouter);
Vue.use(VueSweetalert2);


const store = new Vuex.Store(storeDefinition);

const app = new Vue({
    el: '#app',
    router,
    store,
});

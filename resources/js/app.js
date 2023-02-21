require('./bootstrap');
const { h } = require("vue");

// window.Vue = require('vue');
import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import PageHome from './pages/PageHome';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'home',
        component: PageHome,
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

new Vue({
    el: '#root',
    render: h => h(App),
    router
});

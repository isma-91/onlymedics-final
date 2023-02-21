require('./bootstrap');
const { h } = require("vue");

// window.Vue = require('vue');
import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import PageHome from './pages/PageHome';
import PageSearchDoctors from './pages/PageSearchDoctors';
import PageDoctor from './pages/PageDoctor';
import PageMessage from './pages/PageMessage';
import PageReview from './pages/PageReview';


Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "home",
        component: PageHome,
    },
    {
        path: "/users",
        name: "pageDoctors",
        component: PageSearchDoctors,
    },
    {
        path: "/users/:id",
        name: "pageDocProfile",
        component: PageDoctor,
        props: true,
    },
    {
        path: "/users/:id/message",
        name: "msgToDoc",
        component: PageMessage,
        props: true,
    },
    {
        path: "/users/:id/review",
        name: "reviewToDoc",
        component: PageReview,
        props: true,
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
})

new Vue({
    el: '#root',
    render: h => h(App),
    router
});

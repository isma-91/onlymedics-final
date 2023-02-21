require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue';
import App from './App';


new Vue({
    el: '#root',
    render: h => h(App),
});

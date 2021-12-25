

require('./bootstrap');

// window.Vue = require('vue').default;
import Vue from 'vue'
import VueRouter from 'vue-router'


// router setup
import {routes} from './routes/routes';







// configure router
const router = new VueRouter({
    routes,
     // mode: 'history',
     // base: '/',
    // scrollBehavior () {
    //     return { x: 0, y: 0 }
    // },

});






Vue.use(VueRouter);




Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-master', require('./components/admin/adminmaster').default);


const app = new Vue({
    el: '#app',
    router
});

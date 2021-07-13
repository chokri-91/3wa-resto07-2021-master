import Vue from 'vue';
import VueRouter from 'vue-router';

import OrderIndex from "./views/OrderIndex.vue";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/order/index', component:  OrderIndex }
    ],
    mode: 'history'
});
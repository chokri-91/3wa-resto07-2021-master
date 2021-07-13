import Vue from 'vue';
import VueRouter from 'vue-router';

import OrderIndex from "./views/OrderIndex.vue";
import Cart from "./views/Cart.vue";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/order/index', component:  OrderIndex },
        { path: '/order/cart', component:  Cart }
    ],
    mode: 'history'
});
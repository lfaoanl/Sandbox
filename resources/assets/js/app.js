import Vue from 'vue';
import VueRouter from 'vue-router';
import Layout from './views/Layout.vue';
import routes from './utils/routes.js';
import axios from 'axios';
import './components/imports';


let token                                                = document.head.querySelector('meta[name="csrf-token"]');
window.axios                                             = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN']     = token.content;

Vue.use(VueRouter);
const router = new VueRouter({
	routes,
	mode:             'history',
	leaveActiveClass: 'is-active',
});
const App    = new Vue({
	el:         '#sandbox',
	router,
	template:   `<Layout/>`,
	components: { Layout },
});
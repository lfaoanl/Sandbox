import Vue from 'vue';

Vue.prototype.$toast = require('./Toast.js');
Vue.component('toast',  require('./Toast.vue'));

Vue.component('f-form',  require('./Form/Form.vue'));
Vue.component('f-input', require('./Form/Input.vue'));



require('./bootstrap');

window.Vue = require('vue');



Vue.component('main-component', require('./Main.vue').default);


const app = new Vue({
    el: '#app',
});

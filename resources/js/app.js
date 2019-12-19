require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('calendar-component', require('./components/SubCalendarComponent.vue').default);

const app = new Vue({
    el: '#app'
});
require('./bootstrap');

window.Vue = require('vue');


// 追加
Vue.component('single-calendar', require('./components/SingleCalendar.vue').default);
Vue.component('gantt-chart', require('./components/GanttChart.vue').default);

const app = new Vue({
    el: '#app'
});
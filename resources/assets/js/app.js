
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../../node_modules/jquery/dist/jquery.min.js');
require('./tabs');
require('./custom/popper.js/popper.js');
require('./custom/perfect-scrollbar/js/perfect-scrollbar.jquery.js');
// require('./custom/moment/moment.js');
require('./custom/d3/d3.js');
// require('./custom/rickshaw/rickshaw.min.js');
// require('./custom/gmaps/gmaps.js');
require('./custom/chart.js/Chart.js');
require('./custom/katniss.js');
require('./custom/ResizeSensor.js');
require('./custom/dashboard.js');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

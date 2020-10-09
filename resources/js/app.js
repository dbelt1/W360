
require('./bootstrap');

window.Vue = require('vue');
import Form from './Form'
window.Form = Form


Vue.component('form-component', require('./components/FormComponent.vue').default);



const app = new Vue({
    el: '#app',
});

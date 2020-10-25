

require('./bootstrap');
window.Vue = require('vue');


Vue.component('example-poi', require('./components/ExampleComponent.vue').default);
Vue.component('quiz-component', require('./components/QuizComponent.vue').default);


const app = new Vue({
    el: '#app',
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
    el: '#app',
    data: {

        show: false,
        colTitle: false,
        listCol: false,
        listCard: false,
        listCom: true,
        addListShow: false,
        x: 0,
        y: 0,

    },
    methods: {
        closeAll: function closeAll() {
            this.show = false;
            this.addListShow = false;
        },
        ghostMethod: function (event) {
            this.x = event.pageX;
            this.y = event.pageY;
            this.addListShow = true,
                console.log(this.x, this.y);

        }
    }
});

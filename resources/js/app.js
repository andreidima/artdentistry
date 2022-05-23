/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

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
Vue.component('vue2-datepicker', require('./components/DatePicker.vue').default);
Vue.component('vue-signature-pad', require('./components/VueSignaturePad.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if (document.querySelector('#app')) {
    const app = new Vue({
        el: '#app'
    });
}

if (document.querySelector('#app1')) {
    const app1 = new Vue({
        el: '#app1',
        data: {
            rezultate_consultatie: ((typeof rezultateConsultatie !== 'undefined') ? ((rezultateConsultatie == "true") ? true : false) : false)
        },
    });
}

// if (document.querySelector('#programare')) {
//     const app1 = new Vue({
//         el: '#programare',
//         data: {
//             servicii: servicii,
//             servicii_selectate: serviciiSelectate
//         },
//         methods: {
//             select: function (value, event) {
//                 servicii_selectate = this.servicii_selectate;

//                 if (event.target.checked) {
//                     this.servicii.forEach(function (serviciu) {
//                         if (serviciu.categorie_id == value) {
//                             if (!servicii_selectate.includes(serviciu.id)) {
//                                 servicii_selectate.push(serviciu.id);
//                                 console.log(serviciu.id);
//                             }
//                             console.log(servicii_selectate);
//                             // console.log(this.servicii_selectate[i].categorie_id);
//                         }
//                     });
//                 } else {
//                     this.servicii.forEach(function (serviciu) {
//                         if (serviciu.categorie_id == value) {
//                             for (var i = servicii_selectate.length - 1; i >= 0; i--) {
//                                 if (servicii_selectate[i] == serviciu.id) {
//                                     servicii_selectate.splice(i, 1);
//                                 }
//                                 // console.log(i);
//                                 // console.log(this.servicii_selectate[i].categorie_id);
//                             }
//                         }
//                     });
//                 }

//                 this.servicii_selectate = servicii_selectate;
//             }
//         },
//     });
// }

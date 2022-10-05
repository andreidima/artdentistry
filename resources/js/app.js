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
Vue.component('vue-tiptap', require('./components/Tiptap.vue').default);
Vue.component('tinymce-vue', require('./components/TinyMCE.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if (document.querySelector('#app')) {
    const app = new Vue({
        el: '#app'
    });
};

if (document.querySelector('#programare')) {
    const app = new Vue({
        el: '#programare',
        data: {
            rezultate_consultatie: ((typeof rezultateConsultatie !== 'undefined') ? ((rezultateConsultatie == "true") ? true : false) : false),

            fise_de_tratament: fiseDeTratament,
            fisa_de_tratament_nume_autocomplete: '',
            fise_de_tratament_lista_autocomplete: [],
            fisa_de_tratament_id: fisaDeTratamentIdVechi,
        },
        created: function () {
            if (this.fisa_de_tratament_id) {
                this.fisa_de_tratament_nume_autocomplete = this.fise_de_tratament.find(item => item.id === this.fisa_de_tratament_id).nume;
            }
        },
        methods: {

            // Autocomplete pentru datele pacientului folosind fise_de_tratament trime din start in vuejs
            autoComplete: function () {
                this.fise_de_tratament_lista_autocomplete = [];
                if (this.fisa_de_tratament_nume_autocomplete.length > 2) {
                    for (var i = 0; i < this.fise_de_tratament.length; i++) {
                        if (this.fise_de_tratament[i].nume.toLowerCase().includes(this.fisa_de_tratament_nume_autocomplete.toLowerCase())) {
                            this.fise_de_tratament_lista_autocomplete.push(this.fise_de_tratament[i]);
                        }
                    }
                }
            },
        }
    });
};

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

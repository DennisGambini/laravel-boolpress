/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

const imagePreview = document.getElementById('imagePreview');
const fileBtn = document.getElementById('image');

fileBtn.addEventListener('change', preview);

console.log(imagePreview)

function preview() {
    // inizializzo ogg reader
    let reader = new FileReader();

    console.log('0 : ', reader)

    // gli do la proprietà di aver letto come url questa immagine specifica
    reader.readAsDataURL(document.getElementById("image").files[0]);

    console.log('1 : ',reader)
    
    console.log('2 : ',reader.result)
    
    // dico che l'evento reader.onload produce l'effetto di :
    reader.onload = function (mioEvento) { //catturare l'evento in questione
            console.log('3 : ',mioEvento)
    
        document.getElementById("imagePreview")//prendere l'elemento imm
            .src = mioEvento.target.result;//dargli in pasto il target dell'evento (che è l'onload di reader)
        };
}

console.log('tua madra')


/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const app = new Vue({
    el: '#app',
    delimiters : ['[[', ']]'], //Versão 2.0 do VUE
    data : {
        phrases : []
    },
    mounted(){
        Vue.http.get('/all').then((response) => {
            this.phrases = response.data;
        });


    },
    methods: {
        excluir: function (id) {
            if(confirm('Você tem certeza que deseja excluir?')){
                Vue.http.get(`delete/${id}`).then((response) => {
                    this.frases();
                });
            }

        },//Acabou o método excluir
        frases: function () {
            Vue.http.get('/all').then((response) => {
                this.phrases = response.data;
            });
        }
    }
});

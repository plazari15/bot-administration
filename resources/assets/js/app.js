
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
        phrases : [],
        phrasesAproved : []
    },
    mounted(){
        Vue.http.get('/all').then((response) => {
            this.phrases = response.data;
        });

        Vue.http.get('/frases/aprovadas').then((response) => {
            this.phrasesAproved = response.data;
        });

        //Vai entrar em uma das salas
        Echo.channel('nova-frase')
            .listen('NewPhraseEvent', (e) => {
                this.frases();
            })

    },
    methods: {
        excluir: function (id) {
            if(confirm('Você tem certeza que deseja excluir?')){
                Vue.http.get(`delete/${id}`).then((response) => {
                    this.frases();
                    this.aprovadas();
                });
            }
        },//Acabou o método excluir
        frases: function () {
            Vue.http.get('/all').then((response) => {
                this.phrases = response.data;
            });
        }, //acabou o método frases
        aprovadas: function () {
            Vue.http.get('/frases/aprovadas').then((response) => {
                this.phrasesAproved = response.data;
            });
        }, //Fim do método frases aprovadas
        aprovar: function (id) {
            if(confirm('Você tem certeza que deseja aprovar esta frase?')){
                Vue.http.get(`aprove/${id}`).then((response) => {
                    this.frases();
                    this.aprovadas();
                });
            }
        }, //fim do aprovar
        disapprove: function (id) {
            if(confirm('Deseja de fato reprovar esta frase')){
                Vue.http.get(`/disapprove/${id}`).then((response) =>{
                    this.frases();
                    this.aprovadas();
                });
            }
        }
    }
});
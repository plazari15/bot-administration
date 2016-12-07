<template>
    <div>
        <div class="panel-body" v-if="trashPhrases.length === 0">
            <p>Nenhuma frase na lixeira! Que sucesso!</p>
        </div>

        <table class="table" v-if="trashPhrases.length > 0">
            <thead>
                <tr>
                    <td>Autor:</td>
                    <td>Frase:</td>
                    <td>Enviada:</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                <tr v-for="phrase in trashPhrases">
                    <td>{{ phrase.author }}</td>
                    <td>{{ phrase.phrase }}</td>
                    <td>{{ phrase.created_at }}</td>
                    <td><div v-on:click="permadelete( phrase.id )"><i class="fa fa-trash" aria-hidden="true"></i><div></td>
                    <td><div v-on:click="restore(  phrase.id )"><i class="fa fa-undo" aria-hidden="true"></i></div></td>
                </tr>
            </tbody>
        </table>

    </div>

</template>
<script>
    export default{
        data(){
            return{
                trashPhrases: [],
            }
        },
        mounted(){
            this.trashed();

           Echo.channel('nova-frase')
            .listen('PermanentDelete', (e) => {
                this.trashed();
            })
        },
        methods:{
            trashed: function(){
                Vue.http.get('/frases/trash').then((response) => {
                    this.trashPhrases = response.data;
                });
            },
            restore: function (id) {
                if(confirm('Você tem certeza que deseja restaurar?')){
                    Vue.http.get(`restore/${id}`).then((response) => {
                        this.trashed();
                    });
                }
            },//Acabou o método excluir
            permadelete: function (id) {
                if(confirm('Você tem certeza que deseja Excluir?')){
                    Vue.http.get(`permadelete/${id}`).then((response) => {
                        this.trashed();
                    });
                }
            },//Acabou o método excluir
        }
    }
</script>

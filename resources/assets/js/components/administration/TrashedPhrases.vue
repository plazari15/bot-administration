<template>
    <div>
        <div class="panel-body" v-if="trashPhrases.length === 0">
            <p>Nenhuma frase na lixeira! Que sucesso!</p>
        </div>

        <table class="table" v-if="trashPhrases.length > 0">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Enviada por:</td>
                    <td>Autor:</td>
                    <td>Frase:</td>
                    <td>Enviada:</td>
                </tr>
            </thead>

            <tbody>
                <tr v-for="phrase in trashPhrases">
                    <td>{{ phrase.id }}</td>
                    <td>{{ phrase.user.name }}</td>
                    <td>{{ phrase.author }}</td>
                    <td>{{ phrase.phrase }}</td>
                    <td>{{ phrase.created_at }}</td>
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
        },
        methods:{
            trashed: function(){
                Vue.http.get('/frases/trash').then((response) => {
                    this.trashPhrases = response.data;
                });
            }
        }
    }
</script>

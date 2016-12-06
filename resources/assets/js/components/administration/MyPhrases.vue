<style scoped>

</style>
<template>
    <div>
        <div class="panel-body">
            <div v-if="MyPhrases.length === 0">
                [[ MyPhrases.length ]]
                <p>Você ainda não enviou nenhuma frase. Envie sua frase =D </p>
            </div>
            <table class="table" v-if="MyPhrases.length > 0">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Autor</td>
                        <td>Enviada por</td>
                        <td>Frase</td>
                        <td>Visualizações</td>
                        <!--{{&#45;&#45;<td>Ações</td>-->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="phrase in MyPhrases">
                        <td>{{ phrase.id }}</td>
                        <td>{{ phrase.author }}</td>
                        <td>{{ phrase.user.name }}</td>
                        <td>{{ phrase.phrase }}</td>
                        <td>{{ phrase.visualizado }}</td>
                        <!--{{&#45;&#45;<td><span v-on:click="excluir([[ phrase.id ]])" style="cursor: pointer;"><i class="fa fa-trash" aria-hidden="true"></i></span></td>&#45;&#45;}}-->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                MyPhrases : [],
                nome : nome
            }
        },
        mounted(){
            this.carregar();
        },
        methods:{
            carregar: function(){
                Vue.http.get('/my').then((response) => {
                    this.MyPhrases = response.data;
                });
            },
        }
    }
</script>

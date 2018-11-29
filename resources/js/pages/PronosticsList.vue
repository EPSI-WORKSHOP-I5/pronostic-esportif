<template>
    <div class="container">
        <pronostic v-for="pronostic in pronos" v-bind:pronostic="pronostic" v-bind:key="pronostic.id"></pronostic>
    </div>
</template>

<script>
    import Pronostic from "../components/Pronostic";
    export default {
        name: "PronosticsList",
        components: {
            Pronostic
        },

        mounted(){
            let _this = this
            axios.get('/spa/user/pronostics')
                .then(function (response) {
                    // handle success
                    console.log(response.data);
                    _this.setPronos(response.data);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },

        data(){
            return{
                pronos: []
            };
        },

        methods:{
            setPronos(prono){
                this.pronos = prono
            }
        }
    }
</script>

<style scoped>

</style>
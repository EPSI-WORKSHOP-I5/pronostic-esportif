<template>
    <div class="container">
        <match v-for="match in pronos" v-bind:match="match" v-bind:key="match.id"></match>
    </div>
</template>

<script>
    import Match from "../components/Match";
    export default {
        name: "PronosticsList",
        components: {
            Match
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
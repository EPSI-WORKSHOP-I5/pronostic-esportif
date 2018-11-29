<template>
    <div class="container">
        <match v-for="match in matchs" v-bind:match="match" v-bind:key="match.id"></match>
    </div>
</template>

<script>
    import Match from "../components/Match";
    export default {
        name: "MatchesList",
        components: {
            Match
        },

        mounted(){
            let _this = this
            axios.get('/spa/tournaments/1/matches')
                .then(function (response) {
                    // handle success
                    _this.setMatches(response.data);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },

        data(){
            return{
                matchs: []
            };
        },

        methods:{
            setMatches(matchs){
                this.matchs = matchs
            }
        }
    }
</script>

<style scoped>

</style>
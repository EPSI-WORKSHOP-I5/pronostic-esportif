<template>
    <div class="container">
        <div class="row">
            <h1 class="text-center w-100"> Les Matchs </h1>
            <div class="text-center w-100">
                <label class="radio-inline"><input v-model="gamechecked" @change="loadMatch" type="radio" name="optradio" value="1" checked> CSGO </label>
                <label class="radio-inline"><input v-model="gamechecked" @change="loadMatch" type="radio" name="optradio" value="2"> Lol </label>

            </div>
        </div>
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
            /*let _this = this

            axios.get('/spa/tournaments/1/matches')
                .then(function (response) {
                    // handle success
                    _this.setMatches(response.data);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })*/
        },

        data(){
            return{
                matchs: [],
                gamechecked: 0
            };
        },

        methods:{
            setMatches(matchs){
                this.matchs = matchs
            },

            loadMatch(){
                axios.get('spa/games/'+this.gamechecked+'/matches')
                    .then((response) => {
                        this.setMatches(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

        }
    }
</script>

<style scoped>

</style>
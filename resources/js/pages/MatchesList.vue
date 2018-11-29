<template>
    <div class="container">
        <div class="row">
            <h1 class="text-center w-100"> Les Matchs </h1>
            <div class="text-center w-100">
                <b-form-group label="Sélectionnez un jeu :">
                    <b-form-radio-group id="btnradios1"
                                        buttons
                                        v-model="gamechecked"
                                        :options="options"
                                        name="radiosBtnDefault"
                                        @input="loadMatch"/>
                </b-form-group>

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

        data(){
            return{
                matchs: [],
                gamechecked: null,
                options: [
                    { text: 'Counter Strike: Global Offensive', value: '1'},
                    { text: 'League of Legend', value: '2'}
                ]
            };
        },

        methods:{
            setMatches(matchs){
                this.matchs = matchs
            },

            loadMatch() {
                console.log(this.gamechecked);
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
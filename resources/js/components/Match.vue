<template>
    <div class="row p-3 m-3 rounded d-flex align-items-center h-100 border text-white bg-dark" style="color: cornflowerblue;">
        <div class="col-md-2 text-center">
            {{match.datetime}}
        </div>
        <div class=" col-md-4 text-center" v-bind:class="{'bg-white text-body rounded' : match.bet != null && match.bet == 1}" @click="postPari(match.id, 1)">
                {{match.team1.name}}
        </div>
        <div class="col-md-2 text-center">
            {{match.tournament.name}} <br>
            <span v-show="match.result != null">Vainqueur : </span>
            <span v-if="match.result != null && match.result == 1">{{match.team1.name}}</span>
            <span v-else-if="match.result != null && match.result == 2">{{match.team2.name}}</span>
            <span v-else-if="match.result != null && match.result == 0">Nul</span>
        </div>
        <div class=" col-md-4 text-center" v-bind:class="{'bg-white text-body rounded' : match.bet != null && match.bet == 2}" @click="postPari(match.id, 2)">
            {{match.team2.name}}
        </div>
    </div>
</template>

<script>
    export default {
        name: "Match",
        props: ['match'],

        methods: {
            postPari(matchId, bet){
                axios.put('spa/user/pronostics', {
                    match_id: matchId,
                    bet: bet
                })
                    .then((response) => {
                        this.match.bet = bet;
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
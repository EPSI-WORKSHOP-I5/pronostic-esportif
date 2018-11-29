<template>
    <div class="row p-3 m-3 rounded d-flex align-items-center h-100 border text-white bg-dark" style="color: cornflowerblue;">
        <div class="col-md-2 text-center">
            {{pronostic.datetime}}
        </div>
        <div class=" col-md-4 text-center" v-bind:class="{'bg-white text-body rounded' : pronostic.bet == 1}" @click="postPari(pronostic.id, 1)">
            {{pronostic.team1.name}}
        </div>
        <div class="col-md-2 text-center">
            {{pronostic.tournament.game_name}} <br>
            {{pronostic.tournament.name}} <br>
            Vainqueur :
            <span v-if="pronostic.result != null && pronostic.result == 1">{{pronostic.team1.name}}</span>
            <span v-else-if="pronostic.result != null && pronostic.result == 2">{{pronostic.team2.name}}</span>
            <span v-else-if="pronostic.result != null && pronostic.result == 0">Nul</span>
        </div>
        <div class=" col-md-4 text-center" v-bind:class="{'bg-white text-body rounded' : pronostic.bet == 2}" @click="postPari(pronostic.id, 2)">
            {{pronostic.team2.name}}
        </div>
    </div>
</template>

<script>
    export default {
        name: "Pronostic",
        props: ['pronostic'],

        methods: {
            postPari(matchId, bet){
                axios.put('spa/user/pronostics', {
                    match_id: matchId,
                    bet: bet
                })
                    .then((response) => {
                        this.pronostic.bet = bet;
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
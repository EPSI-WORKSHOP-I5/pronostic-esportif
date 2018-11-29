<template>
    <b-row align-h class="text-white bg-dark rounded m-3 p-3">
        <b-col>
            <b-row align-v="center">
                <b-col :cols="12" :sm="2">{{match.datetime}}</b-col>
                <b-col>
                    <b-row class="match-bottom">
                        <b-col class="team" v-bind:class="{'bg-light text-body rounded' : match.bet == 1}" @click="postPari(match.id, 1)">
                            <b-row align-h="center" style="margin-bottom: 10px"><img v-bind:src="'img/teams/' + match.team1.name + '.png'"></b-row>
                            <b-row align-h="center">{{match.team1.name}}</b-row>
                        </b-col>
                        <b-col>
                            <b-row align-h="center" class="mx-auto match-top">{{match.tournament.game_name}} {{match.tournament.name}}</b-row>
                            <b-row align-h="center">
                                <span v-if="match.result != null && match.result == 1">Vainqueur : {{match.team1.name}}</span>
                                <span v-else-if="match.result != null && match.result == 2">Vainqueur : {{match.team2.name}}</span>
                                <span v-else-if="match.result != null && match.result == 0">Match nul</span>
                            </b-row>
                            <b-row v-if="match.score" align-h="center" class="score">{{match.score}}</b-row>
                        </b-col>
                        <b-col class="team" v-bind:class="{'bg-light text-body rounded' : match.bet == 2}" @click="postPari(match.id, 2)">
                            <b-row align-h="center"><img v-bind:src="'img/teams/' + match.team2.name + '.png'"></b-row>
                            <b-row align-h="center">{{match.team2.name}}</b-row>
                        </b-col>
                    </b-row>
                </b-col>
            </b-row>
        </b-col>
    </b-row>
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
    .match-top {
        font-weight: bold;
        margin-bottom: 10px;
    }
    .match-bottom {
        text-align: center;
    }
    .team {
        font-weight: bold;
    }
    .score {
        font-size: 32px;
    }
</style>
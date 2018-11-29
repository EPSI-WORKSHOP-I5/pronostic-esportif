<template>
    <div class="row p-3 m-3 rounded d-flex align-items-center h-100 border text-white bg-dark" style="color: cornflowerblue;">
        <div class="col-md-2 text-center">
            {{match.date}} <br> {{match.tournament}}
        </div>
        <div class=" col-md-4 text-center" @click="postPari(match.id, match.team1_id)">
                {{match.team1.name}}
        </div>
        <div class="col-md-2 text-center">
            {{match.game}}
        </div>
        <div class=" col-md-4 text-center" @click="postPari(match.id, match.team2_id)">
            {{match.team2.name}}
        </div>
    </div>
</template>

<script>
    export default {
        name: "Match",
        props: ['match'],

        methods: {
            postPari(matchId, teamId){
                axios.post('spa/user/pronostics', {
                    match_id: matchId,
                    team_id: teamId
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
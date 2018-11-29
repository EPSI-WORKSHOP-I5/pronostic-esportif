<template>
    <div class="container">
        <h1 class="text-center w-100">Classement</h1>
        <div class="row card">
            <b-table striped hover :items="leaderboard"></b-table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Page",

        data() {
            return {
                leaderboard: []
            }
        },

        mounted() {
            axios.get('/spa/leaderboard')
                .then(response => this.leaderboard = response.data)
                .catch(error => console.log(error));
        }
    }
</script>

<style scoped>

</style>
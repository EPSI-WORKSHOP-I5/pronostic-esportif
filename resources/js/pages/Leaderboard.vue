<template>
    <div class="container">
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
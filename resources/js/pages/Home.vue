<template>
    <div class="container">
        <b-card class="text-center">
            Bienvenue sur le site.
        </b-card>
    </div>
</template>

<script>
    export default {
        name: "Home",

        mounted() {
            axios.get('/spa/games')
                .then(response => console.log(response))
                .catch(error => console.log(error));
        }
    }
</script>

<style scoped>

</style>
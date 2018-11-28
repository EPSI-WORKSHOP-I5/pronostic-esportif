<template>
    <div class="container">
        <div class="row card">
            <p>Welcome to Page.vue</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Page",

        mounted() {
            axios.get('/spa/games')
                .then(response => console.log(response))
                .catch(error => console.log(error));
        }
    }
</script>

<style scoped>

</style>
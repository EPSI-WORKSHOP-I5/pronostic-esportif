<template>
    <div class="row p-3 m-3 rounded d-flex align-items-center h-100 border text-white bg-dark" style="color: cornflowerblue;">
        <div class="col-md-2 text-center">
        </div>
        <div class=" col-md-4 text-center">
            {{pronostic.team1_id}}
        </div>
        <div class="col-md-2 text-center">
        </div>
        <div class=" col-md-4 text-center">
            {{pronostic.team2_id}}
        </div>
    </div>
</template>

<script>
    export default {
        name: "Pronostic",
        props: ['pronostic'],
    }
</script>

<style scoped>

</style>
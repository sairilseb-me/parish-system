<template>
    <div class="container mt-5">
        <div class="card">
            <h5 class="card-header">Baptism Detail</h5>
            <div class="card-body">
                <h5 class="card-title">Name: {{ loadBaptismData.client.firstName }} {{ loadBaptismData.client.lastName }}</h5>
                <p class="card-text">Baptised Date: {{ loadBaptismData.baptised_date }}</p>
                <p class="card-text">Priest: {{ loadBaptismData.priest.firstName }} {{ loadBaptismData.priest.lastName }}</p>
                <p class="card-text">Sponsors: {{ loadBaptismData.sponsors }}</p>
                <p class="mt-2"><strong>Book Details</strong></p>
                <p>Dated: {{ loadBaptismData.dated }} Series Of: {{ loadBaptismData.series_of }} Book Number: {{ loadBaptismData.book_number }} Page: {{ loadBaptismData.page }}</p>
                <p>Purpose: {{ loadBaptismData.purpose }}</p>
            </div>
        </div>  
    </div>
</template>

<script>

import {mapGetters} from 'vuex';
export default {
    computed: {
        ...mapGetters('baptism', ['loadBaptismData'])
    },
    created(){
        console.log(this.loadBaptismData);
    }
}
</script>
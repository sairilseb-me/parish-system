<template>
    <div class="container mt-5" style="width: 60%">
        <h1>Add a Baptism Data</h1>
        <div class="client-data">
            <h3>Client Data:</h3>
            <p>Name: {{ getClientData.firstName }} {{ getClientData.lastName }}</p>
            <p>Gender: {{ getClientData.gender }}</p>
            <p>Address: {{ getClientData.barangay }} {{ getClientData.municipality }} {{ getClientData.province }}</p>
        </div>  
        <div class="baptism-data mt-3">
            <h3>Baptism Data</h3>
            <div class="mt-2">
                <label for="fathersName" class="form-label">Father's Name:</label>
                <input type="text" class="form-control" id="fathersName">
            </div>
            <div class="mt-2">
                <label for="mothersName" class="form-label">Mothers's Name:</label>
                <input type="text" class="form-control" id="mothersName">
            </div>
        </div>
    </div>
</template>

<script>

import {mapGetters} from 'vuex';
export default {
    computed: {
        ...mapGetters('client', ['getClientData'])
    }
}
</script>

<style scoped>
    .client-data{
        border: 1px solid #333;
        padding: 2rem;
        border-radius: 15px;
    }

    .baptism-data{
        border: 1px solid #333;
        padding: 2rem;
        border-radius: 15px; 
    }
</style>
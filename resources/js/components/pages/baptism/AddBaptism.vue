<template>
    <div class="container mt-5" style="width: 60%">
        <h1>Add a Baptism Data</h1>
        <div class="client-data">
            <h3>Client Data:</h3>
            <p>Name: {{ getClientData.firstName }} {{ getClientData.lastName }}</p>
            <p>Gender: {{ getClientData.gender }}</p>
            <p>Address: {{ getClientData.barangay }} {{ getClientData.municipality }} {{ getClientData.province }}</p>
            <p>Parents: {{ getClientData.fathersName }} and {{ getClientData.mothersName }}</p>
        </div>  
        <div class="baptism-data mt-3">
            <h3>Baptism Data:</h3>
            <div class="mb-2">
                <label for="priest" class="form-label">Officiant:</label>
                <!-- <select name="priest" id="" class="form-select">
                    <option :value="priest.id" v-for="priest in loadPriestsList" :key="priest.id">{{ priest.firstName }} {{ priest.lastName }}</option>
                </select> -->
            </div>
            
        </div>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex';
export default {
    computed: {
        ...mapGetters({getClientData: 'client/getClientData', getPriestsList: 'priest/getPriestsList', loadPriestList: 'priest/loadPriestsList'}),
    },
    mounted(){
        this.getPriestsList;
    },
    methods: {
       
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
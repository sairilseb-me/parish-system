<template>
    <div class="container mt-5" style="width:50%">

        <div class="card" v-if="getClientData">
            <div class="card-header">
                Client's Data
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ getClientData.firstName }} {{ getClientData.lastName }}</h5>
                <p>Gender: {{ getClientData.gender }}</p>
                <p class="card-text">Birthdate: {{ getClientData.birthDate }}</p>
                <p class="card-text">Contact: {{ getClientData.contact }}</p>
                <p class="card-text">Address: {{ getClientData.barangay }}, {{ getClientData.municipality }} {{ getClientData.province }}</p>
                <div class="mt-4">
                    <h5>Data Check:</h5>
                    <div class="d-flex box-options">
                        <router-link class="btn btn-primary" :to="{ name:'add-baptism'}">Add Baptism</router-link>
                        <router-link class="btn btn-warning" to="#">Add Marriage</router-link>
                        <router-link class="btn btn-secondary" to="#">Add Burial</router-link>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="loading-screen">
            <button class="btn btn-primary" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
            </button>
        </div>  
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex';
export default {
    computed: {
        ...mapGetters('client', ['getClientData']),
    },
    mounted() {
        console.log(this.$route.params.id);
        this.$store.dispatch('client/editClient', this.$route.params.id);
    },
    methods: {
        
    }
}
</script>

<style scoped>
    .box-shadow{
        border: 1px solid #333;
        box-shadow: 2px 2px 10px rgba(0,0,0, 0.26);
        border-radius: 15px;
        padding: 20px;
        padding-left: 2rem;
    }

    .box-options a{
        margin: 10px 10px;
    }
    .loading-screen{
        text-align: center;
    }
</style>
<template>
        <div class="container mt-5">
            <div class="d-flex flex-row justify-content-end">
                    <input class="me-2 px-3 py-2 w-25" type="search" placeholder="Search..">
            </div>
            <div>
                <table class="table table-hover table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Date Baptized</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <div v-if="!loadBaptismList">
                        <button class="btn btn-primary mt-3" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                    <tbody v-else>
                        <tr v-for="baptism in loadBaptismList" :key="baptism.id">
                            <td>{{ baptism.firstName }} {{ baptism.lastName }}</td>
                            <td>{{ baptism.barangay }} {{ baptism.mmunicipality }} {{ baptism.province }}</td>
                            <td>{{ convertDate(baptism.baptised_date) }}</td>
                            <td><router-link class="btn btn-primary" @click="triggerViewDetails(baptism.id)" :to="{name: 'specific-baptism'}">View Details</router-link></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex';
export default {
    computed: {
        ...mapGetters('baptism', ['getBaptismList', 'loadBaptismList']),
    },

    mounted() {
        this.getBaptismList;
    },
    methods: {
         ...mapActions('baptism', ['getSpecificBaptismData']),
        convertDate(date){
            return new Date(date).toLocaleDateString();
        },
        triggerViewDetails(id){
            this.getSpecificBaptismData(id);
        }
    }
}
</script>

<style scoped>
    .main-body{
        width: 70%;
    }
</style>
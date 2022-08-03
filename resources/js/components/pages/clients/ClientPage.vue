<template>
    <div class="container mt-5">
        <add-client v-if="getAddModalStatus" @close-modal="closeAddModal"></add-client>
        <edit-client v-if="getEditModalStatus"></edit-client>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary" @click="triggerAddModal">Add Client</button>
            <input class="me-2 px-3 w-25" type="search" placeholder="Search.." @keyup="getSearchClient" v-model="searchName">
        </div>
        <div v-if="loadClients">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody v-for="client in reloadClients" :key="client.id">
                    <tr>
                        <td>{{ client.firstName }} {{ client.lastName }}</td>
                        <td>{{ client.birthDate }}</td>
                        <td>{{ client.gender }}</td>
                        <td>{{ client.contact }}</td>
                        <td>{{ client.barangay }}, {{ client.municipality }}, {{ client.province }}</td>
                        <td><router-link class="btn btn-primary btn-sm" :to="{ name: 'specific-client', params: {id: client.id} }">View</router-link> <button class="btn btn-warning btn-sm" @click="triggerEditModal(client.id)">Edit</button> <button class="btn btn-danger btn-sm" @click="triggerDeleteClient(client.id)">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        <Pagination :data="loadClients" @pagination-change-page="getResults"  class="mt-3" />
        </div>
        
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex';
import LaravelVuePagination from 'laravel-vue-pagination';
import AddClient from './modals/AddClient.vue';
import EditClient from './modals/EditClients.vue';
import Swal from 'sweetalert2';
export default {
    components: {
        AddClient,
        'Pagination': LaravelVuePagination,
        EditClient,
    },
    data(){
        return{
            searchName: '',
        }
    },
    computed: {
        ...mapGetters('client', ['loadClients', 'getAddModalStatus', 'getEditModalStatus']),
        reloadClients(){
            return this.loadClients.data
        }
    },
    beforeUpdate(){
        this.loadClients;
    },
    mounted() {
        this.getClientList();
        this.getResults();
    },
    methods: {
        ...mapActions('client', ['setAddModalStatus', 'getClientList', 'getPaginationResult', 'searchClient', 'setEditModalStatus', 'editClient', 'deleteClient']),
        triggerAddModal(){
            this.setAddModalStatus(true);
        },
        triggerEditModal(id){
            this.editClient(id);
            this.setEditModalStatus(true);
        },
        closeAddModal(value){
            // this.showAddModal = value;
        },
        closeEditModal(value){
            this.setEditModalStatus(value)
        },
        getResults(page=1){
            this.getPaginationResult(page)
        },
        getSearchClient(){
            this.searchClient(this.searchName);
        },
        triggerDeleteClient(id){
            Swal.fire({
                title: 'Deleting Client.',
                text: 'You are about to delete a client. Continue?',
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
            })
            .then((result)=>{
                if(result.isConfirmed){
                  this.deleteClient(id)
                }
            });
        }
    }
}
</script>
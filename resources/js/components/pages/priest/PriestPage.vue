<template>
    <div class="container mt-5">
        <add-priest v-if="getAddModalStatus"></add-priest>
        <edit-priest v-if="getEditModalStatus"></edit-priest>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary" @click="showAddModal">Add Priest</button>
            <input class="me-2 px-3 w-25" type="search" placeholder="Search..">
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody v-if="loadPriestsList">
                <tr v-for="priest in loadPriestsList.data" :key="priest.id">
                    <td>{{ priest.title }}</td>
                    <td>{{ priest.firstName }}</td>
                    <td>{{ priest.lastName }}</td>
                    <td><button class="btn btn-warning btn-sm" @click="showEditModal(priest.id)">Edit</button> <button class="btn btn-danger btn-sm" @click="triggerDeletePriest(priest.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'
import AddPriest from './modals/AddPriest.vue';
import EditPriest from './modals/EditPriest.vue';

import Swal from 'sweetalert2';
export default {
    components: {
        AddPriest,
        EditPriest,
    },
    mounted() {
        this.getPriestsList();
    },
   computed: {
        ...mapGetters('priest', ['getAddModalStatus','getEditModalStatus', 'loadPriestsList']),
   },
   methods: {
        ...mapActions('priest', ['setAddModalStatus', 'setEditModalStatus', 'fetchPriestData', 'deletePriest', 'getPriestsList']),
        showAddModal(){
            this.setAddModalStatus(true);
        },
        showEditModal(id){
            this.fetchPriestData(id);
        },
        triggerDeletePriest(id){
            Swal.fire({
                title: 'Deleting Priest',
                text: 'You are about to delete a Priest data, continue?',
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
            }).then((result)=>{
                if(result.isConfirmed){
                    this.deletePriest(id);
                }
            })
        }
   }
}
</script>


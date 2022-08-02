<template>
        <div class="modal show" style="display:block">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Client Form</h5>
                    <button type="button" class="btn-close" aria-label="Close" @click="triggerCloseModal"></button>
                </div>
                <div class="modal-body">
                    
                    <h4 v-if="!getClientData">Loading Client Data...</h4>
                    <form v-else>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstName" v-model="getClientData.firstName">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" v-model="getClientData.lastName">
                        </div>
                        <div class="mb-3">
                            <label for="birthDate" class="form-label">Birth Date:</label>
                            <input type="date" class="form-control" id="birthDate" v-model="getClientData.birthDate">
                        </div>
                        <div class="mb-3">
                           <select class="form-select" v-model="getClientData.gender">
                                <option value="none">Select a gender:</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                           </select>
                        </div>
                        <div class="mb-3">
                            <label for="fathersName" class="form-label">Father's Name:</label>
                            <input type="text" class="form-control" id="fathersName" v-model="getClientData.fathersName">
                        </div>
                        <div class="mb-3">
                            <label for="mothersName" class="form-label">Mothers Name:</label>
                            <input type="text" class="form-control" id="mothersName" v-model="getClientData.mothersName">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact Number:</label>
                            <input type="text" class="form-control" id="contact" v-model="getClientData.contact">
                        </div>
                        <div class="mb-3">
                            <label for="barangay" class="form-label">Barangay:</label>
                            <input type="text" class="form-control" id="barangay" v-model="getClientData.barangay">
                        </div>
                        <div class="mb-3">
                            <label for="municipality" class="form-label">Municipality:</label>
                            <input type="text" class="form-control" id="municipality" v-model="getClientData.municipality">
                        </div>
                        <div class="mb-3">
                            <label for="province" class="form-label">Province:</label>
                            <input type="text" class="form-control" id="province" v-model="getClientData.province">
                        </div>
                    </form>
                </div>
                <!-- <div class="alert alert-danger" role="alert" v-if="getInputErrors[0]">
                    <ul v-for="err in getInputErrors" :key="err">
                        <li>{{ err }}</li>
                    </ul>
                </div> -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="triggerCloseModal">Close</button>
                    <button type="button" class="btn btn-primary" @click="triggerUpdateClient">Save</button>
                </div>
                </div>
            </div>
        </div>
        
</template>

<script>

import {mapGetters, mapActions} from 'vuex';
export default {
    data(){
        return{
            client: null,
        }
    },
    created(){
    
    },
    computed: {
        ...mapGetters('client', ['getClientData']),
    },
    methods: {
        ...mapActions('client', ['setEditModalStatus', 'updateClient']),
        triggerCloseModal(){
            this.setEditModalStatus(false)
        },
        triggerUpdateClient(){
            this.updateClient(this.getClientData);
        }
    }
}
</script>


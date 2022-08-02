<template>
        <div class="modal show" style="display:block">
            
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Client Form</h5>
                    <button type="button" class="btn-close" @click="closeAddModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstName" v-model="client.firstName">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" v-model="client.lastName">
                        </div>
                        <div class="mb-3">
                            <label for="birthDate" class="form-label">Birth Date:</label>
                            <input type="date" class="form-control" id="birthDate" v-model="client.birthDate">
                        </div>
                        <div class="mb-3">
                           <select class="form-select" v-model="client.gender">
                                <option value="none">Select a gender:</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                           </select>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact Number:</label>
                            <input type="text" class="form-control" id="contact" v-model="client.contact">
                        </div>
                        <div class="mb-3">
                            <label for="fathersName" class="form-label">Father's Name:</label>
                            <input type="text" class="form-control" id="fathersName" v-model="client.fathersName">
                        </div>
                        <div class="mb-3">
                            <label for="mothersName" class="form-label">Mothers Name:</label>
                            <input type="text" class="form-control" id="mothersName" v-model="client.mothersName">
                        </div>
                        <div class="mb-3">
                            <label for="barangay" class="form-label">Barangay:</label>
                            <input type="text" class="form-control" id="barangay" v-model="client.barangay">
                        </div>
                        <div class="mb-3">
                            <label for="municipality" class="form-label">Municipality:</label>
                            <input type="text" class="form-control" id="municipality" v-model="client.municipality">
                        </div>
                        <div class="mb-3">
                            <label for="province" class="form-label">Province:</label>
                            <input type="text" class="form-control" id="province" v-model="client.province">
                        </div>
                    </form>
                </div>
                <div class="alert alert-danger" role="alert" v-if="getInputErrors[0]">
                    <ul v-for="err in getInputErrors" :key="err">
                        <li>{{ err }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeAddModal">Close</button>
                    <button type="button" class="btn btn-primary" @click="setToAddClient">Save</button>
                </div>
                </div>
            </div>
        </div>
        
</template>

<script>

import {mapActions,  mapGetters} from 'vuex';
export default {
    data(){
        return{
            client: {
                firstName: '',
                lastName: '',
                birthDate: null,
                gender: 'none',
                fathersName: '',
                mothersName: '',
                contact: '',
                barangay: '',
                municipality: '',
                province: '',
            }

        }
    },
    methods:{
        ...mapActions('client', ['setAddModalStatus', 'addClient']),
        closeAddModal(){
            this.setAddModalStatus(false);
        },
        setToAddClient(){
            this.addClient(this.client)
        }
    },
    computed: {
        ...mapGetters('client', ['getInputErrors']),

    }
}
</script>
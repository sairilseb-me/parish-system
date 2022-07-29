<template>
    <div class="modal show" style="display:block">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Priest</h5>
                <button type="button" class="btn-close" aria-label="Close" @click="closeAddModal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                            <select class="form-select" v-model="priest.title">
                                <option value="none">Select a Title:</option>
                                <option value="reverend">Reverend</option>
                                <option value="archbishop">Archbishop</option>
                           </select>
                    </div>
                    <div class="mb-3">
                            <label for="firstName" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstName" v-model="priest.firstName">
                    </div>
                    <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" v-model="priest.lastName">
                    </div>
                </form>
            </div>
             <ul v-for="error in getInputErrors" :key="error">
                <li>{{ error }}</li>
            </ul>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="closeAddModal">Close</button>
                <button type="button" class="btn btn-primary" @click="addPriest">Save changes</button>
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
            priest: {
                title: 'none',
                firstName: '',
                lastName: ''
            }
        }
    },
    computed: {
        ...mapGetters('priest', ['getAddModalStatus', 'getInputErrors'])
    },
    methods: {
        ...mapActions('priest', ['setAddModalStatus', 'addNewPriest']),
        closeAddModal(){
            this.setAddModalStatus(false);
        },
        addPriest(){
            this.addNewPriest(this.priest);
        }
    }
}
</script>
<template>
     <div class="modal show" style="display:block">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Priest</h5>
                <button type="button" class="btn-close" aria-label="Close" @click="closeEditModal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                            <select class="form-select" v-model="getPriestData.title">
                                <option value="none">Select a Title:</option>
                                <option value="reverend">Reverend</option>
                                <option value="archbishop">Archbishop</option>
                           </select>
                    </div>
                    <div class="mb-3">
                            <label for="firstName" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstName" v-model="getPriestData.firstName">
                    </div>
                    <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" v-model="getPriestData.lastName">
                    </div>
                </form>
            </div>
            <!-- <ul v-for="error in getInputErrors" :key="error">
                <li>{{ error }}</li>
            </ul> -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="closeEditModal">Close</button>
                <button type="button" class="btn btn-primary" @click="triggerUpdatePriest">Save changes</button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>

import {mapActions, mapGetters} from 'vuex';
export default {
    mounted() {
        this.getPriestData
    },
   computed: {
        ...mapGetters('priest', ['getPriestData'])
   },
   methods: {
    ...mapActions('priest', ['setEditModalStatus', 'savePriestData']),
    closeEditModal(){
        this.setEditModalStatus(false);
    },
    triggerUpdatePriest(){
        this.savePriestData(this.getPriestData);
    }
   }

}
</script>
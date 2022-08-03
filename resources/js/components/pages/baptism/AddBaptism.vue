<template>
    <div class="container mt-5">
        <h1>Add a Baptism Data</h1>
        <div class="d-flex">
            <div class="client-data">
                <div class="card">
                    <h3 class="card-header">Client Data:</h3>
                    <div class="card-body">
                        <h5><strong>Name:</strong> {{ getClientData.firstName }} {{ getClientData.lastName }}</h5>
                        <p><strong>Gender:</strong> {{ getClientData.gender }}</p>
                        <p><strong>Address:</strong> {{ getClientData.barangay }} {{ getClientData.municipality }} {{ getClientData.province }}</p>
                        <p><strong>Parents:</strong> {{ getClientData.fathersName }} and {{ getClientData.mothersName }}</p>
                    </div> 
                </div>  
            </div>  
            <div class="baptism-data card mt-4">
                <h3 class="card-header">Baptism Data:</h3>
                <div class="card-body">
                    <div class="mb-2" v-if="loadPriestList">
                        <label for="priest" class="form-label">Officiant:</label>
                        <select name="priest" id="" class="form-select">
                            <option selected>Select a Priest</option>
                            <option :value="priest.id" v-for="priest in loadPriestList.data" :key="priest.id">{{ priest.firstName }} {{ priest.lastName }}</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="dateBaptised" class="form-label">Baptismal Date:</label>
                        <input type="date" name="" id="dateBaptised" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="sponsors" class="form-label">Sponsors(separated by comma): </label>
                        <textarea name="sponsors" id="sponsors" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="dated" class="form-label">Dated:</label>
                        <input type="text" id="dated" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="seriesOf" class="form-label">Series Of:</label>
                        <input type="text" id="seriesOf" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="seriesNumber" class="form-label">No.:</label>
                        <input type="text" id="seriesNumber" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="page" class="form-label">Page:</label>
                        <input type="text" id="page" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose:</label>
                        <input type="text" id="purpose" class="form-control">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <router-link class="btn btn-secondary btn-back" :to="{name: 'clients'}">Back</router-link>
                        <button class="btn btn-primary btn-save">Save</button>
                    </div>
                </div>
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
    created(){
        this.getPriestsList;
    },
    methods: {
       
    }
}
</script>

<style scoped>
    .client-data{
        width: 30%;
        padding: 2rem;
    }

    .baptism-data{
        width: 70%;
        margin-left: 1.5rem;
    }

    button{
        width: 150px;
    }

    a{
        width: 150px;
    }
</style>
<template>
    <div class="container mt-5">
        <h1>Edit Baptism</h1>
        <div class="d-flex">
            <div class="client-data">
                <div class="card">
                    <h3 class="card-header">Client Data:</h3>
                    <div class="card-body">
                        <h5><strong>Name:</strong> </h5>
                        <p><strong>Gender:</strong> </p>
                        <p><strong>Address:</strong> </p>
                        <p><strong>Parents:</strong> </p>
                    </div> 
                </div>
            </div>
            <div class="baptism-data card mt-4">
                <h3 class="card-header">Baptism Data:</h3>
                <div class="card-body">
                    <div class="mb-2" v-if="loadPriestsList">
                        <label for="priest" class="form-label">Officiant:</label>
                        <select name="priest" id="" class="form-select">
                            <option v-for="priest in loadPriestsLists.data" :key="priest.id">{{ priest.firstName }} {{ priest.lastName }}</option>
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
                        <label for="bookNumber" class="form-label">No.:</label>
                        <input type="text" id="bookNumber" class="form-control">
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
                        <router-link class="btn btn-secondary btn-back" :to="{name: 'baptism'}">Back</router-link>
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
        ...mapGetters({getPriestsList: 'priest/getPriestsList', loadPriestsList: 'priest/loadPriestsList'}),
   },
   created(){
        this.getPriestsList;
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
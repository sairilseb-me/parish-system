<template>
        <div class="container mt-5">
            <div class="d-flex flex-row justify-content-end">
                    <input class="me-2 px-3 py-2 w-25" type="search" placeholder="Search..">
            </div>
            <div>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Date Baptized</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <div v-if="!loadBaptismList.data">
                        <button class="btn btn-primary" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                    <tbody v-else>
                        <tr v-for="baptism in loadBaptismList.data" :key="baptism.id">
                            
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
    }
}
</script>

<style scoped>
    .main-body{
        width: 70%;
    }
</style>
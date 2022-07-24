<template>
    <div>
        <the-nav></the-nav>
        <router-view></router-view>
    </div>
     
</template>

<script>

import TheNav from './UI/TheNavbar.vue';
export default {
    components: {
        TheNav,
    }
}
</script>
<template>
  
  <div>
    <bridge-notify />
    <app-header /> 

    <div class="min-h-screen">
        <Index />
    </div>  

    <app-footer /> 

  </div>

</template>

<script>

import AppHeader from "./components/Layouts/Header.vue";
import AppFooter from "./components/Layouts/Footer.vue";
import Index from "./Pages/index.vue";

export default {
    components: {
        AppHeader, AppFooter, Index
    }

}
</script>

<style>

</style>
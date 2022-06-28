<template>
    <div class="app">
        <app-header />
        <app-main />
        <app-footer />
    </div>
</template>

<script>
import AppFooter from '../components/AppFooter.vue'
import AppHeader from '../components/AppHeader.vue'
import AppMain from '../components/AppMain.vue'

export default {
  components: { 
    AppHeader,
    AppMain,
    AppFooter 
    },
    name: 'App'
}
</script>

<style lang="scss" scoped>
.app{
    min-height: 75vh;
}

</style>
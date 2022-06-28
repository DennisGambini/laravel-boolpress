<template>

    <main>
                        
        <router-view />

    </main>

</template>

<script>
import HomePage from '../pages/HomePage.vue';
import BlogPage from '../pages/BlogPage.vue';

export default {
    name: 'AppMain',
    components: {
        HomePage,
        BlogPage
    }
}
</script>

<style lang="scss" scoped>


</style>
<template>
    <section>
        <div class="container">

            <div class="row" v-if="posts.length > 0">

                <div v-for="(post, index) in posts" class="col" :key="index">

                    <card-component :item="post" />

                </div>

            </div>

        </div>
    </section>
</template>

<script>
import CardComponent from '../pieces/CardComponent.vue'

export default {
    name:'PostsPage',
    components: {
        CardComponent
    },
    data(){
       return{
            posts: []
        }
    },
    mounted(){
        axios.get('/api/posts').then((res)=>{
            this.posts = res.data;
            console.log(this.posts)
        }).catch((err)=>{
            console.log(err);
        })
    }
}
</script>

<style lang="scss">


</style>
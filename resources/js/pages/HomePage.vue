<template>
    <section>
        <div class="container">

            <h1>{{titoloApp}}</h1>
            
            <div class="main-content">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates commodi quaerat animi repudiandae nisi debitis, vitae consectetur iusto, cupiditate laborum dolor. Quod, mollitia earum impedit voluptatem repudiandae explicabo accusantium cupiditate doloribus laboriosam aperiam labore at dolor autem praesentium animi repellat placeat dolorem maiores beatae qui officiis asperiores? Explicabo quasi, sed doloremque nobis voluptas voluptate? Optio ratione, maiores atque, nisi perspiciatis quaerat eius aspernatur dicta repellendus laboriosam ea eos reiciendis.
            </div>

            <carousel-component 
            :items="allPosts" 
            :carouselTitle="'ciao'" 
            :key1="'title'" :key2="'content'" :key3="'image'"
            />
        
        </div>
    </section>
</template>

<script>
import CarouselComponent from '../pieces/CarouselComponent.vue';

export default {
    name: 'HomePage',
    components: {
        CarouselComponent
    },
    data(){
        return{
            titoloApp: "Boolpress",
            allPosts: null
        }
    },
    created(){
        axios
        .get('/api/posts')
        .then((res)=>{
            this.allPosts = [...res.data]
            console.log(this.allPosts)
        })
        .catch((error)=>{
            console.log(error)
        })
    }
}
</script>

<style lang="scss" scoped>

</style>
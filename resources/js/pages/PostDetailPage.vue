<template>

    <section>

        <div class="container">

            <h1 class="text-center">{{post.title}}</h1>

            <div class="jumbo">
                <img :src="'../storage/' + post.image" alt="image not available">
            </div>

            <div class="content">{{post.content}}</div>

        </div>
        
    </section>

</template>

<script>
export default {
    name: 'PostDetailPage',
    data(){
        return{
            post : null
        }
    },
    mounted(){
        this.getPostCall();
    },
    methods:{
        getPostCall(){
            const postSlug = this.$route.params.slug;
            axios.get('/api/posts/' + postSlug).then((res)=>{
                console.log(res.data);
                this.post = res.data;
            }).catch((err)=>{
                console.log(err)
            })
        }
    }
}
</script>
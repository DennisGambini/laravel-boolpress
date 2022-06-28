<template>
    <section>
        <div class="container">

            <h1>{{titoloApp}}</h1>
            
            <section class="main-content">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates commodi quaerat animi repudiandae nisi debitis, vitae consectetur iusto, cupiditate laborum dolor. Quod, mollitia earum impedit voluptatem repudiandae explicabo accusantium cupiditate doloribus laboriosam aperiam labore at dolor autem praesentium animi repellat placeat dolorem maiores beatae qui officiis asperiores? Explicabo quasi, sed doloremque nobis voluptas voluptate? Optio ratione, maiores atque, nisi perspiciatis quaerat eius aspernatur dicta repellendus laboriosam ea eos reiciendis.
            </section>

            <section class="api-content">
                <div class="row">
                    <div v-for="(post, index) in posts" class="col" :key="index">
                        <div class="card">
                            <div>{{post.title}}</div>
                            <div>{{post.created_at}}</div>
                            <div class="img-container">
                                <img :src="'storage/' + post.image" alt="Image not available">
                            </div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>

            </section>
        
        </div>

    </section>
    
</template>

<script>
export default {
    name: 'HomePage',
    data(){
        return{
            titoloApp: "Boolpress",
            posts: []
        }
    },
    mounted(){
        axios.get('/api/posts').then((res)=>{
            // console.log(res.data);
            this.posts = res.data;
            console.log(this.posts)
        }).catch((err)=>{
            console.log(err);
        })
    }
}
</script>

<style lang="scss" scoped>

.img-container{
    height: 100px;
    width: 100px;
    img{
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }
}

</style>
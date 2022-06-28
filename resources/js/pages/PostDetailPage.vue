<template>

    <section>

        <div class="container" v-if="post">

            <h1 class="text-center">{{post.title}}</h1>

            <div class="jumbo">
                <img :src="'../storage/' + post.image" alt="image not available">
            </div>

            <div class="content">{{post.content}}</div>

            <div class="category">Categoria : {{post.category ? post.category.name : 'none'}}</div>

            <div class="created">

                <div class="date">
                    <span>Created on : </span>  
                    <span>{{getDay(post.created_at)}}</span>
                </div>

                <div class="time">
                    <span> At : </span>  
                    <span>{{getTime(post.created_at)}}</span>
                </div>
                
            </div>

            <div class="icons">Published ? 
                <i class="fa-solid fa-circle-check" v-if="post.published === 1"></i>
                <i class="fa-solid fa-circle-xmark" v-if="post.published === 0"></i>
            </div>

            <h5>TAGS</h5>
            <div class="tags row" v-if="post.tags !== []">
                <div v-for="tag in post.tags" :key="tag.id" class="col">{{tag.name}}</div>
            </div>
            <div v-else>none</div>

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
                this.post = res.data;
                console.log(this.post);
            }).catch((err)=>{
                console.log(err)
            })
        },
        getDay(date){
            let myArr = date.split('T');
            console.log(myArr);
            return myArr[0];
        },
        getTime(date){
            let myArr = date.split('T');
            let myTime = myArr[1].split('.')[0];
            return myTime;
        }
    }
}
</script>

<style lang="scss" scoped>
.tags>.col{
    padding: 10px;
    border: 1px solid black;
    flex-grow: 0;
}
</style>
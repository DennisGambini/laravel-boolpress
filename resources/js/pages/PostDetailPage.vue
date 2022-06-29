<template>

    <section>

        <div class="container" v-if="post">

            <!-- titolo -->
            <h1 class="text-center">{{post.title}}</h1>

            <!-- immagine -->
            <div class="jumbo">
                <img :src="'../storage/' + post.image" alt="image not available">
            </div>

            <!-- main content -->
            <div class="content">{{post.content}}</div>

            <!-- categoria -->
            <div class="category">Categoria : {{post.category ? post.category.name : 'none'}}</div>

            <!-- data -->
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

            <!-- pubblicato -->
            <div class="icons">Published ? 
                <i class="fa-solid fa-circle-check" v-if="post.published === 1"></i>
                <i class="fa-solid fa-circle-xmark" v-if="post.published === 0"></i>
            </div>

            <!-- tags -->
            <div v-if="post.tags.length > 0">
                <h5>TAGS</h5>
                <div class="tags row" >
                    <div v-for="tag in post.tags" :key="tag.id" class="col">{{tag.name}}</div>
                </div>
            </div>

            <div v-else>
                <h5>NO TAGS ON THIS POST</h5>
            </div>

            <!-- visualizzazione commenti -->
                <div class="comments-display" v-if="post.comments.length > 0">

                    <h3>Comments</h3>

                    <div v-for="comment in post.comments" :key="comment.id" class="comment">
                        
                        <h4>{{comment.username}} says :</h4>
                        
                        <h5>{{comment.title}}</h5>
                        
                        <p>{{comment.content}}</p>
                        
                        <small class="date">
                            <span>Created on : </span>  
                            <span v-if="comment.created_at">{{getDay(comment.created_at)}}</span>
                            <span v-else>Today</span>
                        </small>

                        <small class="time">
                            <span> At : </span>  
                            <span v-if="comment.created_at">{{getTime(comment.created_at)}}</span>
                            <span v-else>Now</span>
                        </small>

                    </div>  

                </div>

            <!-- form commenti -->
            <div class="comments">
                <form @submit.prevent="postComment">

                    <div class="mb-3">
                        <label for="comment-username">Username</label>
                        <input type="text" name="username" id="comment-username" placeholder="Your Username">
                    </div>

                    <div class="mb-3">
                        <label for="comment-title">Title</label>
                        <input type="text" name="title" id="comment-title" placeholder="insert a title for comment">
                    </div>

                    <div class="mb-3">
                        <label for="comment-content">Content</label>
                        <input type="text" name="content" id="comment-content" placeholder="insert you content here...">
                    </div>

                    <button type="submit">Confirm</button>

                </form>

                

            </div>

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
                this.$router.push({name : 'not-found'})
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
        },
        postComment(){
            const newUser = document.getElementById("comment-username");
            const newTitle = document.getElementById("comment-title");
            const newContent = document.getElementById("comment-content");

            const newComment = {
                title: newTitle.value,
                content: newContent.value,
                username: newUser.value,
                post_id: this.post.id
            }

            console.log('new comment : ',newComment);
            
            axios
            .post('/api/comments', newComment)
            .then((res)=>{
                console.log('sono in res')
                console.log(res.data);
                // se faccio così da errore nei metodi
                this.post.comments.push(newComment);
            })
            .catch((error)=>{
                console.log('sono in err')
                console.log(error)
            })
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
.comment{
    border: 1px solid black;
    padding: 10px;
    h5{
        color: red;
    }
    small{
        display: flex;
        justify-content: flex-end;
    }
}
</style>
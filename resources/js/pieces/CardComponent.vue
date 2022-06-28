<template>

    <div class="card">
        <div class="title">{{item.title}}</div>
        <div class="date">{{item.created_at}}</div>
        <div class="img-container">
            <img :src="'storage/' + item.image" alt="Image not available">
        </div>
        <div class="content">{{cut(item.content)}}</div>
        <div>
            <a href="#">Let's go</a>
        </div>
    </div>

</template>

<script>
export default {
    name:'CardComponent',
    props:{
        item : Object
    },
    methods:{
        cut(text){
            if(text.length > 70){
                let newText = text.substring(0, 68) + "...";
                return newText;
            } else {
                return text
            }
        }
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
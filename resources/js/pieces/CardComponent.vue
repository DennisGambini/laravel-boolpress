<template>

    <div class="card">
        <div>{{item.title}}</div>
        <div>{{item.created_at}}</div>
        <div class="img-container">
            <img :src="'storage/' + item.image" alt="Image not available">
        </div>
        <div></div>
        <div></div>
    </div>

</template>

<script>
export default {
    name:'CardComponent',
    props:{
        item : Object
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
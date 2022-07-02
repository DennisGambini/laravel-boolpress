<template>
    <section v-if="items">
        <h3>{{carouselTitle}}</h3>    

        <div class="carousel-container">
            <div class="title">{{items[count][key1]}}</div>
            <div class="content">{{items[count][key2]}}</div>
            <div class="immagine">
                <img :src="'../storage/' + items[count][key3]" alt="">
            </div>

        </div>
    </section>
</template>

<script>
export default {
    name: 'CarouselComponent',
    data() {
        return {
            count: 0
        }
    },
    methods:{
        counting(){
            if (this.count == this.items.length -1){
                this.count = 0;
            } else {
                this.count ++;
            }
            console.log(this.count)
        }
    },
    props:{
        items: Array,
        carouselTitle: String,
        key1: String,
        key2: String,
        key3: String
    },
    mounted() {
        setInterval(this.counting, 2000);
    }
}
</script>

<style lang="scss" scoped>

</style>
<template>
    <section class="not-found">
        <h2>Oops, page not found</h2>

        <div class="image">
            <img src="storage/img/not-found.jpg" alt="image not found for the not found page...lol">
        </div>

        <button class="home">
            <a href="/">COME BACK HOME</a>
        </button>
    </section>
</template>

<script>
export default {
    name:'NotFoundPage'
}
</script>

<style lang="scss" scoped>
section.not-found {
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 50px;
    background-color: lightgray;
    padding: 50px 0;
    .image{
        height: 300px;
        width: 300px;
        border-radius: 50%;
        overflow: hidden;
        img{
            height: 100%;
            width: 100%;
            object-fit: cover;
            object-position: -100px 0;
        }
    }
    button.home{
        border-radius: 15px;
        border: 2px solid transparent;
        &:hover{
            border: 2px solid blue;
        }
        a{
            display: block;
            height: 100%;
            padding: 10px;
            &:hover{
                text-decoration: none;
            }
        }
    }
}

</style>
<template>
    <div class="container">
        <header class="d-flex">
            <h3>Header di Vue</h3>
            <nav>
                <ul class="d-flex">
                    <li 
                    v-for="(link, index) in navLinks" :key="index">
                        <router-link 
                        :to="link.route" 
                        :class="link.reRoute === $route.matched[0].path ? 'active' : ''"
                        >
                            <span>{{link.name}}</span>
                            <span v-if="link.icon">
                                <i :class="link.icon"></i>
                            </span>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
</template>

<script>
export default {
    name: 'AppHeader',
    data(){
        return{
            navLinks:[
                {
                    name: 'Home',
                    route: '/',
                    reRoute: '',
                    icon : 'fa-solid fa-house',
                },
                {
                    name: 'All Posts',
                    route: '/posts',
                    reRoute: '/posts',
                    icon: 'fa-solid fa-signs-post'
                },
                {
                    name: 'Contacts',
                    route: '/contacts',
                    reRoute: '/contacts',
                    icon: 'fa-solid fa-address-book'
                },
                {
                    name: 'Blog',
                    route: '/blog',
                    reRoute: '/blog',
                    icon: null
                }
            ],
            activePath: ''
        }
    }
}
</script>

<style lang="scss" scoped>
    
header{
    justify-content: space-between;
    align-items: center;
    nav>ul{
        gap: 20px;
        list-style: none;
        
    }    
}  
.active{
    color: red !important;
}

</style>
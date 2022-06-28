import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

// importazione componenti necessari
import HomePage from './pages/HomePage';
import ContactPage from './pages/ContactPage';
import BlogPage from './pages/BlogPage';
import PostsPage from './pages/PostsPage';
import PostDetailPage from './pages/PostDetailPage';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactPage
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogPage
        },
        {
            path: '/posts',
            name: 'posts',
            component: PostsPage
        },
        {
            path: '/posts/:slug',
            name: 'post-detail',
            component: PostDetailPage
        }
    ]
});

export default router;
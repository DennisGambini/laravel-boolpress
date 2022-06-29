import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

// importazione componenti necessari
import HomePage from './pages/HomePage';
import ContactPage from './pages/ContactPage';
import BlogPage from './pages/BlogPage';
import PostsPage from './pages/PostsPage';
import PostDetailPage from './pages/PostDetailPage';
import NotFoundPage from './pages/NotFoundPage';

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
        },
        {
            path: '*',
            name: 'not-found',
            component: NotFoundPage
        }
    ]
});

export default router;
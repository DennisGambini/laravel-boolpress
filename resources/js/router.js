import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

// importazione componenti necessari
import HomePage from './pages/HomePage';
import ContactPage from './pages/ContactPage';
import BlogPage from './pages/BlogPage';

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
        }
    ]
});

export default router;
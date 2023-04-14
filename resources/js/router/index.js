import {createWebHistory, createRouter} from "vue-router";

import Home from '../components/home.vue';
import Register from '../components/register.vue';
import Login from '../components/login.vue';
import Dashboard from '../components/dashboard.vue';
import Posts from '../components/posts.vue';
import AddPost from '../components/AddPost.vue';
import EditPost from '../components/EditPost.vue';



export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'addpost',
        path: '/posts/add',
        component: AddPost
    },
    {
        name: 'posts',
        path: '/posts',
        component: Posts
    },
    {
        name: 'editpost',
        path: '/posts/edit',
        component: EditPost
    },
];

const router = createRouter({
   history:createWebHistory(),
   routes: routes,
});

export default router;

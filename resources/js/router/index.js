import {createWebHistory, createRouter} from "vue-router";

import Login from '../components/login.vue';
import Home from '../components/home.vue';
import Register from '../components/register.vue';
import Dashboard from '../components/dashboard.vue';




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
];


const router = createRouter({
  history:createWebHistory(),
  routes: routes,
});

export default router;

import {createWebHistory, createRouter} from "vue-router";

import Home from '../components/home.vue';
import Register from '../components/register.vue';
import Login from '../components/login.vue';
import Dashboard from '../components/dashboard.vue';
import Posts from '../components/posts.vue';
import AddPost from '../components/AddPost.vue';
import EditPost from '../components/EditPost.vue';
import Library from '../components/library.vue';
import Admin from '../components/admin.vue';
import Readinterface from '../components/readinterface.vue';
import Bookdetail from '../components/bookdetail.vue';
import UserProfile from '../components/userProfile.vue';
import Aboutus from '../components/aboutus.vue';
import Contact from '../components/contactus.vue';
import Cart from '../components/cart.vue';
import UsersManager from '../components/usersManager.vue';

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
        component: Dashboard,
        meta: { requiresAuth: true }
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
    {
        name: 'library',
        path: '/library',
        component: Library
    },
    {
        name: 'admin',
        path: '/admin',
        component: Admin,
        meta: { requiresAuth: true,  roles: [2]}
       
    },
    {
        name: 'readinterface',
        path: '/readinterface',
        component: Readinterface
    },
    {
        name: 'bookdetail',
        path: '/bookdetail',
        component: Bookdetail
    },
    {
    name: 'userProfile',
    path: '/userProfile',
    component: UserProfile,
    meta: { requiresAuth: true,  roles: [1, 2]  }
},
{
    name: 'aboutus',
    path: '/aboutus',
    component: Aboutus
},
{
    name: 'contact',
    path: '/contact',
    component: Contact
},
{
  name: 'usersManager',
  path: '/usersManager',
  component: UsersManager
},
{
    name: 'cart',
    path: '/cart',
    component: Cart
},
];

const router = createRouter({
   history:createWebHistory(),
   routes: routes,
});



/*import axios from 'axios';


router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) { // check if route requires authentication
    axios.get('/api/authenticated').then(response => {
      if (!window.Laravel.isLoggedin) { // replace with your API response
        console.log("no logeado");
        next({

          name: 'home',
          query: { redirect: to.fullPath } // save the original request url for redirection after login
        });
      } else {
        console.log("logeado");
        next();
      }
    }).catch(() => {
      next({
        name: 'home',
        query: { redirect: to.fullPath } // save the original request url for redirection after login
      });
    });
  } else {
    next();
  }
});*/
import axios from 'axios';

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    axios.get('/api/authenticated').then(authResponse => {
      if (!authResponse.data.authenticated) {
        // User is not logged in, redirect to login page
        next({
          name: 'home',
          query: { redirect: to.fullPath }
        });
      } else {
        // User is logged in, check their role
        axios.get('/api/user/role').then(roleResponse => {
          const userRole = roleResponse.data.role; // Assuming the API response includes the user's role
          if (to.matched.some(record => record.meta.roles.includes(userRole))) {
            // User has the required role to access this route
            next();
          } else {
            // User does not have the required role to access this route, redirect to home page
            next({
              name: 'home'
            });
          }
        }).catch(() => {
          // Error retrieving user role, redirect to home page
          next({
            name: 'home',
            query: { redirect: to.fullPath }
          });
        });
      }
    }).catch(() => {
      // Error retrieving authentication status, redirect to home page
      next({
        name: 'home',
        query: { redirect: to.fullPath }
      });
    });
  } else {
    // Route does not require authentication, allow access
    next();
  }
});


export default router;

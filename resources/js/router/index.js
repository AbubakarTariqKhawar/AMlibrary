import {createWebHistory, createRouter} from "vue-router";

import Home from '../components/home.vue';
import Posts from '../components/posts.vue';
import AddPost from '../components/AddPost.vue';
import Library from '../components/library.vue';
import Editbook from '../components/editbook.vue';
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
        name: 'library',
        path: '/library',
        component: Library
    },
    {
        name: 'editbook',
        path: '/editbook',
        component: Editbook,
        meta: { requiresAuth: true,  roles: [1,3,4,5]}

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
    meta: { requiresAuth: true,  roles: [1,2,6,3,4]  }
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

/*


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
*/

import axios from 'axios';

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    axios.get('/api/authenticated')
      .then(response => {
        if (!response.data.authenticated) {
          // User is not logged in, redirect to login page
          next({
            name: 'home',
            query: { redirect: to.fullPath }
          });
        } else {
          // User is logged in, check their roles
          axios.get('/api/user/roles')
            .then(response => {
             
              const userRoles = response.data.roles;
              const requiredRoles = to.meta.roles;
              const hasRequiredRole = userRoles.some(role => requiredRoles.includes(role.RolId));

              if (hasRequiredRole) {
                // User has the required role, allow access
                next();
              } else {
                console.log(response.data.roles);
                // User doesn't have the required role, redirect to home page
                next({
                  name: 'home',
                  query: { redirect: to.fullPath }
                });
              }
            })
            .catch(() => {
              // Error retrieving user roles, redirect to home page
              next({
                name: 'home',
                query: { redirect: to.fullPath }
              });
            });
        }
      })
      .catch(() => {
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

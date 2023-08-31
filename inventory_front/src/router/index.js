import { createRouter, createWebHistory } from 'vue-router'
import dashboard from '../views/dashboard.vue'
import register from '../views/register.vue'
import store from '../store'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: () => import('../views/login.vue')
    },

    {
      path: '/register',
      name: 'register',
      component: register
    },



    /* GUARD FOR DASHBOARD AND LINK */
    {
      path: '/dashboard',
      name: dashboard,
      component: dashboard,
      meta: {requiresAuth :true},
      children:[
        { path: '/dashboard', name: 'dashboard', component: () => import('../views/dashboard.vue')},
      ]
    },
    /* END OF GUARD FOR DASHBOARD AND LINK */



    /* GUARD FOR RECORDS AND LINK */
    {
      path: '/records',
      meta: {requiresAuth :true},
      children:[
        { path: '/records', name: 'records', component: () => import('../views/records.vue')},
      ]
    },
    /* END OF GUARD FOR RECORDS AND LINK */


    /* GUARD FOR PRODUCTS AND LINK */
    {
      path: '/products',
      meta: {requiresAuth :true},
      children:[
        { path: '/products', name: 'products', component: () => import('../views/products.vue')},
      ]
    },
    /* END OF GUARD FOR PRODUCTS AND LINK */



    /* GUARD FOR ORDER AND LINK */
    {
      path: '/order',
      meta: {requiresAuth :true},
      children:[
        { path: '/order', name: 'order', component: () => import('../views/order.vue')},
      ]
    },
    /* END OF GUARD FOR ORDER AND LINK */

    

            







    /* { path: '/products', name: 'products', component: () => import('../views/products.vue')}, */
    { path: '/add-product', name: 'add_product', component: () => import('../components/add_prod.vue')},

   

    {
      name: 'not_found',
      path: '/:pathMatch(.*)*',
      component: () => import('../components/not_found.vue')
    },



   /*  {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    } */
  ]
})

router.beforeEach((to,from,next) => 
{

  if(to.meta.requiresAuth && !store.state.user.token){
    next({name: 'login'})
  }

  else if (store.state.user.token && (to.name==='login' || to.name==='register')){
    next({name: 'dashboard'})
  }

  else
  {
    next();
  }



})
export default router

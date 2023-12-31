import * as vueRouter from "vue-router";
import HelloWorld from '../pages/HelloWorld.vue';

const routes = [
  {
    path: '/',
    name: 'HelloWorld',
    component: HelloWorld
  },
]

const router = vueRouter.createRouter({
  history: vueRouter.createWebHistory(),
  routes
})

export default router

import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '../pages/HelloWorld';

Vue.use(Router)

export default new Router({
  mode: 'history', //追加
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    }
  ]
})

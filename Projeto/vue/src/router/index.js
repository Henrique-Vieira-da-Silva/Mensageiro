import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Contatos from '../views/Contatos.vue'
import Menu from '../views/Menu.vue'
import Novo from '../views/novoUsuario.vue'
import configConta from '../views/configConta.vue'
import conversas from '../views/Conversas.vue'
import config from '../views/Configura.vue'
import perfil from '../views/perfil.vue'
import Conversa from '../views/Conversa.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/Contatos',
    name: 'Contatos',
    component: Contatos
  },
  {
    path: '/Menu',
    name: 'Menu',
    component: Menu
  },
  {
    path: '/novoUsuario',
    name: 'novo',
    component: Novo
  },
  {
    path: '/configConta',
    name: 'configConta',
    component: configConta
  },
  {
    path: '/conversas',
    name: 'conversas',
    component: conversas
  },
  {
    path: '/config',
    name: 'config',
    component: config
  },
  {
    path: '/perfil',
    name: 'perfil',
    component: perfil
  },
  {
    path: '/conversa',
    name: 'conversa',
    component: Conversa
  }
]


const router = new VueRouter({
  routes
})

export default router

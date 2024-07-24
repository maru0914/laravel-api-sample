import {createRouter, createWebHistory} from 'vue-router'

import HomeView from './Pages/HomeView.vue'
import FormView from './Pages/FormView.vue'

const routes = [
    { path: '/', component: HomeView },
    { path: '/form', component: FormView },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router

import Vue from 'vue'
import Router from 'vue-router'
import DashboardLayout from '@/layout/DashboardLayout'
import AuthLayout from '@/layout/AuthLayout'
Vue.use(Router)

export default new Router({
    linkExactActiveClass: 'active',
    mode: 'history',
    routes: [{
        path: '/',
        redirect: 'dashboard',
        component: DashboardLayout,
        meta: {
            requiresAuth: true
        },
        children: [{
            path: '/dashboard',
            name: 'dashboard',
            component: () => import( /* webpackChunkName: "demo" */ '@/views/Dashboard.vue')
        },
            {
                path: '/icons',
                name: 'icons',
                component: () => import( /* webpackChunkName: "demo" */ '@/views/Icons.vue')
            },
            {
                path: '/profile',
                name: 'profile',
                component: () => import( /* webpackChunkName: "demo" */ '@/views/UserProfile.vue')
            },
            {
                path: '/maps',
                name: 'maps',
                component: () => import( /* webpackChunkName: "demo" */ '@/views/Maps.vue')
            },
            {
                path: '/tables',
                name: 'tables',
                component: () => import( /* webpackChunkName: "demo" */ '@/views/Tables.vue')
            },
            {
                path: '/list-task',
                name: 'listTask',
                component: () => import('@/views/Tasks/ListTask.vue'),
            },
            {
                path: '/update-task/:id',
                name: 'updateTask',
                component: () => import('@/views/Tasks/UpdateCreateTask.vue'),
                props: true,
            },
            {
                path: '/create-task',
                name: 'createTask',
                component: () => import('@/views/Tasks/UpdateCreateTask.vue'),
            },
            {
                path: 'detail-task/:id',
                name: 'detailTask',
                component: () => import('@/views/Tasks/DetailTask.vue'),
                props: true,
            }
        ]
    },
        {
            path: '/',
            redirect: 'login',
            component: AuthLayout,
            meta: {
                requiresVisitor: true
            },
            children: [{
                path: '/login',
                name: 'login',
                component: () => import( /* webpackChunkName: "demo" */ '@/views/Login.vue')
            },
                {
                    path: '/register',
                    name: 'register',
                    component: () => import( /* webpackChunkName: "demo" */ '@/views/Register.vue')
                }
            ]
        },
    ]
})

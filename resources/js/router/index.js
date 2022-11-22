import {
    createWebHistory,
    createRouter
} from 'vue-router'
import store from '@/store'

const Login = () => import('@/components/admin/Login.vue')
const Register = () => import('@/components/admin/Register.vue')

const AppLayoutAdmin = () => import('@/components/admin/layouts/AppLayout.vue')
const AppLayoutUser = () => import('@/components/user/layouts/AppLayout.vue')

const Art = () => import('@/components/Art.vue')
const Standort = () => import('@/components/Standort.vue')
const Infos = () => import('@/components/Infos.vue')
const Ort = () => import('@/components/Ort.vue')

const routes = [{
        path: "/:catchAll(.*)",
        redirect: {
            name: '/art'
        },
        
    },
    {
        path: "/",
        component: AppLayoutUser,
        children: [{
                name: "/user",
                path: '/',
                component: Art,
                meta: {
                    title: `User`
                },
            },
            {
                name: "/art",
                path: '/art',
                component: Art,
                meta: {
                    title: `Art`
                }
            },
            {
                name: "/ort",
                path: '/ort',
                component: Ort,
                meta: {
                    title: `Ort`
                }
            },
            {
                name: "/standort",
                path: '/standort',
                component: Standort,
                meta: {
                    title: `Standort`
                }
            },
            {
                name: "/infos",
                path: '/infos',
                component: Infos,
                meta: {
                    title: `Infos`
                }
            }
        ]
    },
    {
        name: "login",
        path: "/admin/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Anmeldung`
        }
    },
    {
        name: "register",
        path: "/admin/register",
        component: Register,
        meta: {
            middleware: "guest",
            title: `Registrierung`
        }
    },
    {
        path: "/admin/:catchAll(.*)",
        redirect: {
            name: 'art'
        },
    },
    {
        path: "/admin/",
        component: AppLayoutAdmin,
        meta: {
            middleware: "auth"
        },
        children: [{
                name: "admin",
                path: '/admin/',
                component: Art,
                meta: {
                    title: `Admin`
                }
            },
            {
                name: "art",
                path: '/admin/art',
                component: Art,
                meta: {
                    title: `Art`
                }
            },
            {
                name: "ort",
                path: '/admin/ort',
                component: Ort,
                meta: {
                    title: `Ort`
                }
            },
            {
                name: "standort",
                path: '/admin/standort',
                component: Standort,
                meta: {
                    title: `Standort`
                }
            },
            {
                name: "infos",
                path: '/admin/infos',
                component: Infos,
                meta: {
                    title: `Infos`
                }
            }
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({
                name: "art"
            })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({
                name: "login"
            })
        }
    }
})

export default router

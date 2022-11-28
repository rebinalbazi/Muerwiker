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

const routes = [
    {
        path: "/:catchAll(.*)",
        redirect: {
            name: '/'
        },
        component: Art,
    },
    {
        path: "/",
        component: AppLayoutUser,
        children: [{
                name: "/",
                path: '/',
                component: Art,
                meta: {
                    title: `Die Mürwiker`
                },
            },
            {
                name: "/:art",
                path: '/:art',
                component: Ort,
                meta: {
                    title: `Die Mürwiker - Ort`
                }
            },
            {
                name: "/:art/:ort",
                path: '/:art/:ort',
                component: Standort,
                meta: {
                    title: `Die Mürwiker - Standort`
                }
            },
            {
                name: "/:art/:ort/:infos",
                path: '/:art/:ort/:infos',
                component: Infos,
                meta: {
                    title: `Die Mürwiker - Infos`
                }
            },
            {
                name: "/tagesstaette/:infos",
                path: '/tagesstaette/:infos',
                component: Infos,
                meta: {
                    title: `Die Mürwiker - Infos`
                }
            },
            {
                name: "/verwaltung",
                path: '/verwaltung',
                component: Infos,
                meta: {
                    title: `Die Mürwiker - Infos`
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
                path: '/admin',
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
                path: '/admin/:art/:standort',
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

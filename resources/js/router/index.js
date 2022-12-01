import {
    createWebHistory,
    createRouter
} from 'vue-router'
import store from '@/store'

const Login = () => import('@/components/admin/Login.vue')
const Register = () => import('@/components/admin/Register.vue')

const AppLayoutAdmin = () => import('@/components/admin/layouts/AppLayout.vue')
const AppLayoutUser = () => import('@/components/user/layouts/AppLayout.vue')

const Ansprechpartner = () => import('@/components/admin/pages/Ansprechpartner.vue')
const Wohnen = () => import('@/components/admin/pages/Wohnen.vue')
const Arbeit = () => import('@/components/admin/pages/Arbeit.vue')
const Tagesstaette = () => import('@/components/admin/pages/Tagesstaette.vue')
const Verwaltung = () => import('@/components/admin/pages/Verwaltung.vue')
const Sonstige = () => import('@/components/admin/pages/Sonstige.vue')

const Art = () => import('@/components/user/pages/Art.vue')
const Ort = () => import('@/components/user/pages/Ort.vue')
const Standort = () => import('@/components/user/pages/Standort.vue')
const Infos = () => import('@/components/user/pages/Infos.vue')
const Suche = () => import('@/components/user/pages/Suche.vue')

const routes = [
    // {
    //     path: "/:catchAll(.*)",
    //     redirect: {
    //         name: '/'
    //     },
    //     component: Art,
    // },
    {
        path: "/",
        component: AppLayoutUser,
        middleware: "user",
        children: [{
                name: "/",
                path: '/',
                component: Art,
                meta: {
                    title: `Die Mürwiker`,
                    middleware: "user",
                },
            },
            {
                name: "/:art",
                path: '/:art',
                component: Ort,
                meta: {
                    title: `Die Mürwiker - Ort`,
                    middleware: "user",
                }
            },
            {
                name: "/:art/:ort",
                path: '/:art/:ort',
                component: Standort,
                meta: {
                    title: `Die Mürwiker - Standort`,
                    middleware: "user",
                }
            },
            {
                name: "/:art/:ort/:infos",
                path: '/:art/:ort/:infos',
                component: Infos,
                meta: {
                    title: `Die Mürwiker - Infos`,
                    middleware: "user",
                }
            },
            {
                name: "/tagesstaette/:infos",
                path: '/tagesstaette/:infos',
                component: Infos,
                meta: {
                    title: `Die Mürwiker - Infos`,
                    middleware: "user",
                }
            },
            {
                name: "/verwaltung/:infos",
                path: '/verwaltung/:infos',
                component: Infos,
                meta: {
                    title: `Die Mürwiker - Infos`,
                    middleware: "user",
                }
            },
            {
                name: "/sonstige/:infos",
                path: '/sonstige/:infos',
                component: Infos,
                meta: {
                    title: `Die Mürwiker - Infos`,
                    middleware: "user",
                }
            },
            {
                name: "/suche/",
                path: '/suche/',
                component: Suche,
                meta: {
                    title: `Die Mürwiker - Suche`,
                    middleware: "user",
                }
            },
            {
                name: "/suche/:infos",
                path: '/suche/:infos',
                component: Suche,
                meta: {
                    title: `Die Mürwiker - Suche`,
                    middleware: "user",
                }
            }
        ]
    },
    {
        name: "login",
        path: "/admin/login",
        component: Login,
        meta: {
            middleware: "admin",
            title: `Admin - Anmeldung`
        }
    },
    {
        name: "register",
        path: "/admin/register",
        component: Register,
        meta: {
            middleware: "admin",
            title: `Admin - Registrierung`
        }
    },
    // {
    //     path: "/admin/:catchAll(.*)",
    //     redirect: {
    //         name: 'art'
    //     },
    // },
    {
        path: "/admin/",
        component: AppLayoutAdmin,
        meta: {
            middleware: "auth"
        },
        children: [{
                name: "admin",
                path: '/admin/',
                component: Ansprechpartner,
                meta: {
                    title: `Admin`
                }
            },
            {
                name: "ansprechpartner",
                path: '/admin/ansprechpartner',
                component: Ansprechpartner,
                meta: {
                    title: `Admin - Ansprechpartner`
                }
            },
            {
                name: "wohnen",
                path: '/admin/wohnen',
                component: Wohnen,
                meta: {
                    title: `Admin - Wohnen`
                }
            },
            {
                name: "arbeit",
                path: '/admin/arbeit',
                component: Arbeit,
                meta: {
                    title: `Admin - Arbeit`
                }
            },
            {
                name: "tagesstaette",
                path: '/admin/tagesstaette',
                component: Tagesstaette,
                meta: {
                    title: `Admin - Tagesstaette`
                }
            },
            {
                name: "verwaltung",
                path: '/admin/verwaltung',
                component: Verwaltung,
                meta: {
                    title: `Admin - Verwaltung`
                }
            },
            {
                name: "sonstige",
                path: '/admin/sonstige',
                component: Sonstige,
                meta: {
                    title: `Admin - Sonstige`
                }
            }
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    if (to.meta.middleware == "user") {
        next()
    } else {
        if (to.meta.middleware == "admin") {
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
    }
})

export default router

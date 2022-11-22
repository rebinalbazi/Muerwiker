import './bootstrap';
import '../sass/app.scss'
import Router from '@/router'
import store from '@/store'

import { createApp } from 'vue/dist/vue.esm-bundler';
import naive from 'naive-ui'

import { createVuestic } from 'vuestic-ui'

const app = createApp({})
app.use(Router)
app.use(store)
app.use(naive)
app.use(createVuestic())
app.mount('#app')


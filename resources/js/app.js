import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import { createRouter, createWebHistory } from 'vue-router';
import { createStore } from 'vuex';

import store from "./stores";

// const store = createStore({
//     stores
// });


import routes from "./routes/routes";

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title ? "Shanto" + " | " + to.meta.title : "Shanto";
    next();
});

import Admin from "../views/components/admin/AppView.vue";
import App from "../views/components/mdrkshanto/App.vue";

createApp({
    components:{Admin,App}
}).use(router).use(store).mount('body');

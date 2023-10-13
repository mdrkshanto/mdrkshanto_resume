import DashboardView from "../components/admin/dashboard/DashboardView.vue";
import AdminHomeView from "../components/admin/home/AdminHomeView.vue";
import AdminAbout from "../components/admin/about/AdminAbout.vue";
import AdminLogin from "../components/admin/auth/AdminLogin.vue";

export default [
    {
        path: '/',
        name: "home"
    },

    {
        path: '/login',
        name: "admin.login",
        meta: {
            title: 'Login'
        },
        component: AdminLogin,
    },

    {
        path: '/dashboard',
        name: "admin.dashboard",
        meta: {
            title: 'Dashboard'
        },
        component: DashboardView,
    },
    {
        path: '/home',
        name: "admin.home",
        meta: {
            title: 'Home'
        },
        component: AdminHomeView,
    },
    {
        path: '/about',
        name: "admin.about",
        meta: {
            title: 'About'
        },
        component: AdminAbout,
    }
]

import DashboardView from "../components/admin/dashboard/DashboardView.vue";
import AdminHomeView from "../components/admin/home/AdminHomeView.vue";
import AdminAbout from "../components/admin/about/AdminAbout.vue";

export default [
    {
        path: '/',
        name: "home"
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

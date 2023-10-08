import DashboardView from "../components/admin/dashboard/DashboardView.vue";
import AdminHomeView from "../components/admin/home/AdminHomeView.vue";

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
    }
]

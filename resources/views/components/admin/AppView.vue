<template>
    <div id="app" class="app" :class="$route.name == 'admin.login'?'app-full-height app-without-header':null">

        <HeaderView v-if="$route.name != 'admin.login'"/>
        <SidebarView v-if="$route.name != 'admin.login'"/>

        <div id="content" class="app-content" v-if="$route.name != 'admin.login'">
            <h1 class="page-header">{{$route.meta.title}}</h1>
            <router-view/>
        </div>
        <router-view v-if="$route.name == 'admin.login'"/>

        <span data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></span>

    </div>
</template>

<script>
    import HeaderView from "./includes/header/HeaderView.vue";
    import SidebarView from "./includes/sidebar/SidebarView.vue";
    import ThemePanelView from "./includes/theme-panel/ThemePanelView.vue";

    export default {
        name: "AppView",
        components: {
            HeaderView, SidebarView, ThemePanelView
        },
        mounted() {
            $('.pace-active').remove();
        }
    }
</script>

<style scoped>

</style>

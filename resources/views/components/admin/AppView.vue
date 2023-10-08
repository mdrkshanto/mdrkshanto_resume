<template>
    <div id="app" class="app">

        <HeaderView/>
        <SidebarView/>

        <div id="content" class="app-content">
            <h1 class="page-header">{{$route.meta.title}}</h1>

            <div class="row">

                <router-view/>

            </div>
        </div>

<!--        <ThemePanelView/>-->

        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

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

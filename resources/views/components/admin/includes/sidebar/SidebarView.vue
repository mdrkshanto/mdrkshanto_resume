<template>
    <div id="sidebar" class="app-sidebar">

        <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

            <div class="menu">
                <div class="menu-header">Navigation</div>
                <div class="menu-item" :class="$route.name == 'admin.dashboard'?'active': null">
                    <router-link :to="{name:'admin.dashboard'}" class="menu-link">
                        <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                        <span class="menu-text">Dashboard</span>
                    </router-link>
                </div>
                <div class="menu-item" :class="$route.name == 'admin.home'?'active': null">
                    <router-link :to="{name:'admin.home'}" class="menu-link">
                        <span class="menu-icon"><i class="bi bi-house-fill"></i></span>
                        <span class="menu-text">Home Contents</span>
                    </router-link>
                </div>
                <div class="menu-item" :class="$route.name == 'admin.about'?'active': null">
                    <router-link :to="{name:'admin.about'}" class="menu-link">
                        <span class="menu-icon"><i class="bi bi-person-lines-fill"></i></span>
                        <span class="menu-text">About Contents</span>
                    </router-link>
                </div>
            </div>
        </div>

    </div>


    <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>
</template>

<script>
    export default {
        name: "SidebarView"
    }
</script>

<style scoped>

</style>

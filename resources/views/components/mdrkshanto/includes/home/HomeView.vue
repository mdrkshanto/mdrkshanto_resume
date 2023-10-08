<template>
    <div class="col-lg-4 sticky-lg-top vh-100">
        <div class="d-flex flex-column h-100 text-center overflow-auto shadow">
            <NameView/>
            <SubtitleView/>
            <LinksView/>
            <ButtonsView/>
        </div>
    </div>
</template>

<script>
    import NameView from "./includes/name/NameView.vue";
    import SubtitleView from "./includes/subtitle/SubtitleView.vue";
    import LinksView from "./includes/social-media/LinksView.vue";
    import ButtonsView from "./includes/buttons/ButtonsView.vue";
    export default {
        name: "HomeView",
        components:{ButtonsView, LinksView, SubtitleView, NameView}
    }
</script>

<style scoped>

</style>

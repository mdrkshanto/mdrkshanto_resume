<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-body">
                <HomeNameView/>
                <HomeSubtitleView/>
                <HomeSocialMediaView/>
                <ButtonView/>
                <CardArrow/>
            </div>
        </div>
    </div>
</template>
<script>
    import HomeNameView from "./includes/name/HomeNameView.vue";
    import HomeSubtitleView from "./includes/subtitle/HomeSubtitleView.vue";
    import HomeSocialMediaView from "./includes/social-media/HomeSocialMediaView.vue";
    import CardArrow from "../../global/card/CardArrow.vue";
    import ButtonView from "./includes/button/ButtonView.vue";

    export default {
        name: "AdminHomeView",
        components: {ButtonView, CardArrow, HomeSocialMediaView, HomeSubtitleView, HomeNameView}
    }
</script>

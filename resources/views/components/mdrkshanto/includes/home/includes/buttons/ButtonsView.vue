<template>
    <div class="d-flex align-items-end justify-content-end border-top">
        <CVDownloadView/>
        <ContactView/>
    </div>
</template>

<script>
    import CVDownloadView from "./includes/download/CVDownloadView.vue";
    import ContactView from "./includes/contact/ContactView.vue";

    export default {
        name: "ButtonsView",
        components: {ContactView, CVDownloadView}
    }
</script>

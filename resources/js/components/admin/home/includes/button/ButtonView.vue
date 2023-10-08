<template>
    <div class="card">
        <div class="card-header">
            <span class="card-title">Buttons</span>
        </div>
        <div class="card-body">
            <AdminHomeCVDownloadButton/>
            <AdminHomeContactButton/>
        </div>
        <CardArrow/>
    </div>
</template>

<script>
    import CardArrow from "../../../../global/card/CardArrow.vue";
    import AdminHomeContactButton from "./includes/contact/AdminHomeContactButton.vue";
    import AdminHomeCVDownloadButton from "./includes/download/AdminHomeCVDownloadButton.vue";

    export default {
        name: "ButtonView",
        components: {AdminHomeCVDownloadButton, AdminHomeContactButton, CardArrow}
    }
</script>

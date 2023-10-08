<template>
    <div class="d-flex justify-content-center mt-auto mb-3">
        <a class="btn btn-secondary btn-square shadow-none mx-1" target="_blank" :href="media.link" :title="media.name"
           v-for="media in medias" v-html="media.icon"></a>
    </div>
</template>

<script>
    export default {
        name: "LinksView",
        data: () => ({
            medias: []
        }),
        methods: {
            getMedias() {
                axios.post('/get/contents').then((res) => {
                    this.medias = res.data.socialMedias;
                });
            }
        },
        created() {
            setInterval(()=>{
                this.getMedias()
            },1000)
        }
    }
</script>

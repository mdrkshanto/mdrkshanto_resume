<template>
    <a href="" class="btn w-50 border-end" v-if="status">Download CV</a>
</template>

<script>
    export default {
        name: "CVDownloadView",
        data: () => ({
            link: null,
            status: false,
        }),
        methods: {
            getDownloadButton() {
                axios.post('/get/contents').then((res) => {
                    let content = res.data.homeDownloadButton;
                    this.link = content.link;
                    if (content.status == 1) {
                        this.status = true
                    } else {
                        this.status = false
                    }
                });
            }
        },
        created() {
            setInterval(() => {
                this.getDownloadButton();
            }, 1000);
        }
    }
</script>

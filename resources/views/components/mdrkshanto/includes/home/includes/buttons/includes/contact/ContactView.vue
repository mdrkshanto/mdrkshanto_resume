<template>
    <a :href="link" class="btn w-50 btn-scroll" v-if="status">Contact Me</a>
</template>

<script>
    export default {
        name: "ContactView",
        data: () => ({
            link: null,
            status: false,
        }),
        methods: {
            getContactButton() {
                axios.post('/get/contents').then((res) => {
                    let content = res.data.homeContactButton;
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
                this.getContactButton();
            }, 1000);
        }
    }
</script>

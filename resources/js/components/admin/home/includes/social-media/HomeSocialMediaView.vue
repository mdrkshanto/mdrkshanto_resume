<template>
    <div class="card mb-3">
        <div class="card-body">
            <label class="form-label">Social Media Links</label>
            <div class="bg-success text-center fw-bolder mb-3" v-if="successMessage">{{successMessage}}</div>
            <div class="card card-body" v-if="socialMedias.length > 0">
                <div class="row">
                    <div class="col-auto bg-black rounded-2 m-1"
                         v-for="socialMedia in socialMedias">
                        <div class="row">
                            <a :href="socialMedia.link" target="_blank" class="col-auto" v-html="socialMedia.icon"></a>
                            <button class="btn btn-close btn-sm col-auto shadow-none small"
                                    @click="deleteThis(socialMedia.id)"></button>
                        </div>
                    </div>
                </div>
                <CardArrow/>
            </div>
            <div class="input-group input-group-sm">
                <input type="text" class="form-control shadow-none input-group-text"
                       placeholder="Media Name" v-model="socialMedia.name"
                       @keypress.enter="newSocialMedia" ref="name"/>
                <input type="text" class="form-control shadow-none input-group-text"
                       placeholder="FA Icon or Bootstrap Icon" v-model="socialMedia.icon"
                       @keypress.enter="newSocialMedia"/>
                <input type="text" class="form-control shadow-none input-group-text"
                       placeholder="Media Link" v-model="socialMedia.link"
                       @keypress.enter="newSocialMedia"/>
            </div>
            <span class="text-danger small fw-bolder me-2" v-if="socialMedia.errors.has('name')">{{socialMedia.errors.get('name')}}</span>
            <span class="text-danger small fw-bolder mx-2" v-if="socialMedia.errors.has('icon')">{{socialMedia.errors.get('icon')}}</span>
            <span class="text-danger small fw-bolder ms-2" v-if="socialMedia.errors.has('link')">{{socialMedia.errors.get('link')}}</span>
        </div>
        <div class="card-footer">
            <div class="row justify-content-between">
                <button class="btn btn-sm btn-lime col-auto shadow-none" @click="newSocialMedia">Submit</button>
                <button class="btn btn-sm btn-dark col-auto shadow-none" @click="resetMedia">Reset</button>
            </div>
        </div>
        <CardArrow/>
    </div>
</template>

<script>
    import CardArrow from "../../../../global/card/CardArrow.vue";

    export default {
        name: "HomeSocialMediaView",
        components: {CardArrow},
        mixins:[Helper],
        data: () => ({
            socialMedias: [],
            socialMedia: new Form({})
        }),
        methods: {
            newSocialMedia() {
                this.socialMedia.post('/create/home/social-media').then((res) => {
                    this.successMessage = res.data.message;
                    this.successMessageTimeout();
                });
                this.getSocialMedia();
                this.resetMedia()
            },
            getSocialMedia() {
                axios.post('/get/home/social-media').then((res) => {
                    this.socialMedias = res.data.allSocialMedia;
                });
            },
            deleteThis(id) {
                axios.post('/delete/home/' + id + '/social-media').then((res) => {
                    this.successMessage = res.data.message;
                    this.successMessageTimeout();
                });
                this.getSocialMedia();
                this.resetMedia()
            },
            resetMedia(){
                this.socialMedia.reset();
                this.$refs.name.focus();
            }
        },
        created() {
            this.getSocialMedia();
        },
    }
</script>

<style scoped>

</style>

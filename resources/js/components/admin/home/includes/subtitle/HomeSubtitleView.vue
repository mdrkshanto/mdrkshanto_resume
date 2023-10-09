<template>
    <div class="card mb-3">
        <div class="card-body mb-3">
            <label class="form-label">Subtitles</label>
            <div class="bg-success text-center fw-bolder mb-3" v-if="successMessage">{{successMessage}}</div>
            <div class="card card-body" v-if="subtitles.length > 0">
                <div class="row">
                    <div class="col-auto my-1" v-for="subtitle in subtitles">
                        <div class="card card-body bg-black py-0">
                            <div class="row">
                                <span class="col-auto">{{subtitle.subtitle}}</span>
                                <button class="btn btn-close btn-sm col-auto shadow-none small"
                                        @click="deleteSubtitle(subtitle.id)"></button>
                            </div>
                            <CardArrow/>
                        </div>
                    </div>
                </div>
                <CardArrow/>
            </div>
            <input type="text" v-model.trim="subtitle.subtitle"
                   class="form-control form-control-sm shadow-none"
                   placeholder="Subtitle" @keypress.enter="subtitleSubmit" ref="subtitle"/>
            <span class="text-danger small fw-bolder" v-if="subtitle.errors.has('subtitle')">{{subtitle.errors.get('subtitle')}}</span>
        </div>
        <div class="card-footer">
            <div class="row justify-content-between">
                <button class="btn btn-sm btn-lime col-auto" @click="subtitleSubmit">Submit</button>
                <button class="btn btn-sm btn-dark col-auto" @click="subtitle.subtitle=null">Reset</button>
            </div>
        </div>
        <CardArrow/>
    </div>
</template>

<script>
    import CardArrow from "../../../../global/card/CardArrow.vue";

    export default {
        name: "HomeSubtitleView",
        components: {CardArrow},
        mixins: [Helper],
        data: () => ({
            subtitles: [],
            subtitle: new Form({}),
        }),
        methods: {
            subtitleSubmit() {
                this.subtitle.post('/create/home/subtitle').then((res) => {
                    this.successMessage = res.data.message;
                    this.successMessageTimeout();
                });
                this.getSubtitles();
                this.subtitle.subtitle = null;
                this.$refs.subtitle.focus();
            },
            getSubtitles() {
                axios.post('/get/home/subtitle').then((res) => {
                    this.subtitles = res.data.subtitles;
                });
            },
            deleteSubtitle(id) {
                axios.post('/delete/home/' + id + '/subtitle').then((res) => {
                    this.successMessage = res.data.message;
                    this.successMessageTimeout();
                });
                this.getSubtitles();
            }
        },
        created() {
            this.getSubtitles();
        },
    }
</script>

<style scoped>

</style>

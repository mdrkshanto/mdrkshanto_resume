<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header card-title">About Contents</h4>
                <div class="card-body">
                    <div class="bg-success text-center fw-bolder mb-3" v-if="successMessage">{{successMessage}}</div>
                    <div class="row mb-3">
                        <label class="col-md-3">Page Title</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm shadow-none"
                                   :class="about.errors.has('page_title') ? 'is-invalid' : null"
                                   v-model.trim="about.page_title" placeholder="Page Title" ref="pageTitle"/>
                            <span class="small text-danger fw-bolder" v-if="about.errors.has('page_title')">{{about.errors.get('page_title')}}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3">Objective</label>
                        <div class="col-md-9">
                            <textarea class="form-control shadow-none" :class="about.errors.has('object') ? 'is-invalid' : null" placeholder="Object" v-model.trim="about.object"></textarea>
                            <span class="text-danger small fw-bolder"
                                  v-if="about.errors.has('object')">{{about.errors.get('object')}}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input shadow-none" id="objectStatus"
                                       v-model="about.object_status">
                                <label for="objectStatus" class="fw-bolder"
                                       :class="about.object_status ? 'text-success' : 'text-danger'">{{about.object_status
                                    ? 'Active' : 'Inactive'}}</label>
                            </div>
                            <span class="text-danger small fw-bolder"
                                  v-if="about.errors.has('object_status')">{{about.errors.get('object_status')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button class="btn btn-sm shadow-none btn-primary w-100"
                                    @click="createOrUpdateAboutContent">Submit
                            </button>
                        </div>
                    </div>
                </div>
                <CardArrow/>
            </div>
        </div>
    </div>
    <AdminAboutComponentsView/>
</template>

<script>
    import CardArrow from "../../global/card/CardArrow.vue";
    import AdminAboutComponentsView from "./includes/components/AdminAboutComponentsView.vue";

    export default {
        name: "AdminAbout",
        components: {AdminAboutComponentsView, CardArrow},
        mixins: [Helper],
        data: () => ({
            about: new Form({
                table: 'about_content',
                object_status: false
            })
        }),
        methods: {
            createOrUpdateAboutContent() {
                this.about.post('/create-or-update/about/content').then((res) => {
                    this.successMessage = res.data.message;
                    this.successMessageTimeout()
                    this.getAboutContent();
                    this.$refs.pageTitle.focus();
                });
            },
            getAboutContent() {
                axios.post('/get/about/content').then((res) => {
                    let aboutContent = res.data.aboutContent;
                    this.about.page_title = aboutContent.page_title;
                    this.about.object = aboutContent.object;
                    aboutContent.object_status == 1 ? this.about.object_status = true : this.about.object_status = false;
                });
            }
        },
        created() {
            this.getAboutContent();
        },
        mounted() {
            this.$refs.pageTitle.focus();
        }
    }
</script>
<style scoped>
    textarea {
        min-height: 15rem;
        resize: none;
        text-align: justify;
    }
</style>

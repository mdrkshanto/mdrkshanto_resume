<template>
    <!-- About Start -->
    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="title pb-3 mb-5">{{content.page_title}}</h1>
        <p v-if="content.object_status == 1">{{content.object}}</p>
        <div class="row mb-4">
            <div class="col-sm-6 py-1" v-for="component in components">
                <span class="fw-medium text-primary">{{component.field_name}}:</span> <template v-if="component.field_type == 1">{{moment(component.field_value).format('DD MMMM, YYYY')}}</template> <template v-else>{{component.field_value}}</template>
            </div>
        </div>
        <!-- <div class="row g-4">
            <div class="col-md-4 col-lg-6 col-xl-4">
                <div class="d-flex bg-secondary p-4">
                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">10</h1>
                    <div class="ps-3">
                        <p class="mb-0">Years of</p>
                        <h5 class="mb-0">Experience</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 col-xl-4">
                <div class="d-flex bg-secondary p-4">
                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">100</h1>
                    <div class="ps-3">
                        <p class="mb-0">Happy</p>
                        <h5 class="mb-0">Clients</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-6 col-xl-4">
                <div class="d-flex bg-secondary p-4">
                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">200</h1>
                    <div class="ps-3">
                        <p class="mb-0">Complete</p>
                        <h5 class="mb-0">Projects</h5>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
    <!-- About End -->
</template>

<script>
    export default {
        name: "AboutView",
        mixins:[Helper],
        data:()=>({
            content: {},
            components: []
        }),
        methods:{
            getAboutItems(){
                axios.post('/get/contents').then((response)=>{
                    this.content = response.data.aboutContent;
                    this.components = response.data.aboutComponents;
                });
            }
        },
        created() {
            setInterval(()=>{
                this.getAboutItems();
            },1000)
        },
        mounted() {
            // Facts counter
            $('[data-toggle="counter-up"]').counterUp({
                delay: 10,
                time: 2000
            });
        }
    }
</script>

<style scoped>

</style>

<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header card-title">About Contents</h4>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-md-3">Page Title</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm shadow-none"
                                   v-model.trim="form.page_title" placeholder="Page Title"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3">Objective</label>
                        <div class="col-md-9">
                            <textarea class="form-control shadow-none" placeholder="Object"
                                      v-model.trim="form.object"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input shadow-none" id="status">
                                <label for="status">Active | Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button class="btn btn-sm shadow-none btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </div>
                <CardArrow/>
            </div>
        </div>
    </div>
    <ComponentsView/>
</template>

<script>
    import CardArrow from "../../global/card/CardArrow.vue";
    import ComponentsView from "./includes/ComponentsView.vue";

    export default {
        name: "AdminAbout",
        components: {ComponentsView, CardArrow},
        data: () => ({
            form: new Form({})
        }),
        methods: {}
    }
</script>

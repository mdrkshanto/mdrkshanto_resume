<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center justify-content-between">
                        <h4 class="card-title col-md-auto">Component List</h4>
                        <span class="btn btn-sm shadow-none btn-primary col-md-auto" data-bs-toggle="modal"
                              data-bs-target="#addComponent" @click="addNewComponent"><i
                            class="bi bi-plus-lg"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center fw-bolder" v-if="successMessage">
                        {{successMessage}}
                    </div>

                    <table class="table table-dark table-sm table-striped table-hover text-center align-middle">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="component in components">
                            <td>{{component.field_name}}</td>
                            <td v-if="component.field_type">{{moment(component.field_value).format('DD MMMM, YYYY')}}
                            </td>
                            <td v-else>{{component.field_value}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <span class="btn shadow-none btn-info" data-bs-toggle="modal"
                                          data-bs-target="#editComponent" @click="editComponent(component.id)">
                                        <i class="bi bi-pencil-square"></i>
                                    </span>

                                    <span class="btn btn-danger shadow-none" data-bs-toggle="modal"
                                          data-bs-target="#deleteComponent" @click="id = component.id"><i
                                        class="bi bi-trash"></i></span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <CardArrow/>
            </div>
        </div>
    </div>
    <!--  Add Modal Start  -->
    <div class="modal fade" id="addComponent" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between align-items-center">
                                <h4 class="card-title col-md-auto">Add new component</h4>
                                <span class="btn-close shadow-none btn-sm col-md-auto" data-bs-dismiss="modal"
                                      ref="addClose" @click="resetComponent"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Field Name</label>
                                <input type="text" class="form-control form-control-sm shadow-none"
                                       :class="aboutComponent.errors.has('field_name')?'is_invalid':null"
                                       placeholder="Field Name" ref="fieldName" v-model="aboutComponent.field_name"/>
                                <span class="small text-danger fw-bolder"
                                      v-if="aboutComponent.errors.has('field_name')">{{aboutComponent.errors.get('field_name')}}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Value</label>
                                <input :type="aboutComponent.field_type?'date':'text'"
                                       class="form-control form-control-sm shadow-none" placeholder="Value"
                                       v-model="aboutComponent.field_value"
                                       :class="aboutComponent.errors.has('field_value')?'is_invalid':null"/>
                                <span class="small text-danger fw-bolder"
                                      v-if="aboutComponent.errors.has('field_value')">{{aboutComponent.errors.get('field_value')}}</span>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input shadow-none" id="fieldType"
                                           v-model="aboutComponent.field_type"
                                           :class="aboutComponent.errors.has('field_type')?'is_invalid':null">
                                    <label for="fieldType" class="form-check-label"
                                           :class="aboutComponent.field_type?null:'text-muted'">Field Type
                                        {{aboutComponent.field_type?'Date':'Text'}}</label>
                                </div>
                                <span class="small text-danger fw-bolder"
                                      v-if="aboutComponent.errors.has('field_type')">{{aboutComponent.errors.get('field_type')}}</span>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input shadow-none"
                                           :class="aboutComponent.errors.has('field_status')?'is_invalid':null"
                                           id="status" v-model="aboutComponent.field_status"/>
                                    <label for="status" class="form-check-label fw-bolder"
                                           :class="aboutComponent.field_status?'text-success':'text-danger'">{{aboutComponent.field_status?'Active':'Inactive'}}</label>
                                </div>
                                <span class="small text-danger fw-bolder"
                                      v-if="aboutComponent.errors.has('field_status')">{{aboutComponent.errors.get('field_status')}}</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-items-center justify-content-between">
                                <span class="btn btn-sm shadow-none btn-primary col-md-auto" @click="createComponent">Add new</span>
                            </div>
                        </div>
                        <CardArrow/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Add Modal End  -->

    <!--  Edit Modal Start  -->
    <div class="modal fade" id="editComponent" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between align-items-center">
                                <h4 class="card-title col-md-auto">Edit component</h4>
                                <span class="btn-close shadow-none btn-sm col-md-auto" data-bs-dismiss="modal"
                                      @click="resetComponent" ref="editClose"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Field Name</label>
                                <input type="text" class="form-control form-control-sm shadow-none"
                                       :class="aboutComponent.errors.has('field_name')?'is_invalid':null"
                                       placeholder="Field Name" ref="fieldName" v-model="aboutComponent.field_name"/>
                                <span class="small text-danger fw-bolder"
                                      v-if="aboutComponent.errors.has('field_name')">{{aboutComponent.errors.get('field_name')}}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Value</label>
                                <input :type="aboutComponent.field_type?'date':'text'"
                                       class="form-control form-control-sm shadow-none" placeholder="Value"
                                       v-model="aboutComponent.field_value"
                                       :class="aboutComponent.errors.has('field_value')?'is_invalid':null"/>
                                <span class="small text-danger fw-bolder"
                                      v-if="aboutComponent.errors.has('field_value')">{{aboutComponent.errors.get('field_value')}}</span>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input shadow-none" id="editFieldType"
                                           v-model="aboutComponent.field_type"
                                           :class="aboutComponent.errors.has('field_type')?'is_invalid':null">
                                    <label for="editFieldType" class="form-check-label"
                                           :class="aboutComponent.field_type?null:'text-muted'">Field Type
                                        {{aboutComponent.field_type?'Date':'Text'}}</label>
                                </div>
                                <span class="small text-danger fw-bolder"
                                      v-if="aboutComponent.errors.has('field_type')">{{aboutComponent.errors.get('field_type')}}</span>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input shadow-none"
                                           :class="aboutComponent.errors.has('field_status')?'is_invalid':null"
                                           id="editStatus" v-model="aboutComponent.field_status"/>
                                    <label for="editStatus" class="form-check-label fw-bolder"
                                           :class="aboutComponent.field_status?'text-success':'text-danger'">{{aboutComponent.field_status?'Active':'Inactive'}}</label>
                                </div>
                                <span class="small text-danger fw-bolder"
                                      v-if="aboutComponent.errors.has('field_status')">{{aboutComponent.errors.get('field_status')}}</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-items-center justify-content-between">
                                <span class="btn btn-sm shadow-none btn-primary"
                                      @click="updateComponent(id)">Update</span>
                            </div>
                        </div>
                        <CardArrow/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Edit Modal End  -->

    <!--  Delete Modal Start  -->
    <div class="modal fade" id="deleteComponent" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body py-5">
                            <div class="row justify-content-center py-5">
                                <h4 class="col-auto text-center fw-bolder text-danger">Are you sure to delete the
                                    component.</h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-items-center justify-content-between">
                                <span class="btn btn-sm shadow-none btn-warning col-md-auto"
                                      @click="deleteComponent(id)">Yes</span>
                                <span class="btn btn-sm shadow-none btn-secondary col-md-auto"
                                      data-bs-dismiss="modal" @click="resetComponent" ref="deleteClose">No</span>
                            </div>
                        </div>
                        <CardArrow/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Delete Modal End  -->
</template>

<script>
    import CardArrow from "../../../../global/card/CardArrow.vue";

    export default {
        name: "AdminAboutComponentsView",
        components: {CardArrow},
        mixins: [Helper],
        data: () => ({
            id: null,
            components: [],
            aboutComponent: new Form({})
        }),
        methods: {
            addNewComponent() {
                this.aboutComponent = new Form({
                    field_type: false,
                    field_status: true
                });
            },
            createComponent() {
                this.aboutComponent.post('/create/about/component').then((res) => {
                    this.successMessage = res.data.message;
                    this.successMessageTimeout();
                    this.getComponents();
                    this.resetComponent();
                    this.$refs.fieldName.focus();
                });
                this.$refs.addClose.click();
            },
            resetComponent() {
                this.id = null,
                this.aboutComponent = new Form({
                    field_type: false,
                    field_status: true
                });
            },
            getComponents() {
                axios.post('/get/about/components').then((res) => {
                    this.components = res.data.aboutComponents
                })
            },
            editComponent(id) {
                this.id = id;
                axios.post('/get/about/' + id + '/component').then((res) => {
                    let component = res.data.aboutComponent
                    this.aboutComponent = new Form({
                        field_name: component.field_name,
                        field_value: component.field_value,
                        field_type: Boolean(component.field_type),
                        field_status: Boolean(component.field_status)
                    });
                })
            },
            updateComponent(id) {
                this.aboutComponent.post('/update/about/' + id + '/component').then((res) => {
                    this.successMessage = res.data.message;
                    this.successMessageTimeout();
                    this.getComponents();
                    this.editComponent(id);
                    this.$refs.fieldName.focus();
                });
                this.$refs.editClose.click();
            },
            deleteComponent(id) {
                axios.post('/delete/about/' + id + '/component').then((res) => {
                    this.successMessage = res.data.message;
                    this.successMessageTimeout();
                    this.getComponents();
                })
                this.$refs.deleteClose.click();
            }
        },
        created() {
            this.getComponents();
        }
    }
</script>

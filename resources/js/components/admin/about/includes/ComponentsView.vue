<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center justify-content-between">
                        <h4 class="card-title col-md-auto">Component List</h4>
                        <span class="btn btn-sm shadow-none btn-primary col-md-auto" data-bs-toggle="modal" data-bs-target="#addComponent"><i
                            class="bi bi-plus-lg"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-sm table-striped table-hover text-center align-middle">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Field</td>
                            <td>Value</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <span class="btn shadow-none btn-info" data-bs-toggle="modal"
                                          data-bs-target="#editComponent"><i class="bi bi-pencil-square"></i></span>
                                    <span class="btn btn-danger shadow-none"><i class="bi bi-trash"></i></span>
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
    <!--  Modal Start  -->
    <div class="modal fade" id="addComponent" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between align-items-center">
                                <h4 class="card-title col-md-auto">Add new component</h4>
                                <span class="btn-close shadow-none btn-sm col-md-auto" data-bs-dismiss="modal"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Field Name</label>
                                <input type="text" class="form-control form-control-sm shadow-none"
                                       placeholder="Field Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Value</label>
                                <input type="text" class="form-control form-control-sm shadow-none" placeholder="Value">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input shadow-none" id="status">
                                    <label for="status">Active | Inactive</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-items-center justify-content-between">
                                <span class="btn btn-sm shadow-none btn-primary col-md-auto">Add new</span>
                            </div>
                        </div>
                        <CardArrow/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal End  -->
</template>

<script>
    import CardArrow from "../../../global/card/CardArrow.vue";
    export default {
        name: "ComponentsView",
        components: {CardArrow}
    }
</script>

<template>
    <div class="card mb-3">
        <div class="card-header">
            <div class="card-title">Download Button</div>
        </div>
        <div class="card-body">
            <div class="bg-success text-center fw-bolder mb-3" v-if="successMessage">{{successMessage}}</div>
            <div class="mb-3">
                <label>Button Link</label>
                <input type="text" class="form-control form-control-sm shadow-none" placeholder="Button link"
                       v-model.trim="form.link">
            </div>
            <div class="form-check">
                <input class="form-check-input shadow-none" type="checkbox" id="downloadButtonStatus"
                       v-model="form.status" ref="download">
                <label class="form-check-label fw-bolder" :class="form.status == true ? 'text-success' :
                    'text-warning'" for="downloadButtonStatus">{{form.status == true ? 'Active' :
                    'Inactive'}}</label>
            </div>
        </div>
        <div class="card-footer">
            <span class="btn btn-sm btn-primary shadow-none" @click="createOrUpdateButton">Submit</span>
        </div>
        <CardArrow/>
    </div>
</template>

<script>
    import CardArrow from "../../../../../../global/card/CardArrow.vue";

    export default {
        name: "AdminHomeCVDownloadButton",
        components: {CardArrow},
        mixins:[Helper],
        data: () => ({
            form: new Form({
                name: 'download',
                status: false,
            }),
        }),
        methods: {
            createOrUpdateButton() {
                this.form.post('/create-or-update/home/button').then((res) => {
                    this.successMessage = res.data.message;
                    this.successMessageTimeout();
                });
                this.getDownloadButton();
            },
            getDownloadButton() {
                axios.post('/get/home/download/button').then((res) => {
                    let button = res.data.cvDownloadHomeButton;
                    if (button.status == 1) {
                        this.form.status = true
                    } else {
                        this.form.status = false
                    }
                    this.form.link = button.link;
                })
            }
        },
        created() {
            this.getDownloadButton();
        }
    }
</script>

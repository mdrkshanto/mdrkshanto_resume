<template>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Contact Button</div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label>Button Link</label>
                <input type="text" class="form-control form-control-sm shadow-none" placeholder="Button link"
                       v-model.trim="form.link">
            </div>
            <div class="form-check">
                <input class="form-check-input shadow-none" type="checkbox" id="contactButtonStatus"
                       v-model="form.status">
                <label class="form-check-label fw-bolder" :class="form.status == true ? 'text-success' :
                    'text-warning'" for="contactButtonStatus">{{form.status == true ? 'Active' :
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
        name: "AdminHomeContactButton",
        components: {CardArrow},
        data: () => ({
            form: new Form({
                name: 'contact',
                status: false,
            }),
        }),
        methods:{
            createOrUpdateButton() {
                this.form.post('/create-or-update/home/button');
                this.getContactButton();
            },
            getContactButton() {
                axios.post('/get/home/contact/button').then((res) => {
                    let button = res.data.contactHomeButton;
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
            this.getContactButton();
        }
    }
</script>

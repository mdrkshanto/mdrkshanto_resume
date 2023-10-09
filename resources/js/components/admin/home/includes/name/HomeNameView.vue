<template>
    <div class="card mb-3">
        <div class="card-body">
            <div class="bg-success text-center fw-bolder mb-3" v-if="successMessage">{{successMessage}}</div>
            <div class="mb-3">
                <label class="form-label">Profile Image</label>
                <input type="file" class="form-control form-control-sm shadow-none" @change="profileImage" ref="profileImage"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" v-model="name.name" class="form-control form-control-sm shadow-none"
                       placeholder="Full Name" ref="name" @keypress.enter="nameSubmit"/>
                <span class="text-danger small fw-bolder"
                      v-if="name.errors.has('name')">{{name.errors.get('name')}}</span>
            </div>
        </div>
        <div class="card-footer">
            <div class="row justify-content-between">
                <button class="btn btn-sm btn-lime col-auto" @click="nameSubmit">Submit</button>
                <button class="btn btn-sm btn-dark col-auto" @click="name.image = null">Reset</button>
            </div>
        </div>
        <CardArrow/>
    </div>
</template>

<script>
    import CardArrow from "../../../../global/card/CardArrow.vue";

    export default {
        name: "HomeNameView",
        components: {CardArrow},
        data: () => ({
            name: new Form({
                unique_id : 'only-me'
            })
        }),
        mixins:[Helper],
        methods: {
            profileImage(event) {
                this.name.image = event.target.files[0];
            },
            getHomeName() {
                axios.post('/get/home/name').then((response) => {
                    let getHomeName = response.data.homeName;
                    this.name.image = null;
                    this.name.name = getHomeName.name;
                });
            },
            nameSubmit() {
                this.name.post('/admin/create-or-update-home-name').then((res) => {
                    this.getHomeName();
                    this.successMessage = res.data.message;
                    this.successMessageTimeout();
                });
                this.$refs.profileImage.value = null;
                this.$refs.name.focus();
            }
        },
        created() {
            this.getHomeName()
        },
    }
</script>

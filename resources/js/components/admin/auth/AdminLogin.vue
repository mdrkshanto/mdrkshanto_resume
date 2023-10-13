<template>
    <div class="login">
        <div class="login-content">
            <h1 class="text-center">Sign In</h1>
            <div class="text-inverse text-opacity-50 text-center mb-4">
                For your protection, please verify your identity.
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg bg-inverse bg-opacity-5 shadow-none"
                       v-model="signin.email" placeholder="Email Address" ref="email">
                <span class="small text-danger fw-bolder" v-if="signin.errors.has('email')">{{signin.errors.get('email')}}</span>
            </div>
            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label">Password <span class="text-danger">*</span></label>
                    <a href="#" class="ms-auto text-inverse text-decoration-none text-opacity-50">Forgot password?</a>
                </div>
                <input type="password" class="form-control form-control-lg bg-inverse bg-opacity-5 shadow-none"
                       v-model="signin.password" placeholder="Password">
                <span class="small text-danger fw-bolder" v-if="signin.errors.has('password')">{{signin.errors.get('password')}}</span>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input shadow-none" type="checkbox" v-model="signin.remember"
                           id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <span class="small text-danger fw-bolder" v-if="signin.errors.has('remember')">{{signin.errors.get('remember')}}</span>
            </div>
            <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3 shadow-none"
                    @click="login">Sign In
            </button>
        </div>

    </div>
</template>

<script>
    export default {
        name: "AdminLogin",
        data: () => ({
            signin: new Form({})
        }),
        methods: {
            login() {
                this.signin.post('/login').then((response) => {
                    if (response.status == 200) {
                        this.$router.push({name: 'admin.dashboard'});
                    }
                });
            }
        },
        mounted() {
            this.$refs.email.focus();
        }
    }
</script>

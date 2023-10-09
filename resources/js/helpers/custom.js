export default {
    data: () => ({
        successMessage: null
    }),
    methods: {
        successMessageTimeout() {
            setTimeout(() => {
                this.successMessage = null
            }, 3000)
        }
    }
}

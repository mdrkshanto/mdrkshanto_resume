<template>
    <img class="w-100 img-fluid mb-4" :src="image" :alt="name">
    <h3 class="text-primary mt-2 text-capitalize">{{name}}</h3>
</template>

<script>
    export default {
        name: "NameView",
        data:()=>({
            image: null,
            name:null,
        }),
        methods:{
            getName(){
                axios.post('/get/contents').then((res)=>{
                    let content = res.data.name;
                    this.image = content.image;
                    this.name = content.name;
                });
            }
        },
        updated() {
            this.getName();
        },
        created() {
            this.getName();
        },
        mounted() {
            // setInterval(()=>{
            //     this.getName();
            // },1000);

            this.getName();
        }
    }
</script>

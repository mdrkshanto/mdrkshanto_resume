<template>
    <div class="mb-4" style="height: 22px;">
        <h4 class="typed-text-output d-inline-block text-light"></h4>
    </div>
</template>

<script>
    export default {
        name: "SubtitleView",
        data: () => ({
            subtitles: []
        }),
        methods: {
            getSubtitles() {
                axios.post('/get/contents').then((res) => {
                    let contents = res.data.homeSubtitles;
                    this.subtitles = contents.map(subtitle => subtitle.subtitle);
                });
            }
        },
        created() {
            this.getSubtitles()
        },
        watch: {
            subtitles(newSubtitles) {
                if ($('.typed-text-output').length == 1) {
                    new Typed('.typed-text-output', {
                        strings: newSubtitles,
                        typeSpeed: 100,
                        backSpeed: 20,
                        smartBackspace: false,
                        loop: true,
                        interval:1000
                    });
                }
            }
        }
    }
</script>

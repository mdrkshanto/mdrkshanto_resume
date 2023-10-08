<template>
    <SpinnerView/>

    <div class="container">
        <div class="row g-5">
            <HomeView/>
            <div class="col-lg-8">
                <AboutView/>

                <SkillsView/>

                <ExpericenceView/>

                <ServecesView/>

                <PortfolioView/>
                <TestimonialsView/>
                <ContactView/>
            </div>
        </div>
    </div>


    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</template>

<script>
    import HomeView from "./includes/home/HomeView.vue";
    import SpinnerView from "./includes/spinner/SpinnerView.vue";
    import AboutView from "./includes/about/AboutView.vue";
    import SkillsView from "./includes/skills/SkillsView.vue";
    import ExpericenceView from "./includes/expericence/ExpericenceView.vue";
    import ServecesView from "./includes/services/ServecesView.vue";
    import PortfolioView from "./includes/portfolio/PortfolioView.vue";
    import TestimonialsView from "./includes/testimonials/TestimonialsView.vue";
    import ContactView from "./includes/contact/ContactView.vue";

    export default {
        name: "App",
        components: {
            HomeView,
            SpinnerView,
            AboutView,
            SkillsView,
            ExpericenceView,
            ServecesView,
            PortfolioView,
            TestimonialsView,
            ContactView,
        },
        mounted() {


            // Initiate the wowjs
            new WOW().init();


            // Smooth scrolling to section
            $(".btn-scroll").on('click', function (event) {
                if (this.hash !== "") {
                    event.preventDefault();

                    $('html, body').animate({
                        scrollTop: $(this.hash).offset().top - 0
                    }, 1500, 'easeInOutExpo');
                }
            });


            // Back to top button
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.back-to-top').fadeIn('slow');
                } else {
                    $('.back-to-top').fadeOut('slow');
                }
            });
            $('.back-to-top').click(function () {
                $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
                return false;
            });
        }
    }
</script>

<style scoped>
</style>

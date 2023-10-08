<template>
    <!-- Portfolio Start -->
    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="title pb-3 mb-5">Portfolio</h1>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 text-center mb-2">
                        <ul class="list-inline mb-4" id="portfolio-flters">
                            <li class="btn btn-secondary active" data-filter=""><i
                                class="fa fa-star me-2"></i>All
                            </li>
                            <li class="btn btn-secondary" data-filter=".first"><i
                                class="fa fa-laptop-code me-2"></i>Design
                            </li>
                            <li class="btn btn-secondary" data-filter=".second"><i
                                class="fa fa-mobile-alt me-2"></i>Development
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container">
                    <div class="col-md-6 mb-4 portfolio-item first">
                        <div class="position-relative overflow-hidden mb-2">
                            <img class="img-fluid w-100" src="/mdrkshanto/assets/img/portfolio-1.jpg"
                                 alt="">
                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                <a href="/mdrkshanto/assets/img/portfolio-1.jpg" data-lightbox="portfolio">
                                    <i class="bi bi-plus text-light"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 portfolio-item second">
                        <div class="position-relative overflow-hidden mb-2">
                            <img class="img-fluid w-100" src="/mdrkshanto/assets/img/portfolio-2.jpg"
                                 alt="">
                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                <a href="/mdrkshanto/assets/img/portfolio-2.jpg" data-lightbox="portfolio">
                                    <i class="bi bi-plus text-light"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 portfolio-item first">
                        <div class="position-relative overflow-hidden mb-2">
                            <img class="img-fluid w-100" src="/mdrkshanto/assets/img/portfolio-3.jpg"
                                 alt="">
                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                <a href="/mdrkshanto/assets/img/portfolio-3.jpg" data-lightbox="portfolio">
                                    <i class="bi bi-plus text-light"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 portfolio-item second">
                        <div class="position-relative overflow-hidden mb-2">
                            <img class="img-fluid w-100" src="/mdrkshanto/assets/img/portfolio-4.jpg"
                                 alt="">
                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                <a href="/mdrkshanto/assets/img/portfolio-4.jpg" data-lightbox="portfolio">
                                    <i class="bi bi-plus text-light"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio End -->
</template>

<script>
    export default {
        name: "PortfolioView",
        mounted() {
            // Portfolio isotope and filter
            $('#portfolio-flters li').on('click', function () {
                $("#portfolio-flters li").removeClass('active');
                $(this).addClass('active');

                $('.portfolio-container').isotope({filter: $(this).data('filter')});
            });
        }
    }
</script>

<style scoped>

</style>

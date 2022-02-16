<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/splide.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#image-slider', {
            cover: true,
            heightRatio: 0.35,
            type: 'loop',
            autoplay: true,
        }).mount();
    });
</script>

<?php
require_once 'config/config.php';
require_once 'config/helper.php';
?>

<!-- footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<br><br>
<footer class=" bg-black">

    <p><?php echo "Waktu Sekarang : " . date("Y-m-d") ;?></p>

</footer>
<p class="bg-black">&copy; Bootstrapmade</p>
<script>
function jam() {
    var e = document.getElementById('jam'),
        d = new Date(),
        h, m, s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    e.innerHTML = h + ':' + m + ':' + s;

    setTimeout('jam()', 1000);
}
</script>
<!-- Vendor JS Files -->
<script src="<?= BASEURL; ?>public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= BASEURL; ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>public/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= BASEURL; ?>public/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= BASEURL; ?>public/assets/vendor/typed.js/typed.min.js"></script>
<script src="<?= BASEURL; ?>assets/vendor/php-email-form/validate.js"></script>

<!-- assets Main JS File -->
<script src="<?= BASEURL; ?>assets/js/main.js"></script>
<script src="<?= BASEURL; ?>public/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/bootstrap/js/popper.js"></script>
<script src="<?= BASEURL; ?>public/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/select2/select2.min.js"></script>
<script>
$(".js-select2").each(function() {
    $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
    });
})
</script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?= BASEURL; ?>public/assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/slick/slick.min.js"></script>
<script src="<?= BASEURL; ?>public/assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/parallax100/parallax100.js"></script>
<script>
$('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
$('.gallery-lb').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
            enabled: true
        },
        mainClass: 'mfp-fade'
    });
});
</script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/sweetalert/sweetalert.min.js"></script>
<script>
$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
    e.preventDefault();
});

$('.js-addwish-b2').each(function() {
    var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
    $(this).on('click', function() {
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-b2');
        $(this).off('click');
    });
});

$('.js-addwish-detail').each(function() {
    var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

    $(this).on('click', function() {
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-detail');
        $(this).off('click');
    });
});

/*---------------------------------------------*/

$('.js-addcart-detail').each(function() {
    var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
    $(this).on('click', function() {
        swal(nameProduct, "is added to cart !", "success");
    });
});
</script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
$('.js-pscroll').each(function() {
    $(this).css('position', 'relative');
    $(this).css('overflow', 'hidden');
    var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
    });

    $(window).on('resize', function() {
        ps.update();
    })
});
</script>
<!--===============================================================================================-->
<script src="<?= BASEURL; ?>public/assets/js/main.js"></script>
</body>

</html>
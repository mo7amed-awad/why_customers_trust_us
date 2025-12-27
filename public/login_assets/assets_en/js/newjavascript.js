    $(function () {
        "use strict";

        $('.dashboarr').on('click', function () {

            $('#show_search').fadeIn(500);

        });

        $('#show_search').on('click', function () {

            $(this).fadeOut(500);

        });

        $('#show_search .insert').on('click', function (e) {

            e.stopPropagation();

        });







        $('.pop_review').on('click', function () {

            $('#pop_reviews').fadeIn(500);

        });

        $('#pop_reviews').on('click', function () {

            $(this).fadeOut(500);

        });

        $('#pop_reviews .insert_1').on('click', function (e) {

            e.stopPropagation();

        });



        $('.login').on('click', function () {

            $('#log_in').fadeIn(500);

        });

        $('#log_in').on('click', function () {

            $(this).fadeOut(500);

        });

        $('#log_in .insert_2').on('click', function (e) {

            e.stopPropagation();

        });

        $('.signup').on('click', function () {

            $('#sign_up').fadeIn(500);

        });

        $('#sign_up').on('click', function () {

            $(this).fadeOut(500);

        });

        $('#sign_up .insert_2').on('click', function (e) {

            e.stopPropagation();

        });


        $('.navbar-light .navbar-nav .nav-item').on('click', function () {

            $(this).addClass('active').siblings().removeClass('active');
        });



        $('.thumbnails img').on('click', function () {

            'use strict';

            $('.thumbnails img').removeClass('selected');

            $(this).addClass('selected');

            $('.master-img img').attr('src', $(this).attr('src'));

        });


        $('.my_hover.pe-4.position-relative').mouseenter(function () {

            $('.inside_hover.py-4.px-3.border.index_over.shadow').fadeIn(300);

        });

        $('.inside_hover.py-4.px-3.border.index_over.shadow').mouseleave(function () {

            $(this).fadeOut(100);

        });


        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 40000,
            values: [8000, 30000],
            slide: function (event, ui) {
                $("#amount").val("{{ Session::get('currency')  }} " + " " + ui.values[ 0 ] + " - {{ Session::get('currency')  }}" + " " + ui.values[ 1 ]);
            }
        });
        $("#amount").val("{{ Session::get('currency')  }}" + " " + $("#slider-range").slider("values", 0) +
                " - {{ Session::get('currency')  }}" + " " + $("#slider-range").slider("values", 1));


        $('.thumbnails img').on('click', function () {

            'use strict';

            $('.thumbnails img').removeClass('selected');

            $(this).addClass('selected');

            $('.master-img img').attr('src', $(this).attr('src'));

        });

        $('.icon-heart-o').click(function () {

            $(this).toggleClass('icon-heart7');

        });

        $('i.icon-bin.h3.transition-me.point').on('click', function () {

            var index = $('i.icon-bin.h2.main_icon1.transition-me.point').index(this);

            $('.cart_order.py-4.position-relative').eq(index).fadeOut(500);

        });

        $('.profile .my-new-order .icon-cheveron-down').on('click', function () {
            var index = $('.my-new-order .icon-cheveron-down').index(this);

            $(this).toggleClass('icon-cheveron-up');

            $('.current-inside').eq(index).slideToggle(500);
            $('.previous-inside').eq(index).slideToggle(500);

        });


    });

    $(document).ready(function () {
        $('.quantity-plus').on('click', function () {
            var index = $('.quantity-plus').index(this);
            var quantity = parseInt($('.input_number').eq(index).val());
            $('.input_number').eq(index).val(quantity + 1);
        });
        $('.quantity-minus').on('click', function () {
            var index = $('.quantity-minus').index(this);
            var quantity = parseInt($('.input_number').eq(index).val());
            if (quantity > 1) {
                $('.input_number').eq(index).val(quantity - 1);
            }
        });
    });




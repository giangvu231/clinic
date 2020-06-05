$(document).ready(function () {
    if ($('li.dropdown-menu').length != 0) {
        $('li.dropdown-menu').click(function () {
            $(this).closest('form').children('.modun-edit').slideToggle();
            return false;
        });
    }
    if ($('ul li.close button').length != 0) {
        $('ul li.close button').click(function () {
            $(this).closest('.modun-edit').slideUp();
            return false;
        });
    }
    if ($('.account--menu1 p.user a').length != 0) {
        $('.account--menu1 p.user a').click(function () {
            $('.account--menu2').slideToggle();
            return false;
        });
        $('body').not('.account--menu2').click(function () {
            $('.account--menu2').slideUp();
        });

    }
    if ($('.next-drop__button').length != 0) {
        $('.next-drop__button').click(function () {
            // console.log(1);
            $(this).parent(".next-drop").find('.next-drop__menu2').slideToggle();
            return false;
        });
        $('body').not(this).click(function () {
            $('.next-drop__menu2').slideUp();
        });
    }
    var dem = $('.content--table > .row').length;
    for (i = 1; i < dem + 1; i++) {
        $('.content--table > .row:nth-child(' + i + ') .content--table__content').css('z-index', 1000 - i);
    }
    $('select.technicians').change(function () {
        $('select.technicians option:selected').each(function () {
            if ($(this).text() == 'Kỹ thuật viên') {
                $('.technicians--show').addClass('active');
            }
            if ($(this).text() != 'Kỹ thuật viên') {
                $('.technicians--show').removeClass('active');
            }
        });
    });
    if ($('#datepicker').length != 0) {
        $("#datepicker").datepicker();
    }
    // receptionist

    if ($('.header--btn li:nth-child(2)').length != 0) {
        var create = $('.header--btn li:nth-child(2)');
        $(create).click(function () {
            $('#popup').addClass('active');
        });
    }
    $('.popup button.clear').click(function () {
        $('#popup').removeClass('active');
    });
    $('.bg-popup').not('.popup').click(function () {
        $('#popup').removeClass('active');
    });

    //login
    if ($('.login--input svg.fa-eye').length != 0) {
        $('.login--input svg.fa-eye').click(function () {
            $('login--input input.pass').toggleClass('active');
        });
    }
    if ($('#editor1').length != 0) {
        CKEDITOR.replace('editor1');
    }

    //patient-status
    if ($('.show-hide p.show').length != 0) {
        $('.show-hide p.show').click(function () {
            $('.show-hide p').addClass('active');
            $(this).removeClass('active');
            $('.patient-status section').slideDown();
        });
    }
    if ($('.show-hide p.hide').length != 0) {
        $('.show-hide p.hide').click(function () {
            $('.show-hide p').addClass('active');
            $(this).removeClass('active');
            $('.patient-status section').slideUp();
            return false;
        });
    }
    if ($('.edit-result__save li.edit').length != 0) {
        $('.edit-result__save li.edit').click(function () {
            $('.edit-result__show').removeClass('active');
            $('.edit-result__edit').addClass('active');
            return false;
        });
    }
    if ($('.edit-result__act button.close').length != 0) {
        $('.edit-result__act button.close').click(function () {
            $('.edit-result__show').addClass('active');
            $('.edit-result__edit').removeClass('active');
            return false;
        });
    }
});

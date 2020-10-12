$('.section').hide();
setTimeout(function () {
    // Show Sections
    $('.section').fadeIn();
    $('.loader').fadeOut();
    $(document).ready(function () {
        // Init Side-Nav
        $('.button-collapse').sideNav();
        // Init Modal
        $('.modal').modal();
        // Init Select
        $('select').material_select();
        // Counter
        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now))
                }
            })
        });
    });
}, 1000);

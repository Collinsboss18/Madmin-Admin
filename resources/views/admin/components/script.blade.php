@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script>
            Materialize.toast('{{ $error }}', 4000);
        </script>
    @endforeach
@endif


<script>
    // Todo: Custom JavaScript And JQuery
    // Hide Sections
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
            // Comments Approve & Deny
            $('.approve').click(function (e) {
                Materialize.toast('Comment Approved', 3000);
                e.preventDefault();
            });
            $('.deny').click(function (e) {
                Materialize.toast('Comment Denied', 3000);
                e.preventDefault();
            });
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
            // Quick Todos
            $('#todo-form').submit(function (e) {
                e.preventDefault();
                const output = `<li class="collection-item">
                                    <div>${$('#todo').val()} <a href="#!" class="secondary-content delete"><i class="fa fa-close red-text"></i></a></div>
                                </li>`;
                $('.todos').append(output);
                Materialize.toast('Todo Added', 3000);
            });
            // Delete Todos
            $('.todos').on('click', '.delete', function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                Materialize.toast('Todo Added', 3000);
            })
        });
    }, 1000);

</script>

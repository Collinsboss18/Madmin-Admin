{{-- Header Include --}}
@include('admin.components.header')
<!-- Section: Navbar -->
@include('admin.components.nav')
<!-- Section: Stats -->
<main class="container">
    @yield('content')
</main>
{{-- Flash Messages --}}
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script>
            Materialize.toast('{{ $error }}', 4000);
        </script>
    @endforeach
@endif
@if(Session::has('msg'))
    <script>
        Materialize.toast("{{ session('msg') }}", 4000);
    </script>
@endif
<!-- Preloader -->
@include('admin.components.preloader')
<!-- Scripts -->
@include('admin.components.script')
{{-- Footer Include --}}
@include('admin.components.footer')

{{-- Header Include --}}
@include('admin.components.header')
<!-- Section: Navbar -->
@include('admin.components.nav')
<!-- Section: Stats -->
<main class="container">
    @yield('content')
</main>
<!-- Modals -->
@include('admin.components.modal')
<!-- Preloader -->
@include('admin.components.preloader')
<!-- Scripts -->
@include('admin.components.script')
{{-- Footer Include --}}
@include('admin.components.footer')

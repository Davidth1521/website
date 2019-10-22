@include('layouts.master.header')
<!-- begin::main content -->
<main class="main-content">

    <div class="container-fluid">
        <!-- end::page header -->
        @yield('content')
    </div>

</main>
@include('layouts.master.footer')
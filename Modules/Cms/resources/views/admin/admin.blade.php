<!DOCTYPE html>
<html lang="en">
@include('Cms::admin.head')
<body class="g-sidenav-show  bg-gray-200">
  @include('Cms::admin.slidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @yield('content')
      @include('Cms::admin.footer')
    </div>
  </main>
  @include('Cms::admin.script')
</body>

</html>

<!DOCTYPE html>
<html>
@include('admin.templates.partials._head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin.templates.partials._header')

    @include('admin.templates.partials._sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  @include('admin.templates.partials._footer')

  @include('admin.templates.partials._control-sidebar')
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('admin.templates.partials._scripts')
</body>
</html>

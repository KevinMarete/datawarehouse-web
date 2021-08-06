<!DOCTYPE html>
<html lang="en">

<head>
  @include('template.styles')
</head>

<body class="animsition">
  <div class="page-wrapper bg-white">

    @include('template.header')

    <!-- PAGE CONTENT-->
    {!!$content_view!!}

    @include('template.footer')

  </div>

  @include('template.scripts')

</body>

</html>
<!-- end document-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="copyright" content="MACode ID, https://macodeid.com/">
    <title>One Health - Medical Center HTML5 Template</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/owl-carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}">
        <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
  </head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>


 @include('layouts.partial.header')


 @include('layouts.partial.ourhealth')




 @include('layouts.partial.ourdoctors')


 

 @include('layouts.partial.latestnews')



 @include('layouts.partial.appointment')


 @include('layouts.partial.banner')


 
 @include('layouts.partial.footer')






<script src="{{ asset('frontend/assets/js/jquery-3.5.1.min.js') }}"></script>

<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('frontend/assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('frontend/assets/vendor/wow/wow.min.js') }}"></script>

<script src="{{ asset('frontend/assets/js/theme.js') }}"></script>
  <script src="{{ asset('js/iziToast.js') }}"></script>
    @include('vendor.lara-izitoast.toast')
  
</body>
</html>
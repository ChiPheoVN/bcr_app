<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin</title>
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('') }}assets/css/style-starter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" />
  @yield('head')
  <link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">
</head>

<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
  <section>
    @include('sidebar')    
    @include('header')
    <div class="main-content">
      <div class="container-fluid content-top-gap">
        @yield('main_content')
      </div>
    </div>
    <!-- main content end-->
  </section>
  <!-- move top -->
  <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
    <span class="fa fa-angle-up"></span>
  </button>
  <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
      } else {
        document.getElementById("movetop").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- /move top -->

  <script src="{{ asset('') }}assets/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('') }}assets/js/jquery-1.10.2.min.js"></script>

  <!-- chart js -->
  <script src="{{ asset('') }}assets/js/Chart.min.js"></script>
  <script src="{{ asset('') }}assets/js/utils.js"></script>
  <!-- //chart js -->

  <!-- Different scripts of charts.  Ex.Barchart, Linechart -->
  <script src="{{ asset('') }}assets/js/bar.js"></script>
  <script src="{{ asset('') }}assets/js/linechart.js"></script>
  <!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


  <script src="{{ asset('') }}assets/js/jquery.nicescroll.js"></script>
  <script src="{{ asset('') }}assets/js/scripts.js"></script>

  <!-- close script -->
  <script>
    var closebtns = document.getElementsByClassName("close-grid");
    var i;

    for (i = 0; i < closebtns.length; i++) {
      closebtns[i].addEventListener("click", function () {
        this.parentElement.style.display = 'none';
      });
    }
  </script>
  <!-- //close script -->

  <!-- disable body scroll when navbar is in active -->
  <script>
    $(function () {
      $('.sidebar-menu-collapsed').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- disable body scroll when navbar is in active -->

  <!-- loading-gif Js -->
  <script src="{{ asset('') }}assets/js/modernizr.js"></script>
  <script>
    $(window).load(function () {
      // Animate loader off screen
      $(".se-pre-con").fadeOut("slow");;
    });
  </script>
  <!--// loading-gif Js -->

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>

  @yield('script')

  <script src="{{ asset('') }}assets/js/script.js"></script>
</body>

</html>
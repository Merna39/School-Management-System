<?php include('header.php') ?>

<!-- Main navigation -->
<header>






  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <strong>SMS</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div class="view " style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/89.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-indigo-strong d-flex justify-content-center align-items-center">
      <!-- Content -->
      <div class="container ">
        <!--Grid row-->
        <div class="row pt-lg-5 mt-lg-5  ">
          <!--Grid column-->
          <div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left wow fadeInLeft" data-wow-delay="0.3s">
            <h1 class="display-4 font-weight-bold">School Management System</h1>
            <hr class="hr-light">
            <h3 class="mb-3">See why over 1,500 schools worldwide trust our system to support the future of education.</h3>
            <a class="btn btn-outline-white btn-rounded">Learn more</a>
          </div>
          <!--Grid column-->
          <div class="col-10 col-sm-7 col-lg-5 mb-4 ml-4">
            <!--Form-->
            <img src="./images/logo2.png" class=" d-block mx-lg-auto img-fluid z-depth-2" alt="logo2.png" width="400" height="200">
          </div>
        </div>
      </div>
    </div>
    <!--/.Form-->
  </div>
  <!--Grid column-->

</header>
<!-- Main navigation -->
<script>
  const navEl = document.querySelector('.navbar');
  window.addEventListener('scroll', () => {
    if (window.scrollY >= 100) {
      navEl.classList.add('scrolling-navbar');
    } else if (window.scrollY < 100) {
      navEl.classList.remove('scrolling-navbar');
    }
  });
</script>

<!-- About Us-->
<div class="container px-4 py-5" id="featured-3">
  <h2 class="pb-3 border-bottom font-weight-bold">About Us</h2>
  <div class="row g-4 py-5 row-cols-2 row-cols-lg-3">
    <div class="feature col">
      <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
        <i class="fas fa-3x fa-cloud indigo-text "></i>
      </div>
      <h4 class="fs-2 text-body-emphasis font-weight-bolder ">A central system to run your whole school</h4>
    </div>
    <div class="feature col">
      <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
        <i class="fas fa-3x fa-user-graduate indigo-text"></i>
      </div>
      <h4 class="fs-2 text-body-emphasis font-weight-bolder">Supports multi-curriculum for 3-18 yearrs</h4>

    </div>
    <div class="feature col">
      <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
        <i class="fas fa-3x fa-hand-holding-usd indigo-text"></i>
      </div>
      <h4 class="fs-2 text-body-emphasis font-weight-bolder ">Integrated finance solution for budgeting, fee billing, invoicing & purchase orders</h4>

    </div>
    <div class="feature col">
      <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
        <i class="fas fa-3x fa-check-circle indigo-text"></i>
      </div>
      <h4 class="fs-2 text-body-emphasis font-weight-bolder ">Fully managed service with technical and reporting support</h4>
    </div>
    <div class="feature col">
      <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
        <i class="fas fa-3x fa-chart-bar indigo-text"></i>
      </div>
      <h4 class="fs-2  text-body-emphasis font-weight-bolder">Microsoft Power BI and API technology to transform your MIS data into dashboards</h4>

    </div>
  </div>
</div>



<div style="height:400px; background: linear-gradient(-45deg ,#7986cb ,transparent 70%);">
  <div class=" px-5 py-5 my-5 text-center ">
    <h1 class="display-5 fw-bold text-body-emphasis mt-3">What Makes <blaind class="font-weight-bolder" style="color : #283593">SMS</blaind> So Good...</h1>
    <div class="col-lg-6 col-sm-8 mx-auto">
    <h4 class=" mt-2">SMS Helps Administration, Students, Teachers & Parents Connect
        to Relevant Information on Education in one search.</h4>

      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      
      </div>
    </div>
  </div>
</div>

<!-- Administration -->
<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="./images/admin.png" class="d-block mx-lg-auto img-fluid" alt="admin.png" width="350" height="200">
      <!-- <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy"> -->
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 font-weight-bolder" style="color :#303f9f">Administration</h1>
      <ul class="lead">
        <li>Increase In Student Enrollment Ratio</li>
        <li>Better Fees And Payments Management</li>
        <li>Improves Student-Teacher-Parents Collaboration</li>
        <li>Increases Productivity</li>
        <li>Complete Automation</li>
      </ul>
      <div class="align-items-center media">
        <h2 class="mb-0 px-3" style="border-right: 1px solid #d0d0d0">
          45%
          <i class="fas fa-arrow-up fa-1x indigo-text"></i>
        </h2>

        <div class="media-body px-3">
          <h6 class="mb-0">Reduction in Administrative Workload</h6>
        </div>
      </div>
      <!-- <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> -->
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">

      </div>
    </div>
  </div>
</div>



<!-- Students -->
<div class="container col-xxl-8 px-4 py-5">
  <h2 class="pb-3 border-bottom font-weight-bold"></h2>
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="./images/student.png" class="d-block mx-lg-auto img-fluid" alt="admin.png" width="300" height="100">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 font-weight-bolder" style="color :#303f9f"> Students</h1>
      <ul class="lead">
        <li>Reduced Workload</li>
        <li>Transparent Communication</li>
        <li>Access From Anywhere</li>
        <li>Easy Access To Lecture Plans And Materials</li>
        <li>Quick And Easy Assignment Management</li>
      </ul>
      <div class="align-items-center media">
        <h2 class="mb-0 px-3" style="border-right: 1px solid #d0d0d0">
          85%
          <i class="fas fa-arrow-up fa-1x indigo-text"></i>
        </h2>

        <div class="media-body px-3">
          <h6 class="mb-0">Improvement in Student Performance</h6>
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">

      </div>
    </div>
  </div>
</div>



<!-- Teachers -->
<div class="container col-xxl-8 px-4 py-5">
  <h2 class="pb-3 border-bottom font-weight-bold"></h2>
  <div class="row flex-lg-row align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="./images/teacher.png" class="d-block mx-lg-auto img-fluid" alt="admin.png" width="300" height="100">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 font-weight-bolder" style="color :#303f9f"> Teachers</h1>
      <ul class="lead">
        <li>Easy E-learning</li>
        <li>Access To Lecture Planning</li>
        <li>Access To Learning Material And Assignments</li>
        <li>Online Assessment Results And Progress</li>
        <li>Digital Library For Continuous Learning</li>
      </ul>
      <div class="align-items-center media">
        <h2 class="mb-0 px-3" style="border-right: 1px solid #d0d0d0">
          80%
          <i class="fas fa-arrow-up fa-1x indigo-text"></i>
        </h2>

        <div class="media-body px-3">
          <h6 class="mb-0">Increase in Faculty Satisfaction</h6>
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">

      </div>
    </div>
  </div>
</div>


<!-- parents -->
<div class="container col-xxl-8 px-4 py-5">
  <h2 class="pb-3 border-bottom font-weight-bold"></h2>
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="./images/parent.png" class="d-block mx-lg-auto img-fluid" alt="admin.png" width="300" height="200">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 font-weight-bolder" style="color :#303f9f"> Parents</h1>
      <ul class="lead">
        <li>Access To Child's Academic Progress And Attendance Data</li>
        <li>Get Fee Records And Reminders</li>
        <li>Active Participation In School Activities</li>
        <li>Interactive Parent-Teacher Discussions</li>
        <li>Updates On School Events, Holidays, And Processes</li>
      </ul>
      <div class="align-items-center media">
        <h2 class="mb-0 px-3" style="border-right: 1px solid #d0d0d0">
          78%
          <i class="fas fa-arrow-up fa-1x indigo-text"></i>
        </h2>

        <div class="media-body px-3">
          <h6 class="mb-0">Increase in Parent Satisfaction</h6>
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">

      </div>
    </div>
  </div>
</div>


<!-- Footer -->
<footer class="page-footer font-small indigo">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->

        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">About Us</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">About Us</a>
          </li>
          <li>
            <a href="#!">What We Do</a>
          </li>
          <li>
            <a href="#!">In The News</a>
          </li>
          <li>
            <a href="#!">Career</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->

        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Services</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Implementation</a>
          </li>
          <li>
            <a href="#!">Consulting</a>
          </li>
          <li>
            <a href="#!">Training</a>
          </li>
          <li>
            <a href="#!">Support</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Contact us</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Twitter</a>
          </li>
          <li>
            <a href="#!"> Facebook</a>
          </li>
          <li>
            <a href="#!"> Linkedin</a>
          </li>
          <li>
            <a href="#!"> YouTube</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4"> Corporate</h5>
        <ul class="list-unstyled">

          <li>
            <a href="#!">Privacy Policy</a>
          </li>
          <li>
            <a href="#!">Return & Refund</a>
          </li>
          <li>
            <a href="#!">Disclaimer</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2024 Copyright:
    <a href="/"> SMS.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<?php include('footer.php') ?>
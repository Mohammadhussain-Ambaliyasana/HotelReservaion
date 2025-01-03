<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title']; ?> - About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <style>
      .box{
        border-top-color: var(--teal) !important;
      }
    </style>
</head>
<body class="bg-light">
    
<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
  <h2 class="fn-bold h-font text-center">ABOUT US</h2>
  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">
    Elegance Unveiled: Our Hotel Story
  </p>
</div>

<div class="container">
  <div class="row justify-content-between algin-items-center">
    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
      <h3 class="mb-3">Welcome!</h3>
      <p>
        Welcome to our sanctuary of hospitality, where each guest is embraced
        with warmth and elegance. With a rich legacy of exceptional service,
        we blend modern comforts seamlessly with timeless charm. Your journey 
        with us promises a tapestry of memorable moments and unparalleled experiences.
      </p>
      <p>
      Experience opulent accommodations, impeccable service, and modern amenities 
      at our centrally located hotel. Indulge in luxurious comfort, exquisite 
      dining, and a tranquil ambiance. Your perfect getaway awaits.
      </p>
    </div>
    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
      <img src="images/about/about.jpg" class="w-100">
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/hotel.svg" width="70px">
        <h4 class="mt-3">100+ ROOMS</h4>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/customers.svg" width="40px">
        <h4 class="mt-3">200+ CUSTOMERS</h4>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/rating.svg" width="70px">
        <h4 class="mt-3">100+ REVIEWS</h4>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/staff.svg" width="70px">
        <h4 class="mt-3">100+ STAFFS</h4>
      </div>
    </div>
  </div>
</div>

<h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

<div class="container px-4">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper nb-5">
      <?php
        $about_r = selectAll('team_details');
        $path = ABOUT_IMG_PATH;

        while($row = mysqli_fetch_assoc($about_r)){
          echo<<<data
          <div class="swiper-slide bg-white text-center overflow-hidden rounded">
            <img src="$path$row[picture]" class="w-100">
            <h5 class="mt-2">$row[name]</h5>
          </div>
          data;
        }
      ?>
      

      
    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>

<?php require('inc/footer.php'); ?>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 40,
    pagination: {
      el: ".swiper-pagination",
    },
    breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      }
  });
</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>Meet Our Team</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link href="css/swiper.min.css" rel="stylesheet">
  <link href="css/about.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
</head>
<body>

  <span><p>Meet Our Developers</p></span>
  <!-- Swiper -->

<div class="swiper-container">
    <div class="swiper-wrapper">
    <div class="swiper-slide">
      <div class = "imgBx">
        <img src = "img/team/David.jpg">
      </div>
      <div class = "details">
        <h3>Daivd Chau<br><span>Team Leader</span></h3>
      </div>
    </div>
    <div class="swiper-slide">
      <div class = "imgBx">
        <img src = "img/team/Vechecka.jpg">
      </div>
      <div class = "details">
        <h3>Vechecka Chhroun<br><span>Developer</span></h3>
      </div>
    </div>
    <div class="swiper-slide">
      <div class = "imgBx">
        <img src = "img/team/Lucas.jpg">
      </div>
      <div class = "details">
        <h3>Lucas Gillmore<br><span>Developer</span></h3>
      </div>
    </div>
    <div class="swiper-slide">
      <div class = "imgBx">
        <img src = "img/team/Huy.jpg">
      </div>
      <div class = "details">
        <h3>Huy Tran<br><span>Developer</span></h3>
      </div>
    </div>

  </div>
  <h2> Follow InstaJob At</h2>
  <br><br><br><br>
  <ul>
    <li>
      <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    </li>
    <li>
      <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
    </li>
    <li>
      <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </li>
    <li>
      <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </li>
    <li>
      <a href="#"><i class="fa fa-github" aria-hidden="true"></i></a>
    </li>
    <li>
      <a href="index.html"><i class="fa fa-home" aria-hidden="true"></i></a>
    </li>
  </ul>
  <br>

  <div class = "sidebar-contact">
    <div class="toggle"></div>
    <h2>Contact Us</h2>
    <form>
      <input type = "text" placeholder="" name ="" value ="Name">
      <input type = "email" placeholder="" name ="" value ="Email">
      <input type = "rel" placeholder= "" name ="" value ="Phone Number">
      <textarea placeholder="message"></textarea>
      <input type ="submit" name="submit" value ="Send">
    </form>
  </div>
</div>

<script
 src="https://code.jquery.com/jquery-3.3.1.js"
 integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
 crossorigin="anonymous"></script>
 <script type="text/javascript">
   $(document).ready(function(){
     $('.toggle').click(function(){
       $('.sidebar-contact').toggleClass('active')
       $('.toggle').toggleClass('active')
     })
   })
 </script>

  <script type="text/javascript" src="swiper.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
</body>
</html>

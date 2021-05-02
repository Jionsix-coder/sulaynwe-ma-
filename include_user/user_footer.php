<div class="footer">
  <div class="container">
    <br><br>

    <div class="collab">
      <div class="row">
        <div class="col-lg-12">
          <p class="wow fadeInUp">Love u so much Ma Andrea.</p>
        </div>
      </div>
    </div>

    <br>

    <div class="hr">
      <div class="row"></div>
    </div>

    <br><br>

    <div class="info">
      <div class="row">

        <div class="col-lg-4" id="personal">
          <p class="wow fadeInUp">Memory Date</p>
          <h4 class="wow fadeInUp" data-wow-delay="0.2s">23.4.2021</h4><br>
        </div>

        <div class="col-lg-4" id="media">
          <p class="wow fadeInUp" data-wow-delay="0">Can u love me</p>

          <ul>
            <li class="wow fadeInUp" data-wow-delay="0.4s">Forever?</li>
          </ul>

          <br><br>
        </div>

        <div class="col-lg-4" id="address">
          <p class="wow fadeInUp" data-wow-delay="0">Please Get In Touch</p>
          <h4 class="wow fadeInUp" data-wow-delay="0.2s">With My Heart ❤️❤️❤️</h4>
          <br><br>
        </div>

      </div>
   </div>
  </div>
</div>


<!-- footer section ends here -->

<br><br><br><br>

</div>

<!-- fontawesone kit code -->
<script src="https://kit.fontawesome.com/270fe78054.js" crossorigin="anonymous"></script>
<!-- bootstrap cdn -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- greensock cdn -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
// navigation starts here
$("#toggle").click(function() {
$(this).toggleClass('on');
$("#resize").toggleClass("active");
});

$("#resize ul li a").click(function() {
$(this).toggleClass('on');
$("#resize").toggleClass("active");
});

$(".close-btn").click(function() {
$(this).toggleClass('on');
$("#resize").toggleClass("active");
});
// navigation ends here

//nav animation

TweenMax.from("#brand",1,{
delay:0.4,
y:10,
opacity:0,
ease:Expo.easeInOut
})

TweenMax.staggerFrom("#menu li a",1,{
delay:0.4,
opacity:0,
ease:Expo.easeInOut
},0.1);
// wow animation
        new WOW().init();
// wow end animation
</script>
</body>
</html>

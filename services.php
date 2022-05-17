<style>
  .hide{
    display: none;
  }
</style>

<!-- ======= Services Section ======= -->
<div id="services" class="services-area area-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="section-headline services-head text-center">
          <h2>Our Services</h2>
        </div>
      </div>
    </div>
    <div class="row text-center">
      <!-- Start Left services -->
      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="about-move">
          <div class="services-details">
            <div class="single-services">
              <a class="services-icon" href="#">
                <i class="icon"><img src="assets/img/services/icon-cctv.png" width="100px" height="100px" /></i>
              </a>
              <h4>CCTV</h4>
              <p class="content">
                Intranusa menjual CCTV berbagai merk dengan harga murah dan terbaik. Seperti CCTV Hikvision, CCTV Dahua, CCTV SPC,CCTV Samsung dan juga IP CAM. juga menciptakan berbagai Paket CCTV terbaik agar dapat memberikan harga yang tetap terjangkau dan mendapatkan kualitas yang terbaik. Jika Anda membutuhkan CCTV dengan pemasangan profesional dan harga yang terjangkau, silahkan menghubungi kami dan konsultasikan kebutuhan Anda secara gratis di Intranusa.id Tim kami akan melakukan survey ke lokasi pemasangan dan memberikan penawaran yang terbaik untuk Anda!</p>
              <button class="btn" onclick="readMore(this)" >Read more</button>
              <a class="btn" href="services-cctv.php">Order Now</a>
            </div>
          </div>
          <!-- end about-details -->
        </div>
      </div>
      <!-- End Left services -->
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- end col-md-4 -->
        <div class="about-move">
          <div class="services-details">
            <div class="single-services">
              <a class="services-icon" href="#">
                <i><img src="assets/img/services/panel-icon.png" width="100px" height="100px" /></i>
              </a>
              <h4>Solar Home System</h4>
              <p class="content">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore, animi accusantium veritatis provident excepturi quiareiciendis ipsum nemo nulla, omnis cum ullam, accusamus obcaecati? Iure veniam voluptas sequi tempore ullam expedita quod ipsam. Voluptas, ratione odio laboriosam eaque obcaecati, id iusto fugiat sed soluta ad accusamus. Vero voluptatum asperiores quos nisi aut maxime, libero alias, deserunt ex molestiae incidunt, reiciendis consequuntur. Vero quod eaque id doloremque dolorum nulla aliquam porro?
              </p>
              <button class="btn" onclick="readMore(this)" >Read more</button>
              <a class="btn" href="services-panel.php">Order Now</a>
            </div>
          </div>
          <!-- end about-details -->
        </div>
      </div>
      <!-- End Left services -->
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- end col-md-4 -->
        <div class="about-move">
          <div class="services-details">
            <div class="single-services">
              <a class="services-icon" href="#">
                <i><img src="assets/img/services/icon-it.png" width="100px" height="100px" /></i>
              </a>
              <h4>IT Support</h4>
              <p class="content">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore, animi accusantium veritatis provident excepturi quiareiciendis ipsum nemo nulla, omnis cum ullam, accusamus obcaecati? Iure veniam voluptas sequi tempore ullam expedita quod ipsam. Voluptas, ratione odio laboriosam eaque obcaecati, id iusto fugiat sed soluta ad accusamus. Vero voluptatum asperiores quos nisi aut maxime, libero alias, deserunt ex molestiae incidunt, reiciendis consequuntur. Vero quod eaque id doloremque dolorum nulla aliquam porro?
              </p>
              <button class="btn" onclick="readMore(this)">Read more</button>
              <a class="btn" href="services-it.php">Order Now</a>
            </div>
          </div>
          <!-- end about-details -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Services Section -->
<script>
  let noOfcharac = 150;
  let contents = document.querySelectorAll(".content");
  contents.forEach(content => {
    if(content.textContent.length < noOfcharac){
      content.nextElementSibling.style.display = "none"
    } else{
      let displayText = content.textContent.slice(0,noOfcharac);
      let moreText = content.textContent.slice(noOfcharac);
      content.innerHTML = `${displayText}<span class="dots">...</span><span class="hide more">${moreText}</span>`
    }
  });

  function readMore(btn){
    let services = btn.parentElement;
    services.querySelector(".dots").classList.toggle("hide");
    services.querySelector(".more").classList.toggle("hide");
    btn.textContent == "Read More" ? btn.textContent = "Read Less" : btn.textContent = "Read More";
  }
</script>
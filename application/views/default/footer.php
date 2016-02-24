<hr>
<div class="container">
<div class="row">
<footer class="wow bounceInUp footer-top" data-wow-duration="2s">
  <div class="container">
    <div class="col-md-9 col-sm-6 footer-item">
      <?php
        $this->load->model("Mplace");
        $data=$this->Mplace->ListAllPlace();
        echo $data[0]['name'].'<br>';
        echo $data[0]['adress'].'<br>';
      ?>
    </div>

    <div class="col-md-3 col-sm-6 footer-item">
      <p class="font-15 font-bold text-uppercase">Nhận thông tin qua email</p>
      <ul class="list-unstyled footer-links">
        <li> <a href="#">Sign up  with your email to get updates!</a> </li>
      </ul>
      <br>
      <div class="input-group search">
        <input type="text" placeholder="Type your email" class="form-control">
        <span class="input-group-btn">
        <button type="button" class="btn btn-default">Go</button>
        </span> </div>
      <!-- /input-group --> 
      
    </div>
  </div>
</footer>
</div>
</div>
<style> 
 
    .carousel-caption {
      background-image: url("<?php echo base_url() ?>assets/default/images/bg_sidebar.png");
      color: #070707;
      font-size: 15px;
    }
    .carousel-inner>.item>img, .carousel-inner>.item>a>img{
      height:400px;
      width:100%;
    }
 
</style>
<div class="container">
  <div class="row">
    <div data-example-id="simple-carousel" class="below-headeer hidden-xs">
      <div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
       <?php
        $this->load->model("Mslider");
        $slider=$this->Mslider->listAllSlider();
        $i = 0;
        $viewslides = '';
        $Indicators = '';
        while ($i < count($slider)) {
          $image = $slider[$i]['image'];
          $keyword = $slider[$i]['keyword'];
          $info = $slider[$i]['info'];
          if ($i == 0) {
            $Indicators .='<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
            $viewslides .= '<div class="item active">
                          <img src="'.base_url().'uploads/images/'.$image.'" alt="'.$keyword.'" class="img-responsive hidden-lg"/>
                          <img src="'.base_url().'uploads/images/'.$image.'" alt="'.$keyword.'" class="img-responsive visible-lg"/>
                          <div class="carousel-caption">
                            <h3>'.$keyword.'</h3>
                            <p>'.$info.'.</p>
                          </div>
                        </div>';
          }else{
            $Indicators .='<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
            $viewslides .= '<div class="item">
                          <img src="'.base_url().'uploads/images/'.$image.'" alt="'.$keyword.'" class="img-responsive hidden-lg"/>
                          <img src="'.base_url().'uploads/images/'.$image.'" alt="'.$keyword.'" class="img-responsive visible-lg"/>
                          <div class="carousel-caption">
                            <h3>'.$keyword.'</h3>
                            <p>'.$info.'.</p>
                          </div>
                        </div>';
          }
          $i++;
        }
        ?>
        <ol class="carousel-indicators">
          <?php echo $Indicators; ?>
        </ol>
        <div role="listbox" class="carousel-inner">
          <?php echo $viewslides; ?>
        </div>

      </div>
    </div>
  </div>
</div>
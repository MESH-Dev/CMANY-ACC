<?php
  $slides = get_field('carousel');
?>
  <!--WRAPPER-->
  <div id="wrapper">

      <!--CAROUSEL-->
      <div id="carousel">

        <!--SLIDE-->
<?php foreach($slides as $row){ ?>
          <div class="slide">
            <a<?php if($row['video_selector'] == true){echo 'class="lightbox"';} ?> href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
            <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" height="<?php //echo $row['image']['height'] ?>" width="<?php //echo $row['image']['width'] ?>" />
            </a>
            <div class="desc">
              <h2><?php echo $row['title']; ?></h2>
              <p>
  <?php echo $row['content'];
                if($row['video_selector'] == true){ ?>
	                <a class='more lightbox' href="<?php echo $row['link_override']; ?>"> Watch Now ></a>
				<?php }else{ ?>
                	<a class='more' href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More <span aria-hidden="true">></span> <span class="sr-only">About <?php echo $row['title']; ?></span></a>
  <?php } ?>
              </p>
            </div>
          </div>
<?php } ?>

      <!--END CAROUSEL-->
      </div>

      <!--CAROUSEL NAV-->
      <div class="container caroufredsel-controls">
        <!-- <a href="#" id="prev" aria-label="Show previous slide"> --><!-- <span class="sr-only">Show previous slide</span> --><!-- </a> -->
        <!-- <a href="#" id="next" aria-label="Show next slide"> --><!-- <span class="sr-only">Show next slide</span> --><!-- </a> -->

        

        <a href="#" id="prevbut" aria-label="Show previous slide"><span class="sr-only">Show Previous slide.</span></a>
        <a href="#" id="nextbut" aria-label="Show next slide"><span class="sr-only">Show Next slide.</span></a>
      </div>
  <!--END WRAPPER-->
  </div>
  <div class="container caroufredsel-controls">
    <a href="#" id="prevbut" aria-label="Show previous slide"><span class="sr-only">Show Previous slide.</span></a>
        <a href="#" id="nextbut" aria-label="Show next slide"><span class="sr-only">Show Next slide.</span></a>
    <div id="pager"></div>
  </div>
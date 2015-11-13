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
            <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" />
            </a>
            <div class="desc">
              <h2><?php echo $row['title']; ?></h2>
              <p>
           <?php echo $row['content']; ?>
                <a class='more' href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>"> Read More ></a>
              </p>
            </div>  
          </div>
   <?php } ?>
        
      <!--END CAROUSEL-->
      </div>
      
      <!--CAROUSEL NAV-->
      <a href="#" id="prev" title="Show previous"> </a>
      <a href="#" id="next" title="Show next"> </a>
      
      <div id="pager"></div>

      <a href="#" id="prevbut" title="Show previous"> </a>
      <a href="#" id="nextbut" title="Show next"> </a>
      
  <!--END WRAPPER-->
  </div>
<?php
$col1 = get_field('col1');
$col2 = get_field('col2');
$col3 = get_field('col3');
$col3_blog = get_field('col3_blog');
$col4 = get_field('col4');
$col4_advisory = get_field('col4_advisory');
$col4_donate = get_field('col4_donate');

?>
<!--Q1-->
<div class="quarter first">
<?php foreach($col1 as $row){ ?>
<a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
  <div class="block-home">
    
<?php if($row['image'] != ""){ ?>
    <!--  -->
      <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" />
   <!--  </a> -->
<?php } ?>
		<h2 class="<?php echo $row['color']; ?>"><!--<a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">--><?php echo $row['title']; ?><!--</a>--></h2>
    <p><?php echo $row['content']; ?></p>
    <p class="more" aria-hidden="true" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></p>
  </div>
</a>
<?php } ?>
</div>


<!--Q2-->
<div class="quarter">

<!--CALENDAR-->
<div class="block-home">
  <h2 class="">Featured Workshops</h2>
<?php get_template_part( 'blocks/blocks/home', 'newercalendar' ); ?>
</div>

<?php foreach($col2 as $row){ ?>
<a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
  <div class="block-home">
<?php if($row['image'] != ""){ ?>
    <!-- <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>"> -->
      <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" />
    <!-- </a> -->
<?php } ?>
		<h2 class="<?php echo $row['color']; ?>"><!-- <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">--><?php echo $row['title']; ?><!--</a> --></h2>
    <p><?php echo $row['content']; ?></p>
    <p class="more" aria-hidden="true" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></p>
  </div>
</a>
<?php } ?>
</div>

<!--Q3-->
<div class="quarter three">

<?php foreach($col3_blog as $row){ ?>
<a href="<?php if($row['link'] !== ""){ echo $row['link']; } else { echo "http://blog.cmany.org";}?>">
    <div class="block-home blog">
        <img alt="Visit the CMANY Blog" src="<?php bloginfo( 'template_url' )?>/images/blog_home.gif" />
      <!-- </a> -->
<?php if($row['image'] != ""){ ?>
        <!-- <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>"> -->
          <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" />
        <!-- </a> -->
<?php } ?>

      <p><?php echo $row['content']; ?></p>
     <p class="more" aria-hidden="true" href="<?php if($row['link'] !== ""){ echo $row['link']; } else { echo "http://blog.cmany.org";}?>">Read More ></p>
  </div>
<?php } ?>

<?php //column three non-blog?>
<?php foreach($col3 as $row){ ?>
    <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
      <div class="block-home non-blog">
        <?php if($row['image'] != ""){ ?>
          <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" />
      <!-- </a> -->
<?php } ?>
      <h2 class="<?php echo $row['color']; ?>"><!--<a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">--><?php echo $row['title']; ?><!--</a>--></h2>
      <p><?php echo $row['content']; ?></p>
      <p class="more" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></p>
    </div>
  </a>
<?php } ?>
</div> <!-- End Q3 -->

<!--Q4-->
<div class="quarter last">



<?php foreach($col4_advisory as $row){ ?>
        <div class="block-home">
<?php if($row['image'] != ""){ ?>
          <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
            <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" />
          </a>
<?php } ?>
          <h2 style="color: #ff4600;"> Special Advisory!</h2>
          <img src="<?php bloginfo( 'template_url' )?>/images/specialadvisory_icon.png" id="adv" />
          <p style="margin-top:-40px; color: #ff4600;"><?php echo $row['content']; ?></p>

<?php if(($row['link_override'] == "") && ($row['link'] == "")) { }
          else{?>
          <p class="more" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></p>
<?php } ?>
        </div>
<?php } ?>

<?php foreach($col4_donate as $row){ ?>
<a href="https://app.etapestry.com/hosted/ChildrensMuseumoftheArts/Donation.html">

        <div class="block-home donate">
<?php if($row['image'] != ""){ ?>
            
            <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" />
          <!-- </a> -->
<?php } ?>
           <div class="donate">
           <h2 style="color: #fff; ">
            <!-- <a href="https://app.etapestry.com/hosted/ChildrensMuseumoftheArts/Donation.html"> -->
              Donate Today
            <!-- </a> -->
          </h2>
        
<?php echo $row['content']; ?>
         </div>


        </div>
        </a>
<?php } ?>

<?php //col4 start ?>
<?php foreach($col4 as $row){ ?>
<a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
        <div class="block-home">
<?php if($row['image'] != ""){ ?>
          
            <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" />
          <!-- </a> -->
<?php } ?>
          <h2 class="<?php echo $row['color']; ?>">
            <!--<a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">-->
              <?php echo $row['title']; ?>
              <!--</a>-->
          </h2>
          <p><?php echo $row['content']; ?></p>
          <p class="more" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></p>
        </div>
      </a>
<?php } ?>
</div>


<style>
h2.grey {color: #373737; background: none;}
h2.orange {color: #FF4600;}
h2.blue {color: #00BAC6;}
h2.purple {color: #C93893;}

h2:hover{text-decoration: none;}
</style>

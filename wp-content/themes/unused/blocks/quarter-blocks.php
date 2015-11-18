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
  <div class="block-home">
<?php if($row['image'] != ""){ ?>
    <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
      <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" />
    </a>
<?php } ?>
		<h2 class="<?php echo $row['color']; ?>"><a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>"><?php echo $row['title']; ?></a></h2>
    <p><?php echo $row['content']; ?></p>
    <a class="more" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></a>
  </div>
<?php } ?>
</div>

 
<!--Q2-->
<div class="quarter">

<!--CALENDAR-->
<div class="block-home">
  <h2 class="blue">Featured Workshops</h2>
<?php get_template_part('blocks/newcalendar'); ?>
</div>

<?php foreach($col2 as $row){ ?>
  <div class="block-home">
<?php if($row['image'] != ""){ ?>
    <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
      <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" />
    </a>
<?php } ?>
		<h2 class="<?php echo $row['color']; ?>"><a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>"><?php echo $row['title']; ?></a></h2>
    <p><?php echo $row['content']; ?></p>
    <a class="more" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></a>
  </div>
<?php } ?>
</div>

<!--Q3-->
<div class="quarter">

<?php foreach($col3_blog as $row){ ?>
    <div class="block-home">
      <a href="<?php if($row['link'] !== ""){ echo $row['link']; } else { echo "http://blog.cmany.org";}?>">
      <img src="<?php bloginfo( 'template_url' )?>/images/blog_home.gif" />
      </a>
      <p><?php echo $row['content']; ?></p>
      <a class="more" href="<?php if($row['link'] !== ""){ echo $row['link']; } else { echo "http://blog.cmany.org";}?>">Read More ></a>
  </div>
<?php } ?>

<?php foreach($col3 as $row){ ?>
    <div class="block-home">
 <?php if($row['image'] != ""){ ?>
      <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" />
      </a>
 <?php } ?>
      <h2 class="<?php echo $row['color']; ?>"><a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>"><?php echo $row['title']; ?></a></h2>
      <p><?php echo $row['content']; ?></p>
      <a class="more" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></a>
    </div>
<?php } ?>
</div>

<!--Q4-->
<div class="quarter last">

    

 <?php foreach($col4_advisory as $row){ ?>
        <div class="block-home">
     <?php if($row['image'] != ""){ ?>
          <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" />
          </a>
     <?php } ?>
          <h2 style="color: #ff4600;"> Special Advisory!</h2>
          <img src="<?php bloginfo( 'template_url' )?>/images/specialadvisory_icon.png" id="adv" />
          <p style="margin-top:-40px; color: #ff4600;"><?php echo $row['content']; ?></p>
          
     <?php if(($row['link_override'] == "") && ($row['link'] == "")) { }
          else{?>
          <a class="more" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></a>
     <?php } ?>
        </div>
 <?php } ?>

 <?php foreach($col4_donate as $row){ ?>
        <div class="block-home">
      <?php if($row['image'] != ""){ ?>
            <a href="<?php echo $row['link']; ?>">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" />
          </a>
      <?php } ?>
           <div class="donate">
           <h2 style="color: #fff; "> 
            <a href="https://app.etapestry.com/hosted/ChildrensMuseumoftheArts/Donation.html">
              Donate Today
            </a>
          </h2>
      <?php echo $row['content']; ?>
         </div>  
           
        
        </div>
 <?php } ?> 
 <?php foreach($col4 as $row){ ?>
        <div class="block-home">
     <?php if($row['image'] != ""){ ?>
          <a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" />
          </a>
     <?php } ?>
          <h2 class="<?php echo $row['color']; ?>"><a href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>"><?php echo $row['title']; ?></a></h2>
          <p><?php echo $row['content']; ?></p>
          <a class="more" href="<?php if($row['link_override'] !== ""){ echo $row['link_override']; } else { echo $row['link'];}?>">Read More ></a>
        </div>
 <?php } ?>
</div> 


<style>
h2.grey a{color: #373737; background: none;}
h2.orange a{color: #FF4600;}
h2.blue a{color: #00BAC6;}
h2.purple a{color: #C93893;}

h2 a:hover{text-decoration: none;}
</style>

<?php
	//SET AGE FILTER
    if(isset($_GET['age_filter'])){
      $age_filter = (string)$_GET['age_filter'];
    } else {
      $age_filter = ''; 
    }
    //SET LOC FILTER
    if(isset($_GET['loc_filter'])){
      $loc_filter = (string)$_GET['loc_filter'];
    } else {
      $loc_filter = ''; 
    }
    //SET CAT FILTER
    if(isset($_GET['cat_filter'])){
      $cat_filter = (string)$_GET['cat_filter'];
    } else {
      $cat_filter = ''; 
    }
    
    //POSTS
  	$posts = get_posts(array(
	  'numberposts' => -1,
	  'post_type' 	=> 'artcolonyclasses',
	  'age'			=> $age_filter,
	  'location'	=> $loc_filter,
	  'category_name'	=> $cat_filter
	));


  	//VARS
  	$current_week = "";
  	$current_year = "";
    $current_day = "";
  	$weekrement = "";
		$days = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
 		$br = "<br />";

 
  //QUERY
  $url_query = $_SERVER['QUERY_STRING'];
  


  //TIME
  $now_week = date('W');
  $now_month = date('M');
  $nnow_month = date('n');
  $now_day = date('j');
  $now_year = date('Y');

	$render_year = $now_year;
  


  //QUERY-----------------------------------------
  if($url_query != ''){
 
 	//SET CURRENT YEAR
  	if(isset($_GET['cur_year'])){
  		//echo 'next year yo';
  		$current_year = $_GET['cur_year']; 
  	} else {
  		$current_year = $now_year;
  	}

 	//SET CURRENT WEEK
  	if(isset($_GET['cur_week'])){
  		//echo 'next week yo';
  		$current_week = stripslashes($_GET['cur_week']);
  	} else {
  	 	$current_week = stripslashes($now_week);
  	}

  	//SET CURRENT MONTH
  	if(isset($_GET['cur_month'])){
  		$current_month = $_GET['cur_month'];
  	} else {
  		$current_month = $now_month;
  	}

  	//SET CURRENT DAY
  	if(isset($_GET['today'])){
      $current_day = $_GET['today'];
    } else {
      $current_day = $now_day; 
    }
    
    

/*
echo $current_week + 1;
  	$cur_next = $current_week + 1;
  	  	$cur_prev = $current_week - 1;

  	$weekrement_next = "$cur_next week";
    $weekrement_prev = "$cur_prev week";

    */
 
 	//IF NEXT//////////////////////////////
    if($_GET['week'] == 'next'){

      $int_next = abs($now_week - $current_week -1);
      $int_prev = abs($now_week - $current_week+1);	

      //CURRENT > NOW
      if($current_week > $now_week){

		$weekrement_next = "$int_next week";
      	$weekrement_prev = "$int_prev week";
      
      //CURRENT < NOW
      }else if($current_week < $now_week){
  		$weekrement_next = "-$int_next week";
      	$weekrement_prev = "-$int_prev week";
      
      //CURRENT == NOW
      } else {
		$weekrement_next = "1 week";
    	$weekrement_prev = "-1 week";
      }

    //ELSE PREV//////////////////////////
    } else {
    
      $int_next = abs($now_week - $current_week-1);
      $int_prev = abs($now_week - $current_week+1);	

      //CURRENT > NOW
      if($current_week > $now_week){

		$weekrement_next = "$int_next week";
      	$weekrement_prev = "$int_prev week";
      
      //CURRENT < NOW
      }else if($current_week < $now_week){
  		$weekrement_next = "-$int_next week";
      	$weekrement_prev = "-$int_prev week";
      
      //CURRENT == NOW
      }else {
      	$weekrement_next = "1 week";
   		$weekrement_prev = "-1 week"; 
      }
    
    //END IF NEXT//////////////////////////
    }

  //NO QUERY----------------------------------
  } else {
    $current_week = $now_week;
    $current_year = $now_year;
 	  $weekrement_next = "1 week";
    $weekrement_prev = "-1 week";

  //END QUERY----------------------------------
  }
  




  
  //SETUP NEXT/PREV WEEK
   $next_week = date('W',strtotime("+".$weekrement_next));
   $last_week = date('W',strtotime("+".$weekrement_prev));



   //Next-Prev days
   $testM = $_GET['cur_month'];
   $testY = $_GET['cur_year'];
   $testD = $_GET['today'];
   $dayCheck = strtotime("$testY/$testM/$testD");
   $nextDay = strtotime('+1 day', $dayCheck);
   $prevDay = strtotime('-1 day', $dayCheck);
   //Vars for frontend
   $nextDayY = date('Y', $nextDay);
   $nextDayM = date('n', $nextDay);
   $nextDayD = date('j', $nextDay);
   $prevDayY = date('Y', $prevDay);
   $prevDayM = date('n', $prevDay);
   $prevDayD = date('j', $prevDay);



//SETUP LAST WEEK OF YEAR
if($current_week == 52 /*|| $current_year > $now_year*/ ){

	//echo "52nd week of the year";
	
	$int_yr = abs($now_year - $current_year-1);
	$last_yr = $current_year;
	$new_yr = date('Y',strtotime("+".$int_yr." year"));


	//SETUP RENDER YEAR
	if($current_year == $now_year){
		$render_year = $now_year;
	} else {
		$render_year = $current_year;
	}

//SETUP FIRST WEEK OF YEAR
}else if($current_week == 01 /*|| $current_year < $now_year*/) {

	$int_yr = abs($now_year - $current_year);
	//echo "$br $int_yr $br";
	$new_yr = date('Y',strtotime("+".$int_yr." year"));
	$last_yr = $new_yr - 1;
	$render_year = $new_yr;

//JUST REGULAR
} else {
	//echo "$br just the reg $br";
	$new_yr = $current_year;
	$last_yr = $current_year;
	//$current_week = $now_week;
	$render_year = $current_year;
}



//53 WEEK EXCEPTIONS*******************************
if($current_week == 52 && $current_year == 2015){
	//echo "2015 exception";
   	$next_week = 53;
   	$last_week = 51;
   	$render_year = 2015;
   	$new_yr = 2015;
}

if($current_week == 53){
	$next_week = "01";
	$last_week = 52;
	$new_yr = 2016;
}

if($current_week == '01' && $current_year == 2016){
	//echo "2016 exception";
	$last_week = 53;
}

 
    $this_month_header = date('F',strtotime("$current_year/$current_month/$current_day"));
    $this_day_header = date('jS',strtotime("$current_year/$current_month/$current_day"));
    $this_dayname  = date('l',strtotime("$current_year/$current_month/$current_day"));

  
 
  //FUNCTION ITERATE AND CHECK DAYS////////////////////////////////////////////////
  function checkDay($f,$wkd){

      if(is_array($f['day'])){
        foreach($f['day'] as $w){
          if($wkd == $w){
             echo "4";
            renderEvent($f['start'],$f['end']); 
          } 
        }

      } 
    }     
  //END FUNC  
 


  //FUNCTION RENDER EVENT///////////////////////////////////////////////////////////////
  function renderEvent($start, $end, $weekday){ ?>

    <div class="event_box">
      <h2>
        <a href="<?php echo get_permalink($post->ID); ?>">
     <?php echo get_the_title($post->ID); ?>
        </a>
      </h2>   
      <div class="event_location">
   <?php
            $locations = get_the_terms($post->ID, 'location' );
            $separator = ', ';
            $output = '';

            if($locations){
              foreach($locations as $location) {
                $output .= $location->name . $separator;
              }
              echo trim($output, $separator);
              echo ", ";
            }
        ?>
   <?php
            $classlocations = get_the_terms($post->ID, 'classlocation' );
            $separator = ', ';
            $output = '';

            if($classlocations){
              foreach($classlocations as $location) {
                $output .= $location->name . $separator;
              }
              echo trim($output, $separator);
              echo ", ";
            }
        ?>
      </div>
       <div class="event_cats">
   <?php
            $categories = get_the_category();
            $separator = ', ';
            $output = '';

            if($categories){
              foreach($categories as $category) {
                $output .= $category->cat_name . $separator;
              }
              echo trim($output, $separator);
              echo ", ";
            }
        ?>
      </div>
      

      <div class="event_ages">
   <?php
            $ages = get_the_terms($post->ID, 'age' );
            $separator = ', ';
            $output = '';

            if($ages){
              foreach($ages as $age) {
                $output .= $age->name . $separator;
              }
              echo trim($output, $separator);
              echo ", ";
            }
        ?>
   <?php
            $classages = get_the_terms($post->ID, 'classage' );
            $separator = ', ';
            $output = '';

            if($classages){
              foreach($classages as $age) {
                $output .= $age->name . $separator;
              }
              echo trim($output, $separator);
              echo ", ";
            }
        ?>
   <?php
            $seasons = get_the_terms($post->ID, 'classseason' );
            $separator = ', ';
            $output = '';

            if($seasons){
              foreach($seasons as $season) {
                $output .= $season->name . $separator;
              }
              echo trim($output, $separator);
            }
        ?>
      </div> 

      <div class="event_time">
   <?php if($weekday != ''){
	      		echo $weekday;
	      	}else{
		      	echo "$start - $end";
	      	}
      	?>
      </div>

 <?php $fields = get_fields($post->ID); 
          if($fields['featured'] == "Yes") { ?>
      <div class="event_featured_icon">
        
            <img src="<?php bloginfo( 'template_url' ); ?>/images/event-featured.png" >
        
      </div>
 <?php } ?>

 <?php $thumbn = get_the_post_thumbnail($post->ID, 'event-thumb'); ?>
 <?php if ($thumbn != '') {?>
      <div class="event_thumbnail">
    <?php echo $thumbn; ?>
      </div>

 <?php } ?>


      <div class="event_content">
   <?php //echo get_post_field('post_content', $post->ID);?>
   <?php  echo get_excerpt_by_id($post->ID); ?>
        <a class="event_more" href="<?php echo get_permalink($post->ID); ?>">
           READ MORE &rsaquo;&rsaquo;
        </a>
      </div>
  
     

      

    </div> 

<?php
  //END FUNC
  } 

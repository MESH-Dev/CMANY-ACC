<?php
    
    //POSTS
    $posts = get_posts(array(
    'numberposts' => -1,
    'post_type'   => 'events',
    'category' => '-130'
  ));


    //VARS
    $current_week = date('W');
    $current_year = date('Y'); 
    $current_day = date('j');
    $current_month = date('M'); 
    $weekrement = "";
    $days = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $br = "<br />";

    $this_month_header = date('F',strtotime("$current_year/$current_month/$current_day"));
    $this_day_header = date('jS',strtotime("$current_year/$current_month/$current_day"));
    $this_dayname  = date('l',strtotime("$current_year/$current_month/$current_day"));
     $this_dayname = date('l');
 
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

    <div class="home_event_box">
      <h3>
        <a href="<?php echo get_permalink($post->ID); ?>">
<?php echo get_the_title($post->ID); ?>
        </a>
      </h3>   

      <!--
      <div class="event_location">
<?php
            $locations = get_the_terms($post->ID, 'location' );
            $separator = ',';
            $output = '';

            if($locations){
              foreach($locations as $location) {
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
            $separator = ',';
            $output = '';

            if($categories){
              foreach($categories as $category) {
                $output .= $category->cat_name . $separator;
              }
              echo ", ";
              echo trim($output, $separator);
              
            }
        ?>
      </div>
      

      <div class="event_ages">
<?php
            $ages = get_the_terms($post->ID, 'age' );
            $separator = ',';
            $output = '';

            if($ages){
              foreach($ages as $age) {
                $output .= $age->name . $separator;
              }
              echo ", ";
              echo trim($output, $separator);
            }
        ?>
      </div> 
    -->

      <div class="event_time" style="margin-bottom:0px; ">
<?php if($weekday != ''){
            echo $weekday;
          }else{
            echo "$start - $end";
          }
        ?>
      </div>
 


      <div class="home_event_content" style="width: 190px;">
<?php //echo get_post_field('post_content', $post->ID);?>
        <p><?php  echo get_excerpt_by_id($post->ID); ?></p>
        <a class="event_more" href="<?php echo get_permalink($post->ID); ?>">
           READ MORE &rsaquo;&rsaquo;
        </a>
      </div>
  
     

      

    </div> 

<?php
  //END FUNC
  } 
 
 

$displayCounter = 0;
foreach($posts as $post){


  
    //Get Date Fields
    $fields = get_fields($post->ID);
    $spec_date = $fields['specific_date']; 
    $hide = $fields['hide_events']; 
    $hide_dates = $fields['hide_dates']; 
    $end_date = $fields['end_date'];
    $this_date = date('Ymd');
    $sundayTime = $fields['sunnday_times'];
    $mondayTime = $fields['monday_times'];
    $tuesdayTime = $fields['tuesday_times'];
    $wednesdayTime = $fields['wednesday_times'];
    $thursdayTime = $fields['thursday_times'];
    $fridayTime = $fields['friday_times'];
    $saturdayTime = $fields['saturday_times'];
    
    //Pull out Hide dates, test against current date, set skip to true
    $overrideClose = get_field('closed_dates', 9281);
    $overrideArray = array();
    
    
    //Check if event date is being hidden
    $newhide_dates = $fields['hidden_dates'];
    if($newhide_dates){
      $hideDateArr = array();
    foreach($newhide_dates as $date){
      $arrdate = $date['hide_date'];
      array_push($hideDateArr, $arrdate);
    }
    $skip = false;
    if (in_array($this_date, $hideDateArr)) {
        $skip = true;
        break;
    }
    }
  
  //Check if Hide in Listing exists
    $hideListing = $fields['hide_event'];
    if($hideListing){
      $skip = false;
      if ($hideListing == 'yes') {
        $skip = true;
        break;
    }
    }
  
  //Check if Calendar Option override exists
  $overrideTest = $this_date;
  foreach($overrideClose as $a){
    array_push($overrideArray, $a['date']);
  }
  foreach($overrideArray as $a){
    if($a == $overrideTest)
      {
        $skip = true;
        if($skipit == false){
          echo "CMA is closed today";
        }
        $skipit = true;
        break;
      }
  }

    
    if($d == 'Sunday' && $sundayTime){
      $timereplace = $sundayTime;
    } elseif($d == 'Monday' && $mondayTime){
      $timereplace = $mondayTime;
    } elseif($d == 'Tuesday' && $tuesdayTime){
      $timereplace = $tuesdayTime;
    } elseif($d == 'Wednesday' && $wednesdayTime){
      $timereplace = $wednesdayTime;
    } elseif($d == 'Thursday' && $thursdayTime){
      $timereplace = $thursdayTime;
    } elseif($d == 'Friday' && $fridayTime){
      $timereplace = $fridayTime;
    } elseif($d == 'Saturday' && $saturdayTime){
      $timereplace = $saturdayTime;
    } else{
      $timereplace = '';
    }
    
    


    //CHECK IF END DATE IS PASSED OR IF HIDE IS CHECKE - IF SO DONT DISPALY ANYTHING
    if(($spec_date > $this_date)||($end_date < $this_date)||($hide=="yes")||($skip)){continue;}

    
    //SHOW EVENT ON SPECIFIC DATE IF NOT RECURRING
    if($fields['specific_date'] != "" && $fields['day'] == "") { 
      if($spec_date == $this_date){
        $displayCounter ++;
        renderEvent($fields['start'],$fields['end'],''); 
      } 
    //END IF
    }  
    

    //CHECK IF RECURRING AND SET APPROPRIATE START / END DATES
    if($fields['day'] != ""){ 
        
      foreach($fields['day'] as $theDay){
          if($theDay == $this_dayname ){ 
              $displayCounter ++; 
             renderEvent($fields['start'],$fields['end'],'');  
          }  //END IF
        
      }  //END FOREACHDAY
    }  //END IF
    
  }  //END FOREACH POST
if($displayCounter == 0){
	echo '<p>No events today</p>';
  }  


  ?>

<?php

//IF VIEW == WEEK ////////////////////////////////////////////////////////////////////////////////////////////////
if($_GET['view'] == 'week' || $_GET['view'] == ""){?>
<div class="filterhead">
		<?php
			//SET AGE FILTER
		    if(isset($_GET['age_filter'])){
		      $term = get_term_by('slug', $_GET['age_filter'],'age');
		      echo '<h2>Filter by: "'.$term->name.'"</h2>';
		    }
		    //SET LOC FILTER
		    if(isset($_GET['loc_filter'])){
		      $term = get_term_by('slug', $_GET['loc_filter'],'location');
		      echo '<h2>Filter by: "'.$term->name.'"</h2>';
		    }
		    //SET CAT FILTER
		    if(isset($_GET['cat_filter'])){
			  $term = get_term_by('slug', $_GET['cat_filter'],'category');
		      echo '<h2>Filter by: "'.$term->name.'"</h2>';
		    }
		?>
	</div>
 <div class="block cal_listing_title">
          <h3>Week of<?php echo date('F jS', strtotime($render_year."W".$current_week."0")) ;  ?></h3>
</div>


<div id="event_list_week">

<?php foreach($days as $n=>$d){ ?>

  <!--START DAY-->
  <div class="day">

    <div class="day_left">
      <h2><?php echo $d; ?><br><?php echo date('M', strtotime($render_year."W".$current_week.$n))."$br"; ?><?php echo date('d', strtotime($render_year."W".$current_week.$n))."$br"; ?> </h2>
    </div>

    <div class="day_right">
	<?php
	//FOREACH POST///////////////////////////////////////////////////////////////
	$displayCounter = 0;
	foreach($posts as $post){

    //Get Date Fields
    $fields = get_fields($post->ID);
    //print_r($fields);
    $hide = $fields['hide_events'];
    $hide_dates = $fields['hide_dates'];
    $spec_date = $fields['specific_date'];
    $end_date = $fields['end_date'];
    $this_date = date('Ymd',strtotime($render_year."W".$current_week.$n));
    $sundayTime = $fields['sunnday_times'];
    $mondayTime = $fields['monday_times'];
    $tuesdayTime = $fields['tuesday_times'];
    $wednesdayTime = $fields['wednesday_times'];
    $thursdayTime = $fields['thursday_times'];
    $fridayTime = $fields['friday_times'];
    $saturdayTime = $fields['saturday_times'];

    //Pull out Hide dates into array, loop test against current date, set skip to true
    $overrideClose = get_field('closed_dates', 9281);
    $overrideArray = array();


    //Check if event date is being hidden and being shown either
    $newhide_dates = $fields['hidden_dates'];
    $newshow_dates = $fields['show_dates'];
    if($newshow_dates){
    	$showDateArr = array();
		foreach($newshow_dates as $date){
			$arrdate = $date['show_date'];
			array_push($showDateArr, $arrdate);
		}
	}
    if($newhide_dates){
    	$hideDateArr = array();
		foreach($newhide_dates as $date){
			$arrdate = $date['hide_date'];
			array_push($hideDateArr, $arrdate);

		}$skip = false;
		if (in_array($this_date, $hideDateArr) && !in_array($this_date, $showDateArr)) {
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



	$overrideTest = date('Ymd', strtotime($render_year."W".$current_week.$n));

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


    //Check if event has specific times for the day


    echo $fields['tuesday_times'];

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
  			renderEvent($fields['start'],$fields['end'],$timereplace);
      }
  	//END IF
  	}

    //CHECK IF RECURRING AND SET APPROPRIATE START / END DATES
  	if($fields['day'] != ""){

      foreach($fields['day'] as $theDay){

          if($theDay == $d ){
          	 $displayCounter ++;
  		  	 renderEvent($fields['start'],$fields['end'],$timereplace);
          //END IF
          }
        //END FOREACHDAY
      }
    }  //END FOREACH POST
}
?>
    </div> <!--END Day Right-->

  </div><!--END DAY-->
<?php } ?>


 </div>
<!-- END CALENDAR LIST-->

<?php
//END VIEW == WEEK
} ?>

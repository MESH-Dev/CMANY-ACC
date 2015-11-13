<?php 
//IF VIEW == DAY///////////
if($_GET['view'] == 'day'){?>

 <div class="block cal_listing_title">
          <h3><?php echo "$this_dayname, $this_month_header $this_day_header, $current_year"; ?></h3>
</div>

<div id="event_list_day">

<?php
$displayCounter = 0;
foreach($posts as $post){

    //Get Date Fields
    $fields = get_fields($post->ID);
    $spec_date = $fields['specific_date'];
    $hide = $fields['hide_events'];
    $hide_dates = $fields['hide_dates'];
    $end_date = $fields['end_date'];
    $this_date = date('Ymd',strtotime("$current_year/$current_month/$current_day"));
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
} ?>

</div>
<?php
//END IF VIEW == DAY
} ?>

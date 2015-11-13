 <?

//VARS
$date = date('Y-m-d');
//echo $date;
//$date = "2013-05-29";
//$today =  $date." 12:00:00";
$events = array();


//QUERY POSTMETA
//$rows = $wpdb->get_results( "SELECT * FROM prac49ma3_postmeta WHERE meta_value = '$today'");

//SELECT * FROM prac49ma3_postmeta WHERE meta_value LIKE '%2013-05-27%' GROUP BY post_id
//$rows = $wpdb->get_results( "SELECT * FROM prac49ma3_postmeta WHERE meta_value LIKE '%$date%' GROUP BY post_id");

////SELECT * FROM prac49ma3_postmeta WHERE meta_key ='_EventStartDate' AND meta_value LIKE '%2013-05-28%' 
$rows = $wpdb->get_results( "SELECT * FROM prac49ma3_postmeta WHERE meta_key = '_EventStartDate' AND meta_value LIKE '%$date%'");


//IF DAY IS EMPTY
if((count($rows) == 0)/*&&($date != "2013-05-27")*/){
/*
  //GET TOMORROWS DATE
  $date_tmrw = date('Y-m-d',strtotime(date("Y-m-d", strtotime($date)) . " +1 day"));
  $tomorrow =  $date_tmrw." 12:00:00";

  //QUERY POSTMETA AGAIN
  $rows = $wpdb->get_results( "SELECT * FROM prac49ma3_postmeta WHERE meta_value = '$tomorrow'");
*/
echo "Children's Museum the of Arts is closed today.";
return;
}




//DEBUG
//echo "<pre>";
//print_r($rows);
//echo "</pre>";


//CREATE POSTMETA INFO
for($i=0; $i < count($rows); $i++){

	//VARS	
	$_id = $rows[$i]->post_id;
	$_start = $rows[$i]->meta_value;
	$_featured = get_field('event_featured', $_id);

	
	//PUSH INFO 
	array_push($events,array(
		'id'=>$_id,
		'start'=>$_start,
		'title'=>'',
		'excerpt'=>'',
		'link'=>'',
		'featured'=>$_featured
		)
	);
}

//ADD POST INFO
for($i=0; $i < count($events); $i++){

	//QUERY POSTS	
	$id = $events[$i]['id'];
	$single = $wpdb->get_results( "SELECT * FROM prac49ma3_posts WHERE ID = '$id'");

	//VARS
	$_title = $single[0]->post_title;
	$_excerpt = $single[0]->post_excerpt;
	$_link = $single[0]->post_name;

	//PUSH
	$events[$i]['title']= $_title;
	$events[$i]['excerpt'] = $_excerpt;
	$events[$i]['link'] = "/event/".$_link."/".$date;
	//echo $events[$i]['featured'] . " -- ";

}


//DEBUG
//echo "<pre>";
//print_r($events);
//echo "</pre>";

/*
function checkFeatured($item){
	
	echo "<pre>";
	print_r($item);
	echo "</pre>";

	foreach($item as $k=>$v){
		echo $item['title'];
	}

	
}*/
//VARS
$found = array();
$unfeat = array();

	//DELETE UNFEATURED EVENTS
	foreach($events as $k=>$v){
		$num = array_search('Yes',$v);

		if($num == '' || $num == null || $num == 'No'){
			array_push($unfeat,$k);
		} else {
			array_push($found, $k);
		}
		//if(!$num){

	
	}

//DEBUG
//print_r($found);
//print_r($unfeat);

//DELETE EVENTS IF ONE IS FEATURED
		if(count($found)>0){
			foreach($unfeat as $v){
				unset($events[$v]);
			}
		}

//array_filter($events,"checkFeatured");
//$key = array_search('Yes',$events);
//echo $key;
?>


<div id="calendar_today">

<?php /*$datecheck = date('Y-m-d'); 
   if($datecheck == "2013-05-27")
  	 {?>
  	 <div class="calendar_event">
		 		<div class="calendar_title"><a href="http://www.cmany.org/event/faioopeningweekend-2/">Opening Weekend: Free Art Island Outpost</a></div>
		 		<div class="calendar_date">May 29th, 2013</div>
		 		<div class="calendar_excerpt">Kick off the public access season on Governors Island with CMA! We'll be making art in the great outdoors from 11-3PM</div>
  	 </div>

  	<?php
  	}
  	 else
  	 	{*/
    foreach($events as $key=>$value){ ?>
  	<?php 
  		
  		$postID = $events[$key]['id'];
		  $title = $events[$key]['title'];
		  $dater = date('F   jS, Y',strtotime($events[$key]['start']));
		  $excerpt = $events[$key]['excerpt'];
		  $link = $events[$key]['link'];
		  //$featured = the_field('event_featured', $postID);
  	 ?>
  	  

  	 <div class="calendar_event">	
		 		<div class="calendar_title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></div>
		 		<div class="calendar_date"><?php echo $dater; ?></div>
		 		<div class="calendar_excerpt"><?php echo $excerpt; ?></div>
  	 </div>

  	  <br />

  	<?php } ?>

  	

<?php// } ?>
</div>

<?php
/**
* This file outputs the actual days of the month in the TEC calendar view
*
* You can customize this view by putting a replacement file of the same name (table.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

$tribe_ecp = TribeEvents::instance();

// in an events cat
if ( is_tax( $tribe_ecp->get_event_taxonomy() ) ) {
	$cat = get_term_by( 'slug', get_query_var('term'), $tribe_ecp->get_event_taxonomy() );
	$eventCat = (int) $cat->term_id;
	$eventPosts = tribe_get_events( array( 'eventCat' => $eventCat, 'time_order' => 'ASC', 'eventDisplay'=>'month' ) );
} // not in a cat
else {
	$eventPosts = tribe_get_events(array( 'eventDisplay'=>'month' ));
}


$daysInMonth = isset($date) ? date("t", $date) : date("t");
$startOfWeek = get_option( 'start_of_week', 0 );
list( $year, $month ) = split( '-', $tribe_ecp->date );
$date = mktime(12, 0, 0, $month, 1, $year); // 1st day of month as unix stamp
$rawOffset = date("w", $date) - $startOfWeek;
$offset = ( $rawOffset < 0 ) ? $rawOffset + 7 : $rawOffset; // month begins on day x
$rows = 1;

$monthView = tribe_sort_by_month( $eventPosts, $tribe_ecp->date );

?>
<table class="tribe-events-calendar" id="big">
	<thead>
			<tr>
				<?php
				for( $n = $startOfWeek; $n < count($tribe_ecp->daysOfWeek) + $startOfWeek; $n++ ) {
					$dayOfWeek = ( $n >= 7 ) ? $n - 7 : $n;
					
					echo '<th id="tribe-events-' . strtolower($tribe_ecp->daysOfWeek[$dayOfWeek]) . '" abbr="' . $tribe_ecp->daysOfWeek[$dayOfWeek] . '"><span>' . $tribe_ecp->daysOfWeekShort[$dayOfWeek] . '</span></th>';
				}
				?>
			</tr>
	</thead>

	<tbody>
		<tr>
		<?php
			// skip last month
			for( $i = 1; $i <= $offset; $i++ ){ 
				echo "<td class='tribe-events-othermonth'></td>";
			}
			// output this month
			for( $day = 1; $day <= date("t", intval($date)); $day++ ) {
			    if( ($day + $offset - 1) % 7 == 0 && $day != 1) {
			        echo "</tr>\n\t<tr>";
			        $rows++;
			    }
			
				// Var'ng up days, months and years
				$current_day = date_i18n( 'd' );
				$current_month = date_i18n( 'm' );
				$current_year = date_i18n( 'Y' );
                $date = "$year-$month-$day";
				$datecheck = "$month-$day-$year";
				
				if ( $current_month == $month && $current_year == $year) {
					// Past, Present, Future class
					if ($current_day == $day ) {
						$ppf = ' tribe-events-present';
					} elseif ($current_day > $day) {
						$ppf = ' tribe-events-past';
					} elseif ($current_day < $day) {
						$ppf = ' tribe-events-future';
					}
				} elseif ( $current_month > $month && $current_year == $year || $current_year > $year ) {
					$ppf = ' tribe-events-past';
				} elseif ( $current_month < $month && $current_year == $year || $current_year < $year ) {
					$ppf = ' tribe-events-future';
				} else { $ppf = false; }
				
				//******************************************************************************************************************************
				$dater = "$year/$month/$day";
				$theday = date('l', strtotime($dater)); // = GETS DAY OF THE WEEK ("Monday, Tuesday, etc)
				
				//LIST CLOSED HOLIDAYS HERE
				 
				 $holiday_str = stripslashes(tribe_get_option('theHolidays'));
				 $holiday_str = trim($holiday_str);
				 $holidays = explode(",", $holiday_str);
				 
				 
				 
			     echo "<td class='tribe-events-thismonth" . $ppf . "'>".  display_day_title( $day, $monthView, $date ) . "\n";
					
					if($theday == 'Tuesday') //CLOSED ON TUESDAYS
					{
						if(
						   ($datecheck =='10-23-2012')||
						   ($datecheck =='09-18-2012')||
						   ($datecheck =='02-19-2013')||
						   ($datecheck =='03-26-2013')||
						   ($datecheck =='04-2-2013')||
						   ($datecheck =='03-19-2013')||
						   ($datecheck =='07-2-2013')||
						   ($datecheck =='07-9-2013')||
						   ($datecheck =='07-16-2013')||
						   ($datecheck =='07-23-2013')||
						   ($datecheck =='07-30-2013')||
						   ($datecheck =='08-6-2013')||
						   ($datecheck =='08-13-2013')||
						   ($datecheck =='08-20-2013')||
						    ($datecheck =='08-27-2013')
							
							)  //OVERRIDE CLOSED TUESDAY
						{
							echo display_day( $day, $monthView, $date );	
						}
						else{	echo '<div style="padding: 4px 0px 0px 15px; font-size:11px; color:#000" >CLOSED </div>'; }
						
					}
					else
					{	$holi = 0;
						for($z = 0; $z< count($holidays); $z++)  //CHECK IF DATE IS A HOLDIDAY AND DISPLAY CLOSED
						{
							if($datecheck == $holidays[$z])  
							{
								echo '<div style="padding: 4px 0px 0px 15px; font-size:11px; color:#000" >CLOSED </div>';
								$holi = 1; break;
							}
								
						}
						if($holi ==0) //DISPLAY EVENTS IF NOT TUESDAY OR HOLIDAY
						{
							
								echo display_day( $day, $monthView );	
						}
						
					}
				echo "</td>";
			}
				//****************************************************************************************************************************
			
			// skip next month
			while( ($day + $offset) <= $rows * 7)
			{
			    echo "<td class='tribe-events-othermonth'></td>";
			    $day++;
			}
		?>
		</tr>
	</tbody>
</table>
<?php

function display_day_title( $day, $monthView, $date ) {
	if (($date == '2012-11-31')||($date == '2012-09-31')||($date == '2013-04-31')||($date == '2013-06-31')||($date == '2012-02-31')||($date == '2012-02-30')||($date == '2013-02-29') )
	{
		return '';
	}
	else
	{
		$return = "<div class='daynum tribe-events-event' id='daynum_$day'>";
		
	   $querycatslug=get_query_var('tribe_events_cat'); // used to check if calendar is on category page
	   
	   //if( function_exists('tribe_get_linked_day') && empty($querycatslug)) {
	   
	   //   $return .= tribe_get_linked_day($date, $day); // premium
	   //} else {
		  $return .= '<span class="daynumspan">'.$day.'</span>';
	  // }
		$return .= "<div id='tooltip_day_$day' class='tribe-events-tooltip' style='display:none;'>";
		for( $i = 0; $i < count( $monthView[$day] ); $i++ ) {
			
			$post = $monthView[$day][$i];
			setup_postdata( $post );
			$return .= '<h5 class="tribe-events-event-title">' . get_the_title() . '</h5>';
		}
		$return .= '<span class="tribe-events-arrow"></span>';
		$return .= '</div>';
	
		$return .= "</div>";
		
		
		return $return;
	}
}

function display_day( $day, $monthView, $date  ) {
	global $post;
	$output = '';
	$posts_per_page = get_option( 'posts_per_page' );
	for ( $i = 0; $i < count( $monthView[$day] ); $i++ ) {
		
		if (($date == '2012-10-23')&&($i==0)){continue;}
		
		$post = $monthView[$day][$i];
		setup_postdata( $post );
		$eventId	= $post->ID.'-'.$day;
		$start		= tribe_get_start_date( $post->ID );
		$end		= tribe_get_end_date( $post->ID );
		$cost		= tribe_get_cost( $post->ID );
		$address	= tribe_get_address( $post->ID );
		$city		= tribe_get_city( $post->ID );
		$state		= tribe_get_state( $post->ID );
		$province	= tribe_get_province( $post->ID );
		$country	= tribe_get_country( $post->ID );
		//$cmaVenue   = tribe_get_venue( $post->ID ); 
		$terms = get_the_terms( $post->ID, 'event_location' ); // get an array of all the terms as objects.

		
		if(!empty($terms)) {

				$terms_slugs = array();
				
				foreach( $terms as $term ) {
				
				if ($term->parent==0) 
				
					{ 
				  		$terms_slugs[] = $term->slug; // if term has no parent echo the slug

				 	} 
					else { 
						$array = get_term_by('id', $term->parent, 'event_location', 'terms_slugs');
				  } 
				  
				}
				
		} else { $terms_slugs= ""; } 


		$cats = get_the_terms( $post->ID, 'tribe_events_cat' );
		$skip = 0;
		if(!empty($cats)) {

				$cats_slugs = array();

				foreach( $cats as $cat ) {
				
				if ($cat->parent==0) 
				
					{ 
				  		$cats_slugs[] = $cat->slug; // if term has no parent echo the slug
				  		if($cat->slug == 'exhibits'){$skip = 1;};

				 	} 
					 
				}
				
		} else { $cats_slugs= ""; }
		if ($skip==1){continue;}

	
		?>
		<div id='event_<?php echo $eventId; ?>' class="<?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?> tribe-events-event tribe-events-real-event<?php if ($terms) { echo $terms_slugs[0]; } ?>" >
			
            
<?php //
			//echo $i;
			 ?>
            	<a href="<?php tribe_event_link(); ?>"><?php the_title(); ?></a>
			<?php ?>
            <div id='tooltip_<?php echo $eventId; ?>' class="tribe-events-tooltip" style="display:none;">
				<h5 class="tribe-events-event-title"><?php the_title();?></h5>
				<div class="tribe-events-event-body">
					<div class="tribe-events-event-date">
						<?php if ( !empty( $start ) )	echo $start; ?>
						<?php if ( !empty( $end )  && $start !== $end ) {
							$start_as_ts = (int)strtotime( $start );
							$end_as_ts = (int)strtotime( $end );
							if ( date_i18n( 'Y-m-d', $start_as_ts ) == date_i18n( 'Y-m-d', $end_as_ts ) ) {
								$time_format = get_option( 'time_format', 'g:i a' );
								echo " - " . date_i18n( $time_format, $end_as_ts );
							} else {
								echo " – " . $end . '<br />';
							}
						} ?>
                        
                        
                        

					</div>
					<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { ?>
						<div class="tribe-events-event-thumb"><?php the_post_thumbnail( array(75,75));?></div>
					<?php } ?>
					<?php echo has_excerpt() ? TribeEvents::truncate($post->post_excerpt) : TribeEvents::truncate(get_the_content(), 30); ?>
					<span class="cmalocation"><?php if(get_the_terms( $post->ID, 'event_location' )) { print_taxonomy_ranks( get_the_terms( $post->ID, 'event_location' ) ); } //echo $location; ?></span>
				</div>
				<span class="tribe-events-arrow"></span>
			</div>
		</div>
		<?php
		if( $i < count( $monthView[$day] ) - 1 ) { 
			echo "<hr />";
		}
	}
}
?>

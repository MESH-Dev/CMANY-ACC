<?php

//echo "hello sidebar";

/***
http://davidwalsh.name/php-calendar
http://forums.devshed.com/php-development-5/month-from-week-number-35946.html
***/

//FUNCTION DRAW CALENDAR
function draw_calendar($month,$year,$month_name){

	/* draw table */

	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">'; //

	/* table headings */
	$headings = array(
		'<span aria-hidden="true">Su</span><span class="sr-only">Sunday</span>',
		'<span aria-hidden="true">Mo</span><span class="sr-only">Monday</span>',
		'<span aria-hidden="true">Tu</span><span class="sr-only">Tuesday</span>',
		'<span aria-hidden="true">We</span><span class="sr-only">Wednesday</span>',
		'<span aria-hidden="true">Th</span><span class="sr-only">Thursday</span>',
		'<span aria-hidden="true">Fr</span><span class="sr-only">Friday</span>',
		'<span aria-hidden="true">Sa</span><span class="sr-only">Saturday</span>');
	//$headings = array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa');
	$calendar.= '<tr class="calendar-row"><th scope="col" class="calendar-day-head">'.implode('</th><th scope="col" class="calendar-day-head">',$headings).'</th></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">';
			$calendar.="<a href='http://cmany-acc.bkfk-t5yk.accessdomain.com/events/?view=day&Smonth=$month&Syear=$year&Sday=$list_day'>";
			$calendar.= $list_day.$week;
			$calendar.= "</a>";
			$calendar.='</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			//$calendar.= str_repeat('<p></p>',2);

		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';

	/* all done, return result */
	return $calendar;

//END FUNCTION
}

/* sample usages */

//$month = date('F',strtotime($render_year." week ".$current_week." day ".$now_day));
$get_month = strtotime( "+$current_week week", mktime(0, 0, 0, 1, 1, (int)$render_year) );
$month = date( "F" );
$month_num = date( "n"  );
$render_year   = date('Y');
$current_year  = date('Y');

if(isset($_POST['reload'])){
	$getM = $_POST['curMonth'];
	$getY = $_POST['curYear'];
	$getTF = $_POST['tofrom'];
	$monthCheck = strtotime("$getY/$getM/01");
	if($getTF == 'next'){
		$timestamp = strtotime("+1 month",$monthCheck);
	}else{
		$timestamp = strtotime("-1 month",$monthCheck);
	}

	$render_year   = date('Y', $timestamp);
	$current_year  = date('Y');
	$month_num     = date('n', $timestamp);
	$current_month = date('n', $timestamp);
	$month 		   = date('F', $timestamp);
}

if(isset($_GET['Smonth'])){
	$month = $_GET['Smonth'];
	$month = date("F", mktime(0, 0, 0, $month, 10));
	$current_month = $_GET['Smonth'];
	$month_num = $_GET['Smonth'];
}
if(isset($_GET['Syear'])){
	$render_year = $_GET['Syear'];

	$current_year = $_GET['Syear'];
}

echo "<a data-tofrom='prev' class='calTrig' id='prevMonth'><span aria-hidden='true'>&#8672;</span> <span class='sr-only'>Previous Month<span></a><h2 data-month='".$month_num."' data-year='".$current_year."'><span class='sr-only'>Calendar for </span> $month $current_year</h2><a data-tofrom='next' class='calTrig' id='nextMonth'><span aria-hidden='true'>&#8674;</span> <span class='sr-only'>Next Month</span></a>";
echo draw_calendar($month_num,$current_year,$current_month);
//echo draw_calendar(8,2013);



?>

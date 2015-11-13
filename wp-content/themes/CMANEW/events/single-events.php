<?php 
  get_header();
  get_sidebar('mainnew'); 
  get_header('nav'); 
?>

<!--PAGE-NEW-->
<div id="page-new" >
  <!--PAGE-CONTAINER -->
  <div id="page-container" class="new_page">
<?php while ( have_posts() ) : the_post(); ?>
 

    <div class="block">
 
      <!-- MAIN CONTENT DIV-->
      <div id="left-content" class="mt-20">

      	<div id="event-content">
      		<div class="gutter">
      			<div id="calendarDL">
		    		<ul>
		    		<?php
		    			//Generate Google Calendar Link
		    			$todayDate		= date('F j, Y');
		    			$startTime 		= get_field('start');
		    			$endTime   		= get_field('end');
		    			$startDate 		= get_field('specific_date');
		    			$endDate   		= get_field('end_date');
		    			$eventTitle		= get_the_title();
		    			$eventLocation	= get_the_terms(get_the_ID(),'location');
		    			$eventDetails	= get_the_excerpt();
		    			
		    			$startTimeX = "$startTime $todayDate";
		    			$startTime = date('Gi', strtotime($startTimeX));
		    			$endTimeX = "$endTime $todayDate";
		    			$endTime = date('Gi', strtotime($endTimeX));
		    			
		    			$neweventTitle = str_replace(' ', '%20', $eventTitle);
		    			$neweventLocation = str_replace(' ', '%20', $eventLocation);
		    			$neweventDetails = str_replace(' ', '%20', $eventDetails);
		    		?>
		    			<li id="googleLink"><a href="http://www.google.com/calendar/event?action=TEMPLATE&dates=<?php echo $startDate; ?>T<?php echo $startTime; ?>00Z%2F<?php echo $endDate; ?>T<?php echo $endTime; ?>00Z&text=<?php echo $neweventTitle; ?>&location=&details=<?php echo $neweventDetails; ?>">&#43; Google Calendar</a></li>
		    			<li><a href="#">iCal Import</a></li>
		    		</ul>
	    		</div>
        	
        	<h2><img src="<?php bloginfo('template_directory'); ?>/images/eventTitleArrow.png" /><?php the_title(); ?></h2>

        	<div class="block">  
		<?php get_template_part('blocks/banner-script'); ?> 
		    </div>

			<?php 

			$layout = get_field('layout'); 
			echo $layout;
			if($layout == 'Two Column')	
			{
				$thumbnail = "single-event-small";
				?>

				<div class="<?php echo $thumbnail; ?>-thumb">
	        		<?php if ( has_post_thumbnail() ) { the_post_thumbnail($thumbnail);} ?>
	        	 </div>	

	        	<?php 

			}
			else{

			    if(get_field('slide-image')){    
	             get_template_part('blocks/slider');  
	          	} 
	        	else
	        	{
			 		$thumbnail = "single-event-large";?>
			 		<div class="<?php echo $thumbnail; ?>-thumb">
	        			<?php if ( has_post_thumbnail() ) { the_post_thumbnail($thumbnail);}  ?>
	        		 </div>	
		<?php
	            } 
	            ?>

				

	        	<?php 

			}	 
		 

	        
	        
	        ?>

	       
	        <!-- MAIN CONTENT -->
	        <div class="<?php echo $thumbnail; ?>-content"> 

	        	<div class="single-event-time">

			<?php 
			        echo $layout;
			        	date_default_timezone_set('UTC');
			        	$startdate = get_field('specific_date'); 
			        	$enddate = get_field('end_date'); 
			        	 

			        	$y = substr($startdate, 0, 4);
						$m = substr($startdate, 4, 2);
						$d = substr($startdate, 6, 2);
						$time = strtotime("{$d}-{$m}-{$y}");

						$ey = substr($enddate, 0, 4);
						$em = substr($enddate, 4, 2);
						$ed = substr($enddate, 6, 2);
						$etime = strtotime("$ed-$em-$ey");  
						 
						$edate = date('F jS', $etime); 
						$sdate = date('F jS', $time); 

						//echo date('l, F jS', $time);
						  
						   
			        	if ($enddate !='' && $sdate != $edate) {
			        		echo $sdate . " - " . $edate;
				 
			        	} 
			        	else
			        	{
			        		echo date('l, F jS', $time);
			        	}
			         
			        

			        ?> <br>
					
			<?php the_field('start'); ?> -<?php  the_field('end');?>
			    </div>

			      <div class="single-event-location">
			<?php
			            $locations = get_the_terms($post->ID, 'location' );
			            $separator = ',';
			            $output = '';

			            if($locations){
			              foreach($locations as $location) {
			                $output .= $location->name . $separator;
			              }
			              echo trim($output, $separator);
			            }
			        ?>
			    </div>

	        	<div class="single-event-cats">
			<?php
			            $categories = get_the_category();
			            $separator = ',';
			            $output = '';

			            if($categories){
			              foreach($categories as $category) {
			                $output .= $category->cat_name . $separator;
			              }
			              echo trim($output, $separator);
			            }
			        ?>
			    </div>
			  

			    <div class="single-event-ages">
			<?php
			            $ages = get_the_terms($post->ID, 'age' );
			            $separator = ', ';
			            $output = '';

			            if($ages){
			              foreach($ages as $age) {
			                $output .= $age->name . $separator;
			              }
			              echo "AGES " . trim($output, $separator);
			            }
			        ?>
			    </div> 

	        	<?php the_content(); ?> 

	        </div>

	<?php if(get_field('footer-text')): ?>  
	            <hr>
	            <div class="page-footer-text">
	<?php the_field('footer-text'); ?> 
	            </div>   
	<?php endif; ?>  

 		
      		</div>
      	</div>

      </div>
       
      <!-- Sidebar CONTENT --> 
      <sidebar id="cma-sidebar" class="mt-10">
<?php get_sidebar('default'); ?>
      </sidebar>
      
    </div>
<?php endwhile; ?>


    <div class="clear">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>

<?php get_footer(); ?>
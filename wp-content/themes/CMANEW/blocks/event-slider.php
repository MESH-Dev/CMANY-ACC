<?php

//JQUERY SLIDER for events

?>
 

<div id="newslider">
<?php
while(the_repeater_field('slide-image')): ?>    

<?php 
    $attachment_id = get_sub_field('the-image');
     
    $size = "event-slider";  
    $image =  wp_get_attachment_image( $attachment_id, $size );   

    echo wp_get_attachment_image( $attachment_id, $size );?>


    
    <!-- <span class="caption"><?php the_sub_field('the-caption'); ?></span>  -->
                                        
<?php endwhile; ?>
</div>

<div id="pager-slides"></div>
 
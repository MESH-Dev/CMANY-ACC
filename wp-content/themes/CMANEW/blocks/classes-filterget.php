  <form class="yoyo" method="GET" >
<h2>Filter By:</h2>
<div class="filterCont">
	<h4>Season</h4>
	<label for="season" class="sr-only">Filter by season</label>
	<select id="season" name="season">
		<option value=""></option>
		<?php $terms = get_terms('classseason');
		foreach($terms as $term){
			if(isset($_GET['season']) && $_GET['season'] == $term->slug){
				echo '<option value="'.$term->slug.'" selected="selected" >'.$term->name.'</option>';
			}else{
				echo '<option value="'.$term->slug.'" >'.$term->name.'</option>';
			}
		} ?>
	</select>
</div>

<div class="filterCont">
	<h4>Category</h4>
	<label for="category" class="sr-only">Filter by category</label>
	<select id="category" name="category">
		<option value=""></option>
		<?php $terms = get_terms('classdepartment');
		foreach($terms as $term){
			if(isset($_GET['category']) && $_GET['category'] == $term->slug){
				echo '<option value="'.$term->slug.'" selected="selected" >'.$term->name.'</option>';
			}else{
				echo '<option value="'.$term->slug.'" >'.$term->name.'</option>';
			}
		} ?>
	</select>
</div>

<div class="filterCont">
	<h4>Age</h4>
	<label for="age" class="sr-only">Filter by age</label>
	<select id="age" name="age">
	<option value=""></option>
	<?php $terms = get_terms('classages');
	foreach($terms as $term){
		if(isset($_GET['age']) && $_GET['age'] == $term->slug){
			echo '<option value="'.$term->slug.'" selected="selected" >'.$term->name.'</option>';
		}else{
			echo '<option value="'.$term->slug.'" >'.$term->name.'</option>';
		}
	} ?>
	</select>
</div>

<div class="filterCont">
	<h4>Location</h4>
	<label for="location" class="sr-only">Filter by location</label>
	<select id="location" name="location">
	<option value=""></option>
	<?php $terms = get_terms('classlocation');
	foreach($terms as $term){
		if(isset($_GET['location']) && $_GET['location'] == $term->slug){
			echo '<option value="'.$term->slug.'" selected="selected" >'.$term->name.'</option>';
		}else{
			echo '<option value="'.$term->slug.'" >'.$term->name.'</option>';
		}
	} ?>
	</select>
</div>

<div class="filterCont">
	<h4>Week</h4>
	<label for="week" class="sr-only">Filter by week</label>
	<select id="week" name="week">
	<option value=""></option>
	<?php
		$isLeap = date('L');
		$currentYear = date('Y');
		$currentWeek = date('W');
		if($isLeap == 1){
			$weekCount = 53;
		}else{
			$weekCount = 52;
		}
		$i = 1;
    $terms = get_terms('classweek', $args);
    foreach($terms as $term){

      $weekStart = date('Y-m-d',strtotime($currentYear . 'W' . str_pad($term->slug, 2, '0', STR_PAD_LEFT)));
      $weekStart = date('M jS',strtotime('-1 days', strtotime($weekStart)));
      $weekEnd = date('M jS', strtotime($weekStart. ' + 6 days'));

      echo '<option value="'.$term->slug.'" >'.$weekStart .' - '.$weekEnd.'</option>';
    } ?>
	?>
	</select>
</div>
<div class="filterCont submit">
	<input type="submit" name="submit" value="filter">
</div>
</form>

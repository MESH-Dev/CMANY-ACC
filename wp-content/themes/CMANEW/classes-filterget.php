 <form method="GET" action="">
<h2>Filter By:</h2>
<div class="filterCont">
	<h4>Season</h4>
	<select name="season">
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
	<select name="category">
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
	<select name="age">
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
	<select name="location">
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

	<select name="week">
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
		while($i <= $weekCount){
      $weekStart = date('M jS',strtotime($currentYear . 'W' . str_pad($i, 2, '0', STR_PAD_LEFT)));
      $weekEnd = date('M jS', strtotime($weekStart. ' + 6 days'));
      if (($weekStart > $smallestDate) && ($weekStart < $largestDate)) {
        echo '<option value="'.$i.'">'.$weekStart.' - '.$weekEnd.'</option>';
      }
			$i++;
		}
	?>
	</select>
</div>
<div class="filterCont submit">
	<input type="submit" name="submit "value="filter">
</div>
</form>

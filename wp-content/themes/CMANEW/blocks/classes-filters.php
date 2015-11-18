 <form method="POST">
<h2>Filter By:</h2>
<div class="filterCont">
	<h4>Season</h4>
	<label for="season" class="sr-only">Filter by season</label>
	<select id="season" name="season">
		<option value=""></option>
		<?php $terms = get_terms('classseason');
		foreach($terms as $term){
			if(isset($_POST['season']) && $_POST['season'] == $term->slug){
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
			if(isset($_POST['category']) && $_POST['category'] == $term->slug){
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
		if(isset($_POST['age']) && $_POST['age'] == $term->slug){
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
		if(isset($_POST['location']) && $_POST['location'] == $term->slug){
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
		while($i <= $weekCount){
			$weekStart = date('M jS',strtotime($currentYear . 'W' . str_pad($i, 2, '0', STR_PAD_LEFT)));
			$weekEnd = date('M jS', strtotime($weekStart. ' + 6 days'));
			echo '<option value="'.$i.'">'.$weekStart.' - '.$weekEnd.'</option>';
			$i++;
		}
	?>
	</select>
</div>
<div class="filterCont submit">
	<input type="submit" name="submit "value="filter">
</div>
</form>
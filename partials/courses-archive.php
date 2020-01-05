<?php 
// Define relationships
$university = get_field('rel_university'); 
$fees_in_usd = number_format((float)get_field('fees_in_usd'));
$fees_in_inr = number_format((float)get_field('fees_in_inr'));
//Start Layout
?>
<div class="col-12 mt-2 mb-2 ">
	<div class="card shadow-lg card-hover">
		<div class="card-body">
			<h4 class="title is-4"> <?php the_title(); ?> </h4>
			<h6 class="subtitle text-muted"><i class="fa fa-building"></i><span onClick="window.location.href='<?php echo $university[0]->guid; ?>'"><?php echo $university[0]->post_title; ?></span></h6>

			<div class="row courseDetails">
				<div class="col border-right text-center">
			<i class="fa fa-mortar-board"></i><br><span><?php the_field('course_type'); ?></span>
				</div>
				<div class="col border-right text-center">	
			<i class="fa fa-calendar-o"></i><br> <span>Starts: <?php the_field('start_date'); ?></span>
				</div>
				<div class="col border-right text-center">
			<span class="card-text"> <i class="fa fa-clock-o"></i><br><?php //the_field('shift');?> Duration: <?php the_field('course_duration'); ?></span>
				</div>
				<div class="col text-center">
			 <span class="card-text"><i class="fa fa-money"></i><br>Fees: <?php echo "$ ". $fees_in_usd ?> <br>( ₹ <?php echo $fees_in_inr; ?>)</span>
			 	</div> 
			  <?php // print_r($university); ?>
			  </div>
		</div>
		<div class="row no-gutters">
			<div class="col">
		<button class="btn pt-2 pb-2 btn-block btn-outline-primary mt-2" onClick="window.location.href='<?php the_permalink(); ?>'">Get More Info</button></div>
		<div class="col">
			<form id="enroll" method="post" action="get.php">
				<input type="hidden" name="postTitle" value="<?php echo the_title(); ?>">
				<button class="btn pt-2 pb-2 btn-block btn-warning mt-2">Enroll Now</button>
			</form>

		<button class="btn pt-2 pb-2 btn-block btn-success mt-2" onClick="window.location.href='<?php the_permalink(); ?>'">Enroll Now</button>
		</div>
		</div>
	</div>
</div>

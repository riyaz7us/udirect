<?php 
// Define relationships
$university = get_field('uni'); 
// Define list item (for score requirements)
$li = '<li class="list-group-item flex-fill">';
$cli = '</li>';
// Define Score requirements
$gpa = $university[0]->gpa;
$ielts = $university[0]->ielts;
$toefl = $university[0]->toefl;
$pte = $university[0]->pte;
$sat = $university[0]->sat;

$gpa>0 ? $agpa = $li.'GPA : '.$gpa.$cli:"";
$ielts>0 ? $aielts = $li.'IELTS : '.$ielts.$cli:"";
$toefl>0 ? $atoefl = $li. 'TOEFL : '.$toefl.$cli:"";
$pte>0 ? $apte = $li.'PTE : '.$pte.$cli:"";
$sat>0 ? $asat = $li.'SAT : '.$sat.$cli:"";

//Start Layout
?>
<section class="jumbotron">
 	<div class="container row">
	  	<div class="col-4">
	  	<?php echo wp_get_attachment_image( get_post_thumbnail_id(get_field("uni")[0]->ID), 'thumbnail'); ?>
	  	</div>
	  	<div class="col-8">
	    <h1 class="title"><?php the_title(); ?></h1>
	    <h5 class="text-muted b">&nbsp;<?php echo $university[0]->post_title; ?></h5>
	    <span class="text-muted"> <i class="fas fa-map-marker-alt"></i> Location: <?php echo $university[0]->location; ?></span><br/>
				<a href="<?php echo $university[0]->guid; ?>">Know More...</a>
		</div>
	</div>
</section>
<div class="col-12">
			<hr>

			<!--Score Requirements-->
			<div class="card mt-2 mb-4 bg-primary text-white">
				<div class="card-body">
					<h5 class="b">Requirements:</h5><br>
					<ul class="list-group list-group-horizontal text-center"><?php echo $agpa.$atoefl.$aielts.$apte.$asat ?></ul>
				</div>
			</div>
			<!--Tabulated Details-->
			<table class="table">
				<tr>
					<td><span class="card-text"><i class="fa fa-graduation-cap"></i> Course Level: <?php the_field('course_type'); ?></span></td>
					<td><span class="card-text"><i class="far fa-calendar"></i> Start Date: <?php the_field('start_date'); ?></span></td>
				</tr>
				<tr>
					<td><span class="card-text"><i class="fa fa-coins"></i> Fees: <?php the_field('shift'); ?></span></td>
					<td><span class="card-text"><i class="fa fa-hourglass-half"></i> Duration: <?php the_field('course_duration'); ?></span> <br/></td>
				</tr>
			</table>
			  <?php // print_r($university); ?>
			  <!--Main Content-->

			  <div class="card mt-4">
			  	<div class="card-body">
			  		<?php the_content(); ?>
			  	</div>
			  </div>
</div>

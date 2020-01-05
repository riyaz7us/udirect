<?php 
 
 //Courses related to university


$imgurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
// Define list item (for score requirements)
$li = '<li class="list-group-item flex-fill">';
$cli = '</li>';
// Define Score requirements
$gpa = get_field('gpa');
$ielts = get_field('ielts');
$toefl = get_field('toefl');
$pte = get_field('pte');
$sat = get_field('sat');

$gpa>0 ? $agpa = $li.'GPA: '.$gpa.$cli:"";
$ielts>0 ? $aielts = $li.'IELTS: '.$ielts.$cli:"";
$toefl>0 ? $atoefl = $li. 'TOEFL: '.$toefl.$cli:"";
$pte>0 ? $apte = $li.'PTE: '.$pte.$cli:"";
$sat>0 ? $asat = $li.'SAT: '.$sat.$cli:"";

//Start Layout
?>

<section class="container">
		<div class="card-body">
			<div class="row">
			<div class="col-2 card-body p-2"><img src="<?php echo $imgurl; ?>" class="card-img"></div>
			<div class="col-10 my-auto"><h2 class="title is-2"> <?php the_title(); ?> </h2></div>
			</div>
			<hr>
			<!--Score Requirements-->
				<div class="card mt-2 mb-4">
					<div class="card-body">
						<h6 class="title is-6" >Requirements:</h6>
						<ul class="list-group font-weight-bold list-group-horizontal"><?php echo $agpa.$atoefl.$aielts.$apte.$asat ?></ul>
					</div>
				</div>
			<!--Courses List-->
			<div class="card mt-2 mb-4">
				<div class="card-body">
					<h6 class="title is-6">Find Courses:</h6>
					<ul class="list-group">
						<li class="list-group-item">
							<?php 
							$posts = get_field('courses_list');
							foreach ($posts as $p): ?>
								<h1><?php echo get_the_title( $p->ID ); ?></h1> 

								<!-- <form action="query" method="get">
									<input type="hidden" name="s" value="<?php /*echo get_the_title( $p->ID );*/ ?>"> -->
									<button type="submit" onClick="window.location.href='/register'">Register Now</button>
								<?php
							endforeach;
							?><br>

							<?php
							$school_id = get_field('related_courses');
							$school_slug = $school_id->slug;
							echo "<a class='btn btn-primary btn-block' href='/school/".$school_slug."'>view all related courses</a>"; ?>
							<?php echo do_shortcode( '[profilter]' ); ?>
						</li>
					</ul>
				</div>
			</div>
			  <!--Main Content-->
			  <div class="card mt-4">
			  	<div class="card-body">
			  		<?php the_content(); ?>

			  		<ul class="row container"></ul>
			  		</div>
			  		
			  	</div>
			  </div>
		</div>
</section>
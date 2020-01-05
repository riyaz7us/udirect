<?php 
$imgurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
//Start Layout
?>
<div class="col-12 mt-2">
	<div class="card card-hover">
		<div class="row no-gutters">
			<div class="col-md-3 card-body p-2 pt-4"> <img src="<?php echo $imgurl; ?>" class="card-img"></div>
			<div class="col-md-9"><div class="card-body">
				<h6 class="title is-6"> <?php the_title(); ?> </h6>
				<span class="card-subtitle text-muted"><i class="fa fa-map-marker"></i><?php echo get_field('location'); ?></span><br/>
				<hr>
				<span><i class="fa fa-line-chart"></i>Ranking: <?php echo get_field('ranking'); ?></span><br/>
					<span class="btn-group btn-block">
						 <button class="btn btn-outline-primary mt-2" onClick="window.location.href='<?php the_permalink(); ?>'">Get More Info</button>
						 
						 <button id="nform" class="btn btn-outline-success mt-2" onClick="window.location.href='<?php the_permalink(); ?>/#enroll-form'">Enroll Now</button>
						 
					</span>
			  </div></div>
		</div>
	</div>
</div>

<form action="" method="get" id="filter">
	<label for="course_duration">Course Duration:</label><br>
	<div class="select is-fullwidth">
	<select id="course_duration" name="course_duration" >
		<option value="" class="p-5" default> Year</option>
		<option value="1">1 Year</option>
		<option value="4">4 Years</option>
	</select>
	</div><br>
	<label for="shift">Shift:</label><br>
	<div class="select is-fullwidth">
	<select id="shift" name="shift" >
		<option value="" default>Shift</option>
		<option value="full">Full-Time</option>
		<option value="part">Part-Time</option>
	</select>
	</div><br>
	<input type="hidden" name="action" value="myfilter">
	<button type="submit" class="button mt-2 is-primary is-fullwidth"><i class="fa fa-filter"></i>Filter</button>
</form>

<script type="text/javascript">


(function($) {
	
	// change
	$('#filter').on('submit', function(){

		// vars
		var url = '<?php echo home_url('courses'); ?>';
			args = {};
			
		

		// loop over filters
		$('#archive-filters .filter').each(function(){
			
			// vars
			var filter = $(this).data('filter'),
				vals = [];
			
			
			// find checked inputs
		course_duration: $(this).find('#course_duration').val(),
		shift: $(this).find('#shift').val(),
		university: $(this).find('#university').val(),
	
			});
			
			
			// append to args
			args[ filter ] = vals.join(',');
			
		});
		
		
		// update url
		url += '?';
		
		
		// loop over args
		$.each(args, function( name, value ){
			
			url += name + '=' + value + '&';
			
		});
		
		
		// remove last &
		url = url.slice(0, -1);
		
		
		// reload page
		window.location.replace( url );
		

	});

(jQuery);

</script>
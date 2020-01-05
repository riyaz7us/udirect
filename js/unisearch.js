$ = jQuery;
var unisearch = $("#unisearch");
var unisearchform = $('#unisearchform');
var paged = 1;
var loadmore = "<button id='loadmore' onClick='load();'>load more</button>"
//$(".widget-area").removeClass("col-md-3");
$('#levelo').click(function(e){
	$('#level').css('visibility','visible');
	$('#levelo').hide();
})
$('#levelc,#disco,#loco,ul').click(function(e){
	$('#level').css('visibility','hidden');
	$('#levelo').show();
})
$('#disco').click(function(e){
	$('#disc').css('visibility','visible');
	$('#disco').hide();
})
$('#discc,#levelo,#loco,ul').click(function(e){
	$('#disc').css('visibility','hidden');
	$('#disco').show();
})
$('#loco').click(function(e){
	$('#loc').css('visibility','visible');
	$('#loco').hide();
})
$('#locc,#levelo,#disco,ul').click(function(e){
	$('#loc').css('visibility','hidden');
	$('#loco').show();
})


//get url parameter
function _get(parameter , URL) {
    var reg = new RegExp( '[?&]' + parameter + '=([^&#]*)', 'i' );
    var string = reg.exec(URL);
    return string ? string[1] : undefined;
};


/*First Ajax*/
unisearchform.submit(function(e){
	paged=1;
	e.preventDefault();
	//console.log("form submitted");
	unisearch.find('#response').remove();
	//serialized form data
	var getdata = unisearchform.serialize();
	$.ajax({
		url : '/wp-json/wp/v2/universities',
		data : getdata,
		timeout: 10000,
		beforeSend: function(){
			unisearch.find("ul").empty();
			unisearch.find('ul').append('<div id="loader" class="col text-center mt-5"><div class="lds-dual-ring"></div></div>');
		},
		success : function(response){
			console.log(unisearchform.serialize('')+'&paged='+paged);
			console.log(_get("subject",getdata));
			unisearch.find("ul").empty();
			unisearch.find('button').removeClass('is-loading');
			unisearch.find("#loader").remove();
			for (var i=0; i < response.length; i++){
				console.log(response[i]);
				var html = "<li class='col-12 mt-5'>"+
								"<section class='card'>"+
								"<div class='card-body'><div class='row'>"+
								"<div class='col-md-2'>"+
								"<img src='"+response[i].image+"'></div>"+
								"<div class='col-md-5 my-auto'>"+
								"<h4 class='card-title'>"+response[i].post_title+"</h4>"+
								"<h6 class='subtitle text-muted'><i class='fas fa-map-marker-alt'></i> "+response[i].acf.location+"</h6>"+
								"<p>"+response[i].post_content+"</p></div>"+
								"<div class='col-md-1 my-auto text-center g'><i class='il fa fa-trophy'></i><br/>"+response[i].acf.ranking+"</div>"+
								"<div class='col-md-2 my-auto text-center g'><i class='il fas fa-wallet'></i><br/>"+response[i].acf.fees+"</div>"+
								"<div class='col-md-2 my-auto'>"+
								"<button class='btn btn-block btn-info is-fullwidth mt-2' onClick='window.location.href=`"+response[i].guid+"?subject="+_get("subject",getdata)+"`'>"+"View Courses</button>"+
								"<button class='btn btn-block btn-outline-info is-fullwidth mt-2' onClick='window.location.href=`"+response[i].guid+"`'>"+"Go to University</button>"+
								"</div></div></section></li>";

				unisearch.find('ul').append(html);
			};

			unisearch.find('ul').append(loadmore);
			/*$.each(response, function (name, value) {
				console.log(name+'='+value.title.rendered);
				$.each(value.acf.courses_list, function(index, value2){
					if (value2.post_title=='Accounting & Finance'){
					console.log(index+'='+value2.post_title);
					}
				});
			});*/
		},
		error: function(){
			unisearch.find("#loader").remove();
			unisearch.find('ul').append('<div class="card-body text-center">No Results Found</div>');
		}

	});
});
function load(){
	paged+=1;
	$.ajax({
		url: '/wp-json/wp/v2/universities',
		data : $getdata+'&paged='+paged,
		beforeSend: function(){
			unisearch.find("#loadmore").remove();
			unisearch.find('ul').append('<div id="loader" class="col text-center mt-5"><div class="lds-dual-ring"></div></div>');
		},
		success: function( response ) {
			unisearch.find("#loader").remove();
			for (var i=0; i < response.length; i++){
				var html2 = "<li class='col-12 mt-5'>"+
								"<section class='card'>"+
								"<div class='card-body'><div class='row'>"+
								"<div class='col-md-2'>"+
								"<img src='"+response[i].image+"'></div>"+
								"<div class='col-md-5 my-auto'>"+
								"<h4 class='card-title'>"+response[i].post_title+"</h4>"+
								"<h6 class='subtitle text-muted'><i class='fas fa-map-marker-alt'></i> "+response[i].acf.location+"</h6>"+
								"<p>"+response[i].post_content+"</p></div>"+
								"<div class='col-md-1 my-auto text-center g'><i class='il fa fa-trophy'></i><br/>"+response[i].acf.ranking+"</div>"+
								"<div class='col-md-2 my-auto text-center g'><i class='il fas fa-wallet'></i><br/>"+response[i].acf.fees+"</div>"+
								"<div class='col-md-2 my-auto'>"+
								"<button class='btn btn-block btn-info is-fullwidth mt-2' onClick='window.location.href=`"+response[i].guid+"`'>"+"Go to Course</button>"+
								"<button class='btn btn-block btn-outline-info is-fullwidth mt-2' onClick='window.location.href=`"+response[i].guid+"`'>"+"View University</button>"+
								"</div></div></section></li>";
						unisearch.find('ul').append(html2);
							}
							if (response.length>9){unisearch.find('ul').append(loadmore);}
							else {unisearch.find('ul').append("No More Results.");}
							
		},
		error: function(){
			unisearch.find("#loader").remove();
			unisearch.find('ul').append('<div class="card-body">No More Results...</div>');
		}
	})
};

$(window).on('load',function(){
        $('#searchmodal').modal('show');
    });


var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    $('#unisearchform').submit();
    $('#searchmodal').modal('hide');
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

/*function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}*/

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

$('.discipline').click(function() {
      var id = $(this).attr('id');
      unisearch.find('#'+id).prop('checked', true);
      nextPrev(1);
    });
$('.level').click(function() {
      var id = $(this).attr('id');
      unisearch.find('#'+id).prop('checked', true);
      nextPrev(1);
    });
$('.location').click(function() {
      var id = $(this).attr('id');
      unisearch.find('#'+id).prop('checked', true);
      nextPrev(1);
    });

$('#loadall').click(function(e){unisearchform.submit()})


console.log(window.location.search);
var subject = $('input[name="subject"]').val();
console.log(subject);
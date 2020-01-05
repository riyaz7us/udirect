$ = jQuery;
/*function stoperror() {
   return true;
}
window.onerror = stoperror;*/

var profilter = $('#profilter');
var coursegrep = $('#coursegrep');
var discipline = $('#discipline');
var formdata = coursegrep.serialize();

$(window).on('load',(function(e){
	e.preventDefault();
	console.log(window.location.search+'&university='+_get('university',formdata));
	profilter.find('#response').remove();
	$.ajax({
		url : '/wp-json/wp/v2/programs/',
		data : window.location.search+'&university='+_get('university',formdata),
		beforeSend: function(){
			profilter.find("ul").empty();
			profilter.find('ul').append('<div class="col text-center mt-5"><div class="lds-dual-ring"></div></div>');
		},
		success : function(response){
			console.log(coursegrep.serialize());
			profilter.find("ul").empty();
			profilter.find('button').removeClass('is-loading');
			for (var i=0; i < response.length; i++){
				console.log(response[i]);
				var arr=response[i];
				var html = "<li class='col-12 row'>"+
								"<div class='col-9'><h4 class='card-title'>"+response[i].post_title+"</h4></div>"+
								"<div class='col-3'><button class='btn btn-primary addtocart' id='"+response[i].ID+"'>Add to Wishlist</button></div></li><hr/>";
							
				profilter.find('ul').append(html);

			};
		}
	});
}));

discipline.change(function(e){
	e.preventDefault();
	console.log(coursegrep.serialize());
	profilter.find('#response').remove();
	$.ajax({
		url : '/wp-json/wp/v2/courses',
		data : coursegrep.serialize(),
		beforeSend: function(){
			profilter.find("ul").empty();
			profilter.find('ul').append('<div class="col text-center mt-5"><div class="lds-dual-ring"></div></div>');
		},
		success : function(response){
			console.log(coursegrep.serialize());
			profilter.find("ul").empty();
			profilter.find('button').removeClass('is-loading');
			for (var i=0; i < response.length; i++){
				console.log(response[i]);
				var arr=response[i];
				var html = "<li class='col-12 row'>"+
								"<div class='col-9'><h4 class='card-title'>"+response[i].post_title+"</h4></div>"+
								"<div class='col-3'><button class='btn btn-primary addtocart' id='"+response[i].ID+" onClick='addtocart();'>Add to Wishlist</button></div></li><hr/>";
							
				profilter.find('ul').append(html);

			};
		}
	});
});

function addtocart(){
	e.preventDefault();
	console.log('clicked');
	var productid = $(this).attr('id');
	console.log(productid);
	$.ajax({
		url : '/',
		data : '?addtocart='+productid,
		success : function(){
			console.log('?addtocart='+productid);
			console.log('success');
			},
		});
};

$(document).on("click",".addtocart", function(e){
	e.preventDefault();
	console.log('clicked');
	var productid = $(this).attr('id');
	console.log(productid);
	var cartdata = {
		product_id: productid,
		quantity: 1
	}
	$.ajax({
		method: 'POST',
		url : '/wp-json/cocart/v1/add-item',
		data : cartdata,
		success : function(response){
			console.log(cartdata);
			console.log('success');
			console.log(response);
			},
		});
});

/*console.log(window.location.search);*/
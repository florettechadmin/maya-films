<?php define('__PAGE__', 'contact'); ?>

<?php require 'header.php'; ?>
<div class="content">

	<div class="container contact">
		<section class="form padded-top padded-bottom">
			<h1 class="text-center">CONTACT US</h1>

			<div class="text-center">
				<p>We are happy to answer any question you have. Just send us a message in the form below</p>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<form class="form" method="post" action="mailer.php" id="contact-form">
						<div class="form-group">
							<div class="text-center"><label class="control-label" for="contactFormName">YOUR NAME (required)</label></div>
							<div><input type="text" class="form-control" id="contactFormName" name="name" placeholder=""></div>
						</div>
						<div class="form-group">
							<div class="text-center"><label class="control-label" for="contactFormEmail">YOUR EMAIL (required)</label></div>
							<div><input type="text" class="form-control" id="contactFormEmail" name="email" placeholder=""></div>
						</div>
						<div class="form-group">
							<div class="text-center"><label class="control-label" for="contactFormNumber">MOBILE NUMBER</label></div>
							<div><input type="text" class="form-control" id="contactFormNumber" name="mobile" placeholder=""></div>
						</div>
						<div class="form-group">
							<div class="text-center"><label class="control-label" for="contactFormMessage">YOUR MESSAGE</label></div>
							<div><textarea type="text" class="form-control" id="contactFormMessage" name="msg" placeholder=""></textarea></div>
						</div>
						<div class="form-group text-center">
							<button class="btn">SEND</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="text-center">
				<p><b>MAYA FILMS</b> <br />
				#18, Police Station Road, Basavanagudi, Bangalore - 560004, Karnataka - India <br />
				T: +91-80-2660-2829  |  +91-80-2660-4166</p>
			</div>
			<div id="googleMaps">
			</div>

		</section>
	</div>
	<script>
		(function() {
			var validateEmail = function(email) {
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				return re.test(email);
			}
			$('#contact-form').submit(function(e) {
				e.preventDefault();
				var form = $(this);
				var email = $(this).find('input[name="email"]').val();
				var name = $(this).find('input[name="name"]').val();
				var mobile = $(this).find('input[name="mobile"]').val();
				var msg = $(this).find('textarea[name="msg"]').val();
				var errorStat = false;
				var error = '<ul>';
				if(email == '' || !validateEmail(email)) {
					errorStat = true;
					error += '<li><b>Please enter a valid email.</b></li>'
				}
				if(name == '') {
					errorStat = true;
					error += '<li><b>Please enter your name.</b></li>'
				}
				error += '</ul>';
				if(errorStat) {
					sweetAlert({
						title: 'Oops...',
						text: '<div><p>Please correct the following error(s).</p>'+error+'</div>',
						type: 'error',
						html: true
					});
				} else {
					$('#loader').trigger('show');
					$.ajax({
						type: 'GET',
						url: 'csrf.php',
						complete: function() {
						},
						success: function(res) {
							$.ajax({
								type: 'POST',
								url: form.attr('action'),
								data: {
									'email': email,
									'name': name,
									'mobile': mobile,
									'msg': msg,
									'csrf': res
								},
								success: function(res) {
									sweetAlert({
										title: 'Success',
										text: '<div><b>Thankyou for feedback</b></div>',
										type: 'success',
										html: true
									});
									$(form).find('input[name="email"]').val('');
									$(form).find('input[name="name"]').val('');
									$(form).find('input[name="mobile"]').val('');
									$(form).find('textarea[name="msg"]').val('');
									$('#loader').trigger('hide');
								},
								error: function(jqXHR, textStatus, errorThrown) {
									if(jqXHR.status == 422) {
										var res;
										try {
											res = jQuery.parseJSON(jqXHR.responseText);
										} catch (e) {
											res = ['json_parse'];
										}
										var error = '<ul>';
										$(res).each(function(index, e) {
											switch(e) {
												case 'missing_email':
													error += '<li><b>Please enter a valid email.</b></li>';
													break;
												case 'blank_email':
													error += '<li><b>Please enter a valid email.</b></li>';
													break;
												case 'invalid_email':
													error += '<li><b>Please enter a valid email.</b></li>';
													break;
												case 'missing_name':
													error += '<li><b>Please enter your name.</b></li>';
													break;
												case 'blank_name':
													error += '<li><b>Please enter your name.</b></li>';
													break;
												case 'csrf_error':
													error += '<li><b>Unknown error.</b></li>';
													break;
												default:
													error += '<li><b>Unknown error.</b></li>';
													break;
											}
										});
										error += '</ul>';
										sweetAlert({
											title: 'Oops...',
											text: '<div><p>Please correct the following error(s).</p>'+error+'</div>',
											type: 'error',
											html: true
										});
									} else {
										sweetAlert({
											title: 'Oops...',
											text: '<div><b>Something went wrong. Try again later.</b></div><div><small>Status code: '+jqXHR.status+'</small></div>',
											type: 'error',
											html: true
										});
									}
									$('#loader').trigger('hide');
								}
							});
						},
						error: function(jqXHR, textStatus, errorThrown) {
							if(jqXHR.status == 422) {
								var res = jQuery.parseJSON(jqXHR.responseText);
								var error = '<ul>';
								$(res).each(function(index, e) {
									switch(e) {
										default:
											error += '<li><b>Unknown error.</b></li>';
											break;
									}
								});
								error += '</ul>';
								sweetAlert({
									title: 'Oops...',
									text: '<div><p>Please correct the following error(s).</p>'+error+'</div>',
									type: 'error',
									html: true
								});
							} else {
								sweetAlert({
									title: 'Oops...',
									text: '<div><b>Something went wrong. Try again later.</b></div><div><small>Status code: '+jqXHR.status+'</small></div>',
									type: 'error',
									html: true
								});
							}
						}
					});
				}
			});
		})();
	</script>
</div>
<script>
function initMap() {
  // Specify features and elements to define styles.
  var styleArray = [
    {
      featureType: "all",
      stylers: [
       { saturation: -80 }
      ]
    },{
      featureType: "road.arterial",
      elementType: "geometry",
      stylers: [
        { hue: "#00ffee" },
        { saturation: 50 }
      ]
    },{
      featureType: "poi.business",
      elementType: "labels",
      stylers: [
        { visibility: "off" }
      ]
    }
  ];

  var latLong = {lat: 12.9421948, lng: 77.5712143};
  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('googleMaps'), {
    center: latLong,
    scrollwheel: false,
    // Apply the map style array to the map.
    styles: styleArray,
    zoom: 17
  });

    var marker = new google.maps.Marker({
      position: latLong,
      map: map,
      title: 'Mayafilms'
    });
};
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuQhzrHcHpmNbGzKRTgYxv7TJchKa48co&callback=initMap" async defer></script>
<?php require 'footer.php'; ?>
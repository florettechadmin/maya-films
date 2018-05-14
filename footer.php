	<footer>
		<div class="container padded clearfix">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-5">
							<div class="row">
								<div class="col-md-12"><h4>COMPANY</h4></div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<ul>
										<li><a href=".">ABOUT US</a></li>
										<li><a href="projects.php">WORKS</a></li>
										<li><a href="awards.php">AWARDS</a></li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
										<li><a href="media.php">MEDIA</a></li>
										<li><a href="testimonials.php">TESTIMONIALS</a></li>
										<li><a href="contact.php">CONTACT</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-3 social text-right"><a href="https://www.facebook.com/mayafilms"><span class="fa fa-facebook"></span></a><a href="https://www.youtube.com/user/TheMayaofficial"><span class="fa fa-youtube"></span></a></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center copyright">
					<ul>
						<li><small>COPYRIGHT &copy; 2016 MAYA FILMS</small></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<!-- Scroll reveal -->
	<script>
		(function() {
			var sr = ScrollReveal();
			sr.reveal('.scrollreveal.scrollreveal-left', {
				origin: 'left',
				duration: 1000,
				delay: 250,
				afterReveal: function() {
					$(window).resize();
				}
			});
			sr.reveal('.scrollreveal.scrollreveal-top', {
				origin: 'top',
				duration: 1000,
				delay: 250,
				afterReveal: function() {
					$(window).resize();
				}
			});
			sr.reveal('.scrollreveal.scrollreveal-right', {
				origin: 'right',
				duration: 1000,
				delay: 250,
				afterReveal: function() {
					$(window).resize();
				}
			});
			sr.reveal('.scrollreveal.scrollreveal-bottom', {
				origin: 'bottom',
				duration: 1000,
				delay: 250,
				afterReveal: function() {
					$(window).resize();
				}
			});

			sr.reveal('.scrollreveal.scrollreveal-left-sequence', {
				origin: 'left',
				duration: 1000,
				delay: 250,
				afterReveal: function() {
					$(window).resize();
				}
			}, 250);
			sr.reveal('.scrollreveal.scrollreveal-top-sequence', {
				origin: 'top',
				duration: 1000,
				delay: 250,
				afterReveal: function() {
					$(window).resize();
				}
			}, 250);
			sr.reveal('.scrollreveal.scrollreveal-right-sequence', {
				origin: 'right',
				duration: 1000,
				delay: 250,
				afterReveal: function() {
					$(window).resize();
				}
			}, 250);
			sr.reveal('.scrollreveal.scrollreveal-bottom-sequence', {
				origin: 'bottom',
				duration: 1000,
				delay: 250,
				afterReveal: function() {
					$(window).resize();
				}
			}, 250);
		})();
	</script>

	<!-- Slider -->
	<script>
		(function() {
			var slider = function(obj) {
				var timer = 0;
				var children = obj.find('.slides').length;
				var count = 1;
				var dime = function() {
					clearTimeout(timer);
					obj.find('.slider-pane').find('.slides').stop();
					var w = $(window).width();
					count = 1;
					if(w >= 768) {
						count = 2;
					}
					if(w >= 992) {
						count = 3;
					}
					if(w >= 1200) {
						count = 4;
					}
					//var totalSpan = (100/count)*children;
					//obj.find('.slider-pane').css({width: totalSpan+'%'});
					//obj.find('.slider-pane').css({width: '100%'});
					obj.find('.slides').css({width: 100/count+'%', opacity: 0, display: 'none'});
					for(var i=0; i<count; i++) {
						obj.find('.slides').eq(i).css({opacity: 1, display: 'block'});
					}
				}
				var loop = function(i) {
					if(typeof(i) === 'undefined') {
						i = 'n';
					}
					clearTimeout(timer);
					obj.find('.slides').stop();
					if(children > count) {
						if(i === 'n') {
							obj.find('.slides').eq(0).animate({
								opacity: 0
							}, 250, function() {
								obj.find('.slides').eq(0).css({display: 'none'});
								obj.find('.slider-pane').append($(this));
								obj.find('.slides').eq(count-1).css({display: 'block'});
								obj.find('.slides').eq(count-1).animate({
									opacity: 1
								}, 250);
							});
						} else if(i === 'p') {
							obj.find('.slides').eq(count-1).animate({
								opacity: 0
							}, 250, function() {
								obj.find('.slides').eq(count-1).css({display: 'none'});
								obj.find('.slider-pane').prepend(obj.find('.slides').eq(-1));
								obj.find('.slides').eq(0).css({display: 'block'})
								obj.find('.slides').eq(0).animate({
									opacity: 1
								}, 250);
							});
						}
					}
					timer = setTimeout(function() {
						loop('n');
					}, 4000);
				}
				obj.bind('slide-forward', function() {
					loop('n');
				});
				obj.bind('slide-backward', function() {
					loop('p');
				});
				obj.find('.arrow.arrow-right').click(function() {
					obj.trigger('slide-forward');
				});
				obj.find('.arrow.arrow-left').click(function() {
					obj.trigger('slide-backward');
				});
				dime();
				$(window).resize(dime);
				$(function() {
					dime();
					setTimeout(function() {
						loop('n');
					}, 4000);
				});
			};
			$('.slider').each(function() {
				slider($(this));
			});
		})();
	</script>
	<div class="arrow-down text-center" style="display: none; position: fixed; width: 100%; height: 36px; bottom: 10px; left: 0;"><img src="images/arrow_down.png" style="display: inline-block; height: 100%;" /></div>
	<script>
		$(function() {
			var img = new Image();
			img.onload = function() {
				setTimeout(function() {
					$('.arrow-down').css({opacity: 0, display: 'block'});
					$('.arrow-down').animate({
						opacity: 1
					}, 500, function() {
						$('.arrow-down').animate({
							opacity: 0
						}, 500, function() {
							$('.arrow-down').animate({
								opacity: 1
							}, 500, function() {
								$('.arrow-down').animate({
									opacity: 0
								}, 500, function() {
									$('.arrow-down').css({display: 'none'});
								});
							});
						});
					});
				}, 2000);
			}
			img.src = 'images/arrow_down.png';
		});
	</script>
	<div id="loader"></div>
	<script>
		(function() {
			$('#loader').css({display: 'none', opacity: 0});
			$('#loader').bind('show', function() {
				$('#loader').stop();
				$('#loader').css({
					display: ''
				});
				$('#loader').animate({
					opacity: 1
				}, 200, function() {

				});
			});
			$('#loader').bind('hide', function() {
				$('#loader').stop();
				$('#loader').animate({
					opacity: 0
				}, 200, function() {
					$('#loader').css({
						display: 'none'
					})
				});
			});
		})();
	</script>
	
</body>
</html>
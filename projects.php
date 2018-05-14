<?php define('__PAGE__', 'work'); ?>

<?php
	$playlistID = array();
	$playlistID['common'] = 'PLbUh9sjiMWsXcE5-u2TzByt06VfuK8vMr';
	$playlistID['corporate'] = 'PLbUh9sjiMWsWF_ozlA_M0dlPw-T5pBOND';
	$playlistID['government'] = 'PLbUh9sjiMWsUtS2AexEjxk7NTmGRyVZOq';
	$playlistID['internship'] = 'PLbUh9sjiMWsVlQ156hq5SNc8PX08qAbiq';
	$playlistID['healthcare'] = 'PLbUh9sjiMWsU6GwieW-cYqbqsRo300zTS';
	$playlistID['documentaries'] = 'PLbUh9sjiMWsWfhkWRZ5SYk_lFmcN-1v_H';
	$playlistID['academics'] = '';
	$playlistID['music-video'] = 'PLbUh9sjiMWsVsRnEhiEzSn7qAMYuo6YjY';
	$playlistID['commercials'] = 'PLbUh9sjiMWsViyEpVUcICCqIqPqF6QskC';
	$playlistID['kathachitra'] = '';
	$playlistID['offbeat'] = 'PLbUh9sjiMWsW5UA_rhGPzMFgkXHXFch7m';
	$playlistID['social-responsibility'] = 'PLbUh9sjiMWsU8MiW4Gy4Pm5XP_Jh9J1nW';
	$playlistID['arts'] = 'PLbUh9sjiMWsWwkZZUogkdNWGWbkbqcH78';
	$playlistID['biopics'] = 'PLbUh9sjiMWsWw5qdzvUPB8d0Lz1ZOzabx';
	$playlistID['teleseries'] = 'PLbUh9sjiMWsV_4rNIwBn2biHdcCsMjQ1G';
	define('YOUTUBE_API', 'AIzaSyAYIa5UPpSTMykrAWTR15K00QPtd9sYDZs');

	function yt_playlist($playlistId) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&key='.YOUTUBE_API.'&maxResults=50&playlistId='.$playlistId);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
		/*curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
		curl_setopt ($ch, CURLOPT_CAINFO, 'cacert.pem');*/
		$data = json_decode(curl_exec($ch));
		curl_close($ch);
		return $data;
	}
?>
<?php
function generateSlider($playlistID, $name) {
$data = yt_playlist($playlistID[$name]);
if(isset($data->items)): ?>
<div class="slider">
	<div class="row">
		<div class="arrow arrow-left col-xs-2 col-sm-1">
			<img class="img-responsive" src="images/arrow_left.png" style="max-width: 29px;" />
		</div>
		<div class="slider-pane-fixed col-xs-8 col-sm-10">
			<div class="clearfix slider-pane magnific-popup-videos">
				<?php
					foreach($data->items as $item) : ?>
						<div class="text-center slides">
							<a class="magnific-popup-image" href="https://www.youtube.com/watch?v=<?php echo $item->snippet->resourceId->videoId; ?>">
								<div class="thumb">
									<img class="img-responsive" src="<?php echo $item->snippet->thumbnails->high->url; ?>" style="max-width: <?php echo $item->snippet->thumbnails->high->width; ?>px;" />
								</div>
								<div class="hidden-xs description text-center"><?php echo $item->snippet->title; ?></div>
							</a>
						</div>
					<?php
					endforeach;
				?>
			</div>
		</div>
		<div class="arrow arrow-right col-xs-2 col-sm-1">
			<img class="img-responsive"  src="images/arrow_right.png" style="max-width: 29px;" />
		</div>
	</div>
</div>
<?php endif;
} ?>
<?php require 'header.php'; ?>
<div class="content">

	<div class="container works">
		<section class="projects padded-top padded-bottom">
			<h1 class="text-center">WORKS</h1>
			<div>
				<div class="text-center">
					<div>
						<p>We have worked with some of the premier corporate companies, Government bodies, healthcare companies and retail brands to create films that communicated the objectives and effectively touched the target audiences.</p>
						<p>Have a look at some of our most cherished films below. For a more extensive portfolio, do visit our <a class="anchor1 hvr-grow" href="https://www.youtube.com/user/TheMayaofficial">YouTube page.</a></p>
					</div>
				</div>
				<div class="clearfix">
					<!--<div class="col-lg-8 col-lg-offset-2">
						<div class="row text-center categories" id="categories-pagination">
							<div class="slider-diff">
								<div class="category"><span data-category="corporate" class="selected">Corporate</span></div>
								<div class="category"><span data-category="government">Government</span></div>
								<div class="category"><span data-category="internship">Internship</span></div>
								<div class="category"><span data-category="healthcare">Healthcare</span></div>
								<div class="category"><span data-category="documentaries">Documentaries</span></div>
								<div class="category"><span data-category="academics">Academics</span></div>
								<div class="category"><span data-category="music-video">Music Video</span></div>
								<div class="category"><span data-category="commercials">Commercials</span></div>
								<div class="category"><span data-category="kathachitra">Kathachitra</span></div>
								<div class="category"><span data-category="offbeat">Offbeat</span></div>
								<div class="category"><span data-category="social-responsibility">Social Responsibility</span></div>
								<div class="category"><span data-category="arts">Arts</span></div>
								<div class="category"><span data-category="biopics">Biopics</span></div>
								<div class="category"><span data-category="teleseries">Teleseries</span></div>
							</div>
						</div>
						<script>
							(function() {
								var count = $('#categories-pagination').find('.slider span').length;
								$('#categories-pagination .slider').css({
									width: count*25+'%'
								});
								$('#categories-pagination .slider .category').css({
									width: 100/count+'%'
								});
								$('#categories-pagination .category span').click(function() {
									$('#categories-pagination .category span').removeClass('selected');
									$(this).addClass('selected');
									var cat = $(this).attr('data-category');
									$('#categories-content .set').css({display: 'none'});
									$('#categories-content .set').filter('[data-category="'+cat+'"]').css({display: 'block'});
									$('#categories-slider').find('.categories-slider-single').not('[data-category="'+cat+'"]')
									.stop()
									.animate({opacity: 0}, 250,function() {
										$(this).css({display: 'none'});
										$('#categories-slider').find('.categories-slider-single').filter('[data-category="'+cat+'"]')
										.stop()
										.css({display: 'block'})
										.animate({opacity: 1}, 250, function() {
										});
									});
								});
							})();
						</script>
					</div>-->
				</div>
				<div class="categories-slider clearfix" id="categories-slider">
					<div>
						<div class="categories-slider-single" data-category="common">
							<?php generateSlider($playlistID, 'common'); ?>
						</div>
					</div>
				</div>
				<script>
					(function() {
						$('#categories-slider .slider > div').each(function() {
							var i = 0;
							$(this).find('.youtube-set').each(function() {
								$(this).attr('data-index', i++);
							});
							$(this).find('.youtube-set').css({display: 'none'});
							$(this).find('.youtube-set').filter(':eq(0), :eq(1), :eq(2)').css({display: 'block'});
						});
					})();
				</script>
				<script>
					(function() {
						$('.magnific-popup-videos').each(function() {
							$(this).find('.magnific-popup-image').magnificPopup({
							type:'iframe',
							gallery: {
								enabled: true
							}
						});
						});
					})();
				</script>
				<!--<div class="clearfix">
					<div class="categories-content clearfix col-xs-10 col-xs-offset-1" id="categories-content">
						<div class="set" data-category="corporate">
							<div><p>Films for image building, product launches, training, motivation... we have worked with some of the premier corporate companies and created films that communicated the objectives and effectively touched the target audiences.</p></div>
						</div>
						<div class="set" data-category="government">
							<div><p>Team MAYA has been associated with the Government of Karnataka for over 12 years.</p><p>It was in 2002, the then Chief Minister, SM Krishna envisioned the growth of Karnataka and together with a dynamic team of Ministers and bureaucrats, he charted out the blueprint to establish Bangalore in particular and Karnataka in general as the most favoured global investment destination.</p><p>The foundation for “Asia’s Silicon Valley” was thus laid, and the need for promoting the strengths of Bangalore was an obvious concern.</p><p>That was when Maya Chandra, a recognized corporate film maker was roped in to create a film to attract global investors in Information Technology.</p><p>MAYA conceptualized Karnataka’s first promotional film titled : “The Power of Bangalore. Make IT Yours”. This film highlighted Bangalore’s core strengths, through a slick and pacy professional style, and communicated effectively to global audiences. The title of the film was so popular that it became the tagline for all communications.</p><p>After this success, Maya Chandra created a bank of films across various business sectors – Biotechnology (Karnataka : Genetically Engineered for the Future)&nbsp;BPO (Bangalore : The World’s Business Resource), films promoting Tier 2 cities like Hubli and Mangalore. MAYA was also the communications partner for the State’s flagship event – IT.com for over 9 years.&nbsp;Maya also set in place innovative ideas like documenting testimonials of visiting dignitaries – both Indian and international – thereby establishing a credible resource of testimonials of business leaders, heads of States &amp; countries that is a proud database for the State’s achievements.</p><p>MAYA was then invited by The Government of Andhra Pradesh to create a film for promoting the State as an IT destination (during the tenure of Chief Minister – Shri YS Rajashekara Reddy) This film too was an instant success and was appreciated by global audiences.</p><p>Successive Governments in Karnataka also chose to work with Maya, and the film “ADVANTAGE KARNATAKA” that showcased the State as the world’s most preferred investment destination was hugely popular.&nbsp;She also worked as a communications partner for the Global Investors Meets in 2010 &amp; 2012 and created a highly impactful dual DVD pack containing a Main film – ADVANTAGE KARNATAKA and 9 films promoting the focus business sectors like automotive, aerospace, etc.</p><p>Team MAYA’s expertise in Government Communications has been perfected over the years, and the success of every film has only opened doors of other government departments to work with MAYA.</p><p>During the State Assembly elections early this year, the Karnataka Pradesh Congress Party invited Maya Chandra to conceptualise the electronic media campaign. Team MAYA worked closely with KPCC and the AICC Media team to create a series of television commercials, a music video and a promotional video for the Party President, Dr.G Parameshwara.</p><p>The films were highly appreciated for their creative and quick execution, and were effectively noticed by all sections of the audiences on the electronic media and in film theatres.</p><p>Maya Chandra and her Team has achieved comprehensive and matured expertise in Government and Political Communications with this 10+ year experience.</p></div>
						</div>
						<div class="set" data-category="internship">
							<div><p>MAYA is a preferred place for student internships. Here, the interns are absorbed on live projects and get hands-on experience. They are also given the creative freedom to work on independent assignments.</p><p><strong>Some intern experiences :</strong></p><p><em>'Education should not hamper one's learning', saidsomeone great. With Maya ma'am learning was acontinuous process , from classroom to projects tofield-works. We worked hard, learnt hard, still itwas .. hmmm .. well balle balle all the way ( cozlearning was interesting n fun). We were also thrilledto finally have a lecturer who treated students asindividuals with a mind of their own!!! Thank you Maya ma'am ...(cliched... cliched as it may sound..)we'll always be your students..we still have lots tolearn from you.:)</em></p><p style="text-align: right;">- VRINDA, Department of Electronic Media Studies, Bangalore University</p><p style="text-align: right;">&nbsp;</p><p><em>It was an internship with Maya Chandra who taught us at the university. She is one from the field who taught us the new techniques of film making academically. After that I got an opportunity to do an internship with her. The two films in which I worked were ISA and IT.COM. These two projects was a window to the outside world. I learnt many things which I did not in one and half year of college.</em></p><p><em>With these two projects I understood how the industry works and I was introduced to the Editing studio and the editing softwares which I had never seen before. I learnt to handle the pressure at production and importantly understood "how to work in a group".</em></p><p style="text-align: right;">- Rashmi Rajarao, Department of Electronic Media Studies, Bangalore University</p><p style="text-align: right;">&nbsp;</p><p><em>I thank you for all your support in the initial moment of keeping me in all your production.</em></p><p><em>I should once again thank you because i have worked with the best person- where I learnt the aesthetics of television production. it really made a strong base to my career.</em></p><p><em>With all the experience I had during your stint has made me to get the job I dreamt( sports broadcasting).</em></p><p style="text-align: right;">- Mahesh, Student of Department of Electronic Media Studies, Bangalore</p><p style="text-align: right;">&nbsp;</p><p><em>Your panaromic view of thinking for a newcomer like me was really an enriching experience. While working for corporate films (IT.com 2004 and Manipal Universal Learning), your systematic way of working helped me in learning things easier and in a faster way.</em></p><p><em>One important quality that I was influenced and learned a bit from you is your management skill.</em></p><p style="text-align: right;">- Tyagi, Department of Electronic Media Studies, Bangalore University</p><p style="text-align: right;">&nbsp;</p><p><em>I was here for an internship which was basically to have some experience of the work field. It has been a wonderful experience here. The managing director of this company Ms. Maya Chandra has tried to help us in all ways. Initially we were sent on a documentary shoot which has helped us in understanding the lighting setup and shooting as well. Then we were sent to a film editor which was basically to know more things about editing and that was one awesome experience. Overall a good place and nice environment to work.</em></p><p style="text-align: right;">- Veerendra Neeli, Manipal Institute of Communication, Manipal.</p><p style="text-align: right;">&nbsp;</p><p><em>It has been a great journey with MAYA Production right from the start, a welcoming staff which made me a novice comfortable. It’s been an overall learning experience from different aspects of pre-production to post-production. A well coordinated staff that is more than willing to answer queries. We had been asked to work on short film where I got to see the different techniques of camera handling and also editing how editor works for a particular project. These activities gave me clear idea in how a production house works and how the work is distributed. The expose to the feature film editing was quite fascinating. The hands on experience of producing a short film is been memorable.</em></p><p style="text-align: right;">- Anirudha Subramanya, Manipal Institute of Communication, Manipal.</p></div>
						</div>
						<div class="set" data-category="healthcare">
							<div><p>Healthcare communications challenges our technical skills as well as our emotional quotient. Working with the medical fraternity for over 15 years has given us an edge in understanding the communication requirements of the healthcare industry.</p><p>From creating films for hospital marketing and sales to highly specialized surgical tutorials, we have grasped the learning curve. Filming in the OTs, working in sensitive situations and translating complex medical information into simple, effective communications is our strength.</p><p>Our work for a renowned health museum stands apart, while our patient stories, motivational films for clinicians and nurses, patient education series and other innovations have been appreciated.</p></div>
						</div>
						<div class="set" data-category="documentaries">
							<div><p>The themes we have explored are diverse – documenting 75 years of Kannada Cinema to experiencing the travails of our war widows, to analyzing the phenomena called Rajkumar, this is a genre we love.</p></div>
						</div>
						<div class="set" data-category="academics">
							<div><p>We offer internships to students of mass communication, because we simply believe that the best training ground for every student is on the job! Students not only learn through observation … but also work together with Team MAYA... gaining an insight into the creative, technical and business aspects of video film making.</p></div>
						</div>
						<div class="set" data-category="music-video">
							<div><p>We believe in the power of music to cross the barriers of communication.</p><p>From social issues to biopics to promoting Karnataka for global investors, MAYA has used the music video format to effectively communicate.</p></div>
						</div>
						<div class="set" data-category="commercials">
							<div><p>We have created simple television commercials for promoting the State government and have the experience of working with celebrities like Puneet Rajkumar and Sudeep.</p></div>
						</div>
						<div class="set" data-category="kathachitra">
							<div><p>There’s a story behind every event in our lives – be it a wedding, birthday, anniversaries, etc.</p><p>We, the storytellers visualize this and create for you a special “KATHACHITRA”</p></div>
						</div>
						<div class="set" data-category="offbeat">
							<div><p>Films for Book launches, short films and any video experiments qualify for being offbeat work !!</p></div>
						</div>
						<div class="set" data-category="social-responsibility">
							<div><p>Meaningful and sensible communications is what we can give back to society – be it for a cause or for provoking our senses towards burning issues.</p><p>Our annual Independence Day ritual of creating a video for the Indian National Anthem is our way of expressing our “Indianess”, while “Eye for an Eye” promotes eye donation.</p><p>We can associate with causes and partner your efforts.</p></div>
						</div>
						<div class="set" data-category="arts">
							<div><p>We have documented popular and near extinct art forms. What a learning this has been !!</p></div>
						</div>
						<div class="set" data-category="biopics">
							<div><p>These are stories of inspiring people, meant to inspire viewers.</p></div>
						</div>
						<div class="set" data-category="teleseries">
							<div><p>24 episodes of a weekly health programme for regional channels has given us the experience of creating meaningful content in challenging timelines, and an insight into the dynamics of television viewership and TRPs.</p></div>
						</div>
					</div>
				</div>
				<script>
					(function() {
						$('#categories-content .set[data-category="corporate"]').css({display: 'block'});
					})();
				</script>-->
			</div>
		</section>
	</div>
	
</div>
<?php require 'footer.php'; ?>
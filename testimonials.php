<?php define('__PAGE__', 'testimonials'); ?>

<?php
	$playlistID = array();
	$playlistID['testimonials'] = 'PLbUh9sjiMWsVYHf7S5GsfH8dSc0RxCCPq';
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
			<div class="clearfix slider-pane magnific-popup-testimonials">
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

	<div class="container testimonials">
		<section class="testimonials-video padded-top">
			<h1 class="text-center">A BOND OF EXCELLENCE WITH OUR CLIENTS</h1>
			<?php generateSlider($playlistID, 'testimonials'); ?>
			<script>
				(function() {
					$('.magnific-popup-testimonials .magnific-popup-image').magnificPopup({
						type:'iframe',
						gallery: {
							enabled: true
						}
					});
				})();
			</script>
		</section>
		<section class="testimonials-authors padded-bottom">
			<div class="text-center testimonials-quote"><span class="fa fa-quote-left" aria-hidden="true"></span></div>
			<article class="text-center">
				<p>&ldquo;We appreciate your dedicated effort and contribution in the successful execution of a Corporate film for PI India..&rdquo;<br />
				<b>Dan Tidwell, President, TYCO Healthcare, USA</b></p>
			</article>
			<article class="text-center">
				<p>&ldquo;The contents were brought out in a logical sequence. The doctor and the patient experience were captured very well. The audio and video were of good quality. The filling procedure was appreciated for its detail and video quality.<br />
				Not a single CD has reported any hitch while being run by any of our team members or by any doctor.&rdquo;<br />
				<b>VIKAS BEDI, Marketing Manager-Medication Delivery Group, Baxter India</b></p>
			</article>
			<article class="text-center">
				<p>&ldquo;I thank you and your entire team for the fabulous production of &lsquo;The High Performance Entrepreneur&rsquo;. I have seldom seen the kind of cerebral capacity, affection for the theme and willingness to learn as I have found in all of you...&rdquo;<br />
				<b>Subroto Bagchi, COO-MindTree Ltd.</b></p>
			</article>
			<article class="text-center">
				<p>&ldquo;Maya introduced us to the usefulness of seeking professional help for our scientific and social communications...&ldquo;<br />
				<b>Dr.Vivek Jawali,   Chief Cardiovascular &amp; Thoracic Surgeon &amp; Director,  Fortis Hospitals.</b></p>
			</article>
			<article class="text-center">
				<p>&ldquo;Your work was very good from briefing to final stage. You did a great shooting with very nice shots...&rdquo;<br />
				<b>Stefan Gissels, Vice-President, Janssen Pharmaceutica, Belgium</b></p>
			</article>
			<article class="text-center">
				<p>&ldquo;Maya Chandra demonstrated a high level of commitment towards meeting our delivery schedules and a good attitude in having an interactive and positive dialogue during the entire contract...&rdquo;<br />
				<b>Damodhar Padhi, General Manager-India Engineering Operations, GE India</b></p>
			</article>
			<article class="text-center">
				<p>&ldquo;Maya has the ability to understand the client&rsquo;s objectives and designs the communication package accordingly...&rdquo;<br />
				<b>Vivek Kulkarni - Ex-Secretary, Department of IT &amp; BT, Government of Karnataka</b></p>
			</article>
		</section>
	</div>
	
</div>
<?php require 'footer.php'; ?>
@extends('template')

@section('content')

<div class="index">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="index-text">
					Hello, I'm Atwood
					<p class="rotate">
						I<span class="u">_</span>am<span class="u">_</span>an<span class="u">_</span>audio<span class="u">_</span>engineer.,
						I<span class="u">_</span>am<span class="u">_</span>a<span class="u">_</span>musician.,
						I<span class="u">_</span>am<span class="u">_</span>a<span class="u">_</span>songwriter.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Services</h1>

				<hr>
			</div>
		</div>

		<div class="row text-center">
			<div class="col-sm-3 item">
				<img src="/assets/img/amps@2x.jpg" alt="Live Sound" class="img-responsive">
				<h3>Live Sound</h3>
				<p>
					Crystal clear sound mixed to perfection through state-of-the-art equipment. 
					Complimentary live recordings for all events included.
				</p>
			</div>
			<div class="col-sm-3 item">
				<img src="/assets/img/software@2x.jpg" alt="Recording" class="img-responsive">
				<h3>Recording</h3>
				<p>
					Studio quality recordings for both solo artists and bands that comes
					with a passionate audio engineer, high quality hardware, and cutting-edge software.
				</p>
			</div>
			<div class="col-sm-3 item">
				<img src="/assets/img/mixer@2x.jpg" alt="Mixing" class="img-responsive">
				<h3>Mixing</h3>
				<p>
					Mixing tracks down to impeccable levels that are then mastered
					for an overall ideal sound.
				</p>
			</div>
			<div class="col-sm-3 item">
				<img src="/assets/img/mic@2x.jpg" alt="Composing" class="img-responsive">
				<h3>Composing</h3>
				<p>
					Work side by side with a music theory trained musician and songwriter
					to create original pieces to match any desired style.
				</p>
			</div>
		</div>
	</div>
</div>


<?php
$client_id = '72bc8d43a1064d979b358990d30280a6';
$id = 1282264532;
$link = 'https://api.instagram.com/v1/users/%s/media/recent/?client_id=%s&count=%s&max_id=%s&min_id=%s&max_timestamp=%s&min_timestamp=%s';
$url = sprintf($link, $id, $client_id, null, null, null, null, null);


$headers = array('Accept' => 'application/json');
$request = Requests::get($url, $headers);
$body = json_decode($request->body);

if ($body->meta->code == 200): ?>
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Latest Photos</h1>

					<hr>
				</div>
			</div>
			<div class="row">
			<?php
				$data = $body->data;

				for ($i = 0; $i < 4; $i++) {
					if (!isset($data[$i])) break;

					// Get the image
					$image = $data[$i]->images->standard_resolution->url;

					// Get the permalink
					$link = $data[$i]->link;

					// Get the tags
					$tags = implode(' #', $data[$i]->tags);
					if ($tags != '') $tags = '#'.$tags;

					// Get the title/caption
					$title = $data[$i]->caption->text;
					$title = preg_replace('/#([^#]+)[\s,;]*/', '', $title);
					// If we have no title/caption, let's have a default one.
					if ($title == '') $title = 'AtwoodMurraySound on Instagram';

					// Now let's put it on the page
					echo '<div class="col-sm-3 text-center instapost"><a href="'.$link.'">';
					echo '<img src="'.$image.'" class="img-responsive"></a>';
					echo '<div class="description">'.$title.' '.$tags.'</div></div>';
				}
			?>
			</div>

		</div>
	</div>
<?php endif; ?>

<div class="section last">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Contact</h1>

				<hr>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-2 col-sm-4">
				<a href="https://www.facebook.com/atwoodmurraysound">
					<div class="facebook">
						<i class="fa fa-facebook"></i>
					</div>
				</a>
			</div>
			<div class="col-md-2 col-sm-4">
				<a href="https://www.linkedin.com/pub/kelly-atwood-murray/89/418/98b">
					<div class="linkedin">
						<i class="fa fa-linkedin"></i>
					</div>
				</a>
			</div>
			<div class="col-md-2 col-sm-4">
				<a href="https://twitter.com/AtwoodMurrayLS">
					<div class="twitter">
						<i class="fa fa-twitter"></i>
					</div>
				</a>
			</div>
			<div class="col-md-2 col-sm-4">
				<a href="http://instagram.com/atwoodmurraysound#">
					<div class="instagram">
						<i class="fa fa-instagram"></i>
					</div>
				</a>
			</div>
			<div class="col-md-2 col-sm-4">
				<a href="mailto:contact@atwoodmurray.com">
					<div class="email">
						<i class="fa fa-envelope-o"></i>
					</div>
				</a>
			</div>
			<div class="col-md-2 col-sm-4">
				<a href="http://blog.atwoodmurray.com/">
					<div class="blog">
						<i class="fa fa-rss"></i>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="desk">
	<div class="cover">
		<div class="center">
			<a href="/equipment">
				<div class="button">
					List of Equipment
				</div>
			</a>
		</div>
	</div>
</div>

@stop

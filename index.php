<?php 
/**
 * Name: API Codes CPanel
 * Version: 1.1, Last updated: 10/01/2017
 * Website: https://apicodes.com
 * Contact: Support@apicodes.com
 */ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>CPanel - API Codes</title>
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" />
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/tether.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/apicodes.min.js"></script>
</head>
<body>
	<div class="container">
			<div class="jumbotron mt-3">
		        <h1 class="display-4">API Codes CPanel</h1>
		        <p class="lead">Help you encode URL to protect your real URL and support multiple subtitles. You can use url or iframe after encoding into your website easily and quickly.</p>
		     </div>
		<form id="action-form" action="action.php" method="POST" accept-charset="utf-8">
			<div class="form-group">
				<label class="font-weight-bold">URL:</label>
				<input type="text" name="link" class="form-control" placeholder="Ex: https://www.ok.ru/video/544357747200" onclick="this.select()" required>
			</div>

			<div class="row">

				<div class="col-md-11" id="sub">
					<div id="sub-block">
						<div class="row">
						    <div class="col-md-7">
						        <div class="form-group">
						        	<label class="font-weight-bold">Subtitle</label>
						        	<input type="text" class="form-control" name="sub[0]" placeholder="Ex: https://demo.apicodes.com/sub.srt (optional)" onclick="this.select()"> 
						        </div>
						    </div>
						    
						    <div class="col-md-4">
						        <div class="form-group">
						        	<label class="font-weight-bold">Label</label>
						        	<input type="text" class="form-control" name="label[0]" placeholder="Ex: English (optional)" onclick="this.select()"> 
						        </div>
						    </div>
						    
						    <div class="col-md-1" style="margin-top: 30px">
						        <div class="form-group">
						        	<button type="button" id="remove_sub" class="btn btn-danger" disabled><i class="fa fa-trash"></i></button> 
						    	</div>
						    </div>
						</div>
					</div>
				</div>

			    <div class="col-md-1" style="margin-top: 30px">
			    	<button type="button" id="add_new_sub" data-total="1" class="btn btn-success btn-block"><i class="fa fa-plus"></i></button>
				</div>

			</div>

			<div class="form-group">
				<label class="font-weight-bold">Poster</label>
				<input type="text" name="poster" class="form-control" placeholder="Ex: https://demo.apicodes.com/poster.jpg (optional)" onclick="this.select()">
			</div>

			<div class="form-group">
				<button type="submit" id="action-submit" class="btn btn-lg btn-primary btn-block"> <span id="fa-loading"><i class="fa fa-arrow-circle-right"></i></span> Generate</button>
			</div>
		</form>
		
		<div class="form-group">
			<label class="font-weight-bold">URL Encoding</label>
			<input type="text" id="url-encode" class="form-control" placeholder="URL after encoding will display here..." onclick="this.select()">
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Iframe Encoding</label>
			<textarea rows="5" class="form-control" id="iframe-encode" placeholder="URL with iframe after encoding will display here..." onclick="this.select()"></textarea>
		</div>
		<?php 
			$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
			$actual_link = str_replace('index.php', '', $actual_link);
		?>
		<script type="text/javascript">
			jQuery(function ($) {
				$('#action-form').submit(function(e) {
					e.preventDefault();
					$('#action-submit').prop('disabled', !0);
					$('#fa-loading').html('<i class="fa fa-spinner fa-spin"></i>');
		       		var b = $(this).serializeArray(), c = $(this).attr('action');
					$.ajax({
				        type: 'POST',
				        dataType: 'text',
				        url: c,
				        data: b,
						error: function (result) {
							alert("Something went wrong. Please try again!");
							$('#fa-loading').html('<i class="fa fa-arrow-circle-right"></i>');
							$('#action-submit').removeAttr('disabled');
						},
						success: function (result) {
							$('#url-encode').val('<?php echo $actual_link . 'embed.php?data=' ?>'+result+'');
							$('#iframe-encode').html('<iframe src="<?php echo $actual_link . 'embed.php?data=' ?>'+result+'" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>');
							$('#fa-loading').html('<i class="fa fa-arrow-circle-right"></i>');
							$('#action-submit').removeAttr('disabled');
						}
					});
				});
			});
		</script>

		<hr>
		<footer class="footer">
			<p class="text-center">Copyright © 2017 <a href="https://apicodes.com/" title="APICODES.COM" target="-blank">APICODES.COM</a> - All Rights Reserved.</p>
		</footer>
	</div><!-- /.container -->
</body>
</html>
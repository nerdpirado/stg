<?php session_start(); ?>
<?php 
/**
 * Name: OK.RU Player Script
 * Version: 1.3, Last updated: November 14, 2017
 * Website: https://apicodes.com
 * Contact: Support@apicodes.com
 */ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>OK.RU Video Player - APICodes</title>
	<meta name="robots" content="noindex">
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<style type="text/css" media="screen">html,body{padding:0;margin:0;height:100%}#apicodes-player{width:100%!important;height:100%!important;overflow:hidden;background-color:#000}.jw-menu,.jw-time-tip{padding:.5em!important}</style>
</head>
<body>

<?php 
		error_reporting(0);
		
		$data = (isset($_GET['data'])) ? $_GET['data'] : '';

		if ($data != '') {
			
			include_once 'config.php';

			$data = json_decode(decode($data));

			$link = (isset($data->link)) ? $data->link : '';

			$sub = (isset($data->sub)) ? $data->sub : '';

			$poster = (isset($data->poster)) ? $data->poster : '';

			$tracks = '';
			
			foreach ($sub as $key => $value) {
			    $tracks .= '{ 
						        file: "'.$value.'", 
						        label: "'.$key.'",
						        kind: "captions"
							   },';
			}

			preg_match('/video\/([0-9]{12})/', $link, $matchID);

			$session_name = session_id() . $matchID[1];

			$embed = 'https://www.ok.ru/videoembed/' . $matchID[1];

			$domainServer = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);

			$enLink = $domainServer . '/stream/?data=' . encode($embed);

			if(!isset($_SESSION[$session_name])) 
			{
				include_once 'curl.php';

				$curl = new cURL();
			
				$getSource = $curl->get($embed);

				preg_match('/data-options="(.*?)"\s*data-player-container-id/', $getSource, $matchDash);

				$replaceUnicode = str_replace(array('\&quot;', 'u003C', 'u003E', '\\u0026', '&amp;', '\n', '\\'), array('"','<', '>', '&', '&', '', ''), $matchDash[1]);

				preg_match_all('/<BaseURL>(.*?)<\/BaseURL>/', $replaceUnicode, $matchURL);

				$s = [];

				foreach ($matchURL[1] as $key => $value) {
					switch ($key) {
						case '0':
								$s[] = [
									'type' 	=> 'video/mp4',
									'label'	=> '144p',
									'file'	=> $value,
									'itag'	=> "144"
								];
							break;
						
						case '1':
								$s[] = [
									'type' 	=> 'video/mp4',
									'label'	=> '240p',
									'file'	=> $value,
									'itag'	=> "240"
								];
							break;

						case '2':
								$s[] = [
									'default' => 'true',
									'type' 	=> 'video/mp4',
									'label'	=> '360p',
									'file'	=> $value,
									'itag'	=> "360"
								];
							break;

						case '3':
								$s[] = [
									'type' 	=> 'video/mp4',
									'label'	=> '480p',
									'file'	=> $value,
									'itag'	=> "480"
								];
							break;

						case '4':
								$s[] = [
									'type' 	=> 'video/mp4',
									'label'	=> '720p',
									'file'	=> $value,
									'itag'	=> "720"
								];
							break;

						case '5':
								$s[] = [
									'type' 	=> 'video/mp4',
									'label'	=> '1080p',
									'file'	=> $value,
									'itag'	=> "1080"
								];
							break;

					}
				}

				$s = json_encode($s);
				
				$s = json_decode($s);
				
				usort($s, function($a, $b) { //Sort the array using a user defined function
					return $a->itag > $b->itag ? -1 : 1; //Compare the scores
				});

				$sources = json_encode($s);

				$checkSource = preg_match('/\[\]/', $sources, $match);
				
				if($checkSource) {
					$sources = '[{"label":"undefined","type":"video\/mp4","file":"undefined"}]';
				}

				$_SESSION[$session_name] = $sources;

				$result = '<script type="text/javascript" src="assets/jwplayer/jwplayer.js"></script>
							<script type="text/javascript">jwplayer.key="w51hNXyL+ilJTlNDYNetRp9M/zfZCk/MH1sYlg==";</script>
							<div id="apicodes-player"></div>';

				$data = 'var player = jwplayer("apicodes-player");
						player.setup({
							sources: '.$sources.',
							aspectratio: "16:9",
							startparam: "start",
							primary: "html5",
							preload: "auto",
							image: "'.$poster.'",
						    captions: {
						        color: "#f3f368",
						        fontSize: 16,
						        backgroundOpacity: 0,
						        fontfamily: "Helvetica",
						        edgeStyle: "raised"
						    },
						    tracks: ['.$tracks.']
						});
						player.on("error" , function(){
							$("#apicodes-player").html("<iframe src=\"'.$enLink.'\" width=\"100%\" height=\"100%\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe>")
						});';
				$packer = new Packer($data, 'Normal', true, false, true);

				$packed = $packer->pack();

				$result .= '<script type="text/javascript">' . $packed . '</script>';
			} 
			else 
			{
				$result = '<script type="text/javascript" src="assets/jwplayer/jwplayer.js"></script>
						<script type="text/javascript">jwplayer.key="w51hNXyL+ilJTlNDYNetRp9M/zfZCk/MH1sYlg==";</script>
						<div id="apicodes-player"></div>';

				$data = 'var player = jwplayer("apicodes-player");
						player.setup({
							sources: '.$_SESSION[$session_name].',
							aspectratio: "16:9",
							startparam: "start",
							primary: "html5",
							preload: "auto",
							image: "'.$poster.'",
						    captions: {
						        color: "#f3f368",
						        fontSize: 16,
						        backgroundOpacity: 0,
						        fontfamily: "Helvetica",
						        edgeStyle: "raised"
						    },
						    tracks: ['.$tracks.']
						});
						player.on("error" , function(){
							$("#apicodes-player").html("<iframe src=\"'.$enLink.'\" width=\"100%\" height=\"100%\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe>")
						});';
				$packer = new Packer($data, 'Normal', true, false, true);

				$packed = $packer->pack();

				$result .= '<script type="text/javascript">' . $packed . '</script>';
			}

			echo $result;

		} else echo 'Empty link!';

?>

</body>
</html>

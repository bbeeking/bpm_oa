<?php  $bucket = 'BUCKET'; $accessKeyId = 'ACCESS_KEY_ID'; $secret = 'SECRET_ACCESS_KEY'; if (!function_exists('hash_hmac')) : function hash_hmac($algo, $data, $key, $raw_output = false) { $blocksize = 64; if (strlen($key) > $blocksize) $key = pack('H*', $algo($key)); $key = str_pad($key, $blocksize, chr(0x00)); $ipad = str_repeat(chr(0x36), $blocksize); $opad = str_repeat(chr(0x5c), $blocksize); $hmac = pack('H*', $algo(($key^$opad) . pack('H*', $algo(($key^$ipad) . $data)))); return $raw_output ? $hmac : bin2hex($hmac); } endif; $policy = base64_encode(json_encode(array( 'expiration' => date('Y-m-d\TH:i:s.000\Z', strtotime('+1 day')), 'conditions' => array( array('bucket' => $bucket), array('acl' => 'public-read'), array('starts-with', '$key', ''), array('starts-with', '$Content-Type', 'image/'), array('success_action_status' => '201'), array('starts-with', '$name', ''), array('starts-with', '$Filename', ''), ) ))); $signature = base64_encode(hash_hmac('sha1', $policy, $secret, true)); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Plupload to Amazon S3 Example</title>

<style type="text/css">
	body {
		font-family:Verdana, Geneva, sans-serif;
		font-size:13px;
		color:#333;
		background:url(../bg.jpg);
	}
</style>

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>

<!-- Load plupload and all it's runtimes and finally the UI widget -->
<link rel="stylesheet" href="../../js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />

<script type="text/javascript" src="../../js/plupload.js"></script>
<script type="text/javascript" src="../../js/plupload.gears.js"></script>
<script type="text/javascript" src="../../js/plupload.silverlight.js"></script>
<script type="text/javascript" src="../../js/plupload.flash.js"></script>
<script type="text/javascript" src="../../js/plupload.browserplus.js"></script>
<script type="text/javascript" src="../../js/plupload.html4.js"></script>
<script type="text/javascript" src="../../js/plupload.html5.js"></script>
<script type="text/javascript" src="../../js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
<!--<script type="text/javascript" src="http://getfirebug.com/releases/lite/1.2/firebug-lite-compressed.js"></script>-->

</head>
<body>

<h1>Plupload to Amazon S3 Example</h1>

<div id="uploader">
    <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
</div>

<script type="text/javascript">
// Convert divs to queue widgets when the DOM is ready
$(function() {
	$("#uploader").plupload({
		runtimes : 'flash,silverlight',
		url : 'http://<?php echo $bucket; ?>.s3.amazonaws.com/',
		max_file_size : '10mb',
		
		multipart: true,
		multipart_params: {
			'key': '${filename}', // use filename as a key
			'Filename': '${filename}', // adding this to keep consistency across the runtimes
			'acl': 'public-read',
			'Content-Type': 'image/jpeg',
			'success_action_status': '201',
			'AWSAccessKeyId' : '<?php echo $accessKeyId; ?>',		
			'policy': '<?php echo $policy; ?>',
			'signature': '<?php echo $signature; ?>'
		},
		
		// !!!Important!!! 
		// this is not recommended with S3, since it will force Flash runtime into the mode, with no progress indication
		//resize : {width : 800, height : 600, quality : 60},  // Resize images on clientside, if possible 
		
		// optional, but better be specified directly
		file_data_name: 'file',
		
		// re-use widget (not related to S3, but to Plupload UI Widget)
		multiple_queues: true,

		// Specify what files to browse for
		filters : [
			{title : "JPEG files", extensions : "jpg"}
		],

		// Flash settings
		flash_swf_url : '../../js/plupload.flash.swf',

		// Silverlight settings
		silverlight_xap_url : '../../js/plupload.silverlight.xap'
	});
});
</script>

</body>
</html>
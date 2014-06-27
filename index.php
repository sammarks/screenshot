<?php

// From: http://stackoverflow.com/questions/2280394/how-can-i-check-if-a-url-exists-via-php/12628971#12628971
function url_exists($url)
{
	if (!$fp = curl_init($url)) return false;
	return true;
}

define('USERID', '14018873');

$filename = trim($_SERVER['REQUEST_URI'], '/');
$file_url = 'http://dl.dropboxusercontent.com/u/' . USERID . '/Screenshots/' . $filename;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Viewing Screenshot</title>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
	</head>
	<body>
		<a href="http://sammarks.me/" target="_blank" class="icon-logo branding"></a>

		<?php if (url_exists($file_url)): ?>
			<h1><?= htmlspecialchars($filename) ?></h1>
			<p>...</p>
			<img src="<?= $file_url ?>" alt="<?= htmlspecialchars($filename) ?>" class="hidden" />
		<?php else: ?>
			<h1>Not Found</h1>
			<p>Oops, that image doesn't exist!</p>
		<?php endif; ?>

		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>

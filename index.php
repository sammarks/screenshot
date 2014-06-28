<?php

function url_exists($url)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_exec($ch);
	$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	return ($retcode == 200);
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

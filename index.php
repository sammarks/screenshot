<?php

function url_exists($url)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
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
		<title><?= htmlspecialchars($filename) ?></title>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<meta property="og:site_name" content="Samuel Marks - Screenshots" />
		<meta property="og:image" content="<?= $file_url ?>" />
		<meta property="og:title" content="<?= htmlspecialchars($filename) ?>" />
		<meta property="og:url" content="<?= $_REQUEST['SERVER_URL'] ?>" />
		<meta name="twitter:image" value="<?= $file_url ?>" />
		<meta name="twitter:card" value="photo" />
		<meta name="twitter:site" value="@sammarks15" />
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

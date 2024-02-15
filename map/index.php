<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/assets/style/index.css" type="text/css">
        <link rel="stylesheet" href="index.css" type="text/css">
		
		<?php
			$itemId = $_GET['id'];
			if (!isset($itemId) || !file_exists("../assets/img/map/$itemId")){
				header('Location: ..');
				die();
			}

			$name;
			if (file_exists("../data/pieces/$itemId.json")) $name = json_decode(file_get_contents("../data/pieces/$itemId.json")) -> data -> name;
			if (file_exists("../data/materials/$itemId.json")) $name = json_decode(file_get_contents("../data/materials/$itemId.json")) -> data -> name;
			if (isset($name)) echo "<title>$name</title><meta content=\"$name\" property=\"og:title\">";
			

			echo "<meta content=\"http://giteapot.unaux.com/image.php?id=$itemId\" name=\"twitter:image\">";
		?>
    </head>
    <body>
        <noscript>This page relies on JavaScript to run. Please enable JavaScript before using this.</noscript>
        <a href=".."><img id="home" src="/assets/img/home.png"></a>
		<?php
			if (isset($name)) echo "<h2>$name</h2>";
			
			echo "<div id=\"maps\">";
			
			$maps = scandir("../assets/img/map/$itemId");
			foreach ($maps as $map){
				if ($map === '.' || $map === '..') continue;
				echo "<img class=\"map\" src=\"/assets/img/map/$itemId/$map\">";
			}
			
			echo "</div>";
		?>
    </body>
</html>
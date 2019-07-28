<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
<base href="."/>
  <title>WJDS</title>
  <meta name="description" content="Link shorter">
  <meta name="author" content="Marcin Malinowski">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="css/styles.css">

</head>

<body>
	<div class="wrapper flex-vert-center" id="main">
		<h1>WYSOKOORBITALNE JONOWE DZIAŁO SKRACAJĄCE</h1>
	
	<form action="addlink" class="flex-vert-center" method=post>
		Wklej link kumplu
		<br/>
		<input type="text" name="link">
		<br/>
		A zostanie on skrócony
		<br/>

		<?php if(isset($hash))echo $hash; ?>
		<br/>
		<input type="submit" value="URUCHOMIĆ DZIAŁO">
	</form>
	</div>
</body>
</html>
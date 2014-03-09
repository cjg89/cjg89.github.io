<?php
$content = json_decode(file_get_contents('content/content.json', true));

$info = $content->info;
$projects = $content->projects;
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?=$info->site_titletag?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/fontawesome/font.css" />
		<link rel="stylesheet" type="text/css" href="fonts/nexa-slab-bold/font.css" />
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<header>
			<h1><?=$info->title?></h1>
			<p class="subtitle"><?=$info->subtitle?></p>
			<!--<img id="self-photo" src="<?=$info->self_photo?>" alt="<?=$info->title?>" title="<?=$info->title?>" />-->
			<nav>
				<ul>
				<?php 
				foreach($info->contact as $key => $val) {
				?>
					<li class="<?=$key?>">
						<a href="<?=$val->url?>" target="_blank" title="<?=$val->alt_text?>">
							<span><?=$val->name?></span>
						</a>
					</li>
				<?php	
				}
				?>
				</ul>
			</nav>
			<div class="description"><?=$info->description?></div>
		</header>
		<main>
			<ul id="projects">
			<?php
			foreach($projects as $key => $project) {
			?>
				<li>
					<a href="<?=$project->url?>" target="_blank">
						<div class="photo-wrap" style="background-image: url('<?=$project->photo?>')">
							<img src="<?=$project->photo?>" alt="<?=$project->name?>" title="<?=$project->name?>" />
						</div>
						<h2><?=$project->name?></h2>
						<ul class="technologies">
						<?php
						foreach ($project->technology as $tech) {
						?>
							<li><?=$tech?></li>
						<?php
						}
						?>	
						</ul>
					</a>
				</li>
			<?php
			}
			?>
			</ul>
		</main>
	</body>
</html>
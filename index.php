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
		<link rel="stylesheet" type="text/css" href="fonts/tex-gyre-schola-italic/font.css" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Varela" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<header>
			<h1><?=$info->title?></h1>
			<p class="subtitle"><?=$info->subtitle?></p>
			<!--<img id="self-photo" src="<?=$info->self_photo?>" alt="<?=$info->title?>" title="<?=$info->title?>" />-->
			<nav>
				<ul class="contact-links">
				<?php 
				foreach($info->contact as $key => $val) {
				?>
					<li class="<?=$key?>">
						<a href="<?=$val->url?>" target="_blank">
							<i class="<?=$val->icon_class?>"></i><?=$val->alt_text?>
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
		<?php
		foreach($projects as $key => $project) {
		?>
			<section class="project">
				<div class="screenshot" style="background-color: <?=$project->color_bg?>;">
					<a href="<?=$project->url?>" target="_blank">
						<img src="<?=$project->photo?>" alt="<?=$project->name?>" title="<?=$project->name?>" />
						<span class="animated" style="background-color: <?=$project->color_bg?>;<?php if ($project->color_btntext) { print ' color: '.$project->color_btntext.';'; } ?>">View Website</span>
					</a>
				</div>
				<div class="inner">
					<h2><a href="<?=$project->url?>"><?=$project->name?></a></h2>
					<p class="description"><?=$project->desc?></p>
					<div class="about"><?=$project->about?></div>
					<div class="details">
						<h3>Skills Contributed:</h3>
						<ul>
						<?php
						foreach ($project->technology as $skill) {
						?>
							<li><?=$skill?></li>
						<?php
						}
						?>	
						</ul>
					</div>
				</div>
			</section>
		<?php
		}
		?>
		</main>
		<footer>
			<p>
				<?=$info->site_titletag?><br/>
				<small>Built with love and <a target="_blank" href="http://validator.w3.org/check?uri=referer">valid markup</a></small>
			</p>
			<ul class="contact-links">
				<?php 
				foreach($info->contact as $key => $val) {
				?>
					<li class="<?=$key?>">
						<a href="<?=$val->url?>" target="_blank">
							<i class="<?=$val->icon_class?>"></i><?=$val->alt_text?>
						</a>
					</li>
				<?php	
				}
				?>
				</ul>
		</footer>
	</body>
</html>
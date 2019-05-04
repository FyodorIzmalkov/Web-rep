<!DOCTYPE>
<html>
	<head></head>
	<body>
		<?php foreach ($newsList as $newsItem):?>
		<div>
			<h2><?php echo $newsItem['title'];?></h2>
			<p><?php echo $newsItem['content'];?></p>
		</div>
		<?php endforeach;?>
	</body>
</html>
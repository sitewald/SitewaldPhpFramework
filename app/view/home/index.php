

<h2>index view: <?php echo $this->viewData['hello']; ?></h2>

<h3>version: <?php echo $this->sitewald_version; ?> </h3>

<h4><?php echo Lib::SITEWALD_TEXT; ?></h4>

<a href="<?php $this->printRoute('home', 'index'); ?>">
	<img src="<?php echo $this->baseUrl; ?>websource/img/fern-leaf.png" />
</a>
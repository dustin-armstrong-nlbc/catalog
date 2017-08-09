<?php include_once('snippets/header.php') ?>

<h2>
	<i class="fa fa-question-circle" aria-hidden="true"></i><?php echo $lang['HELP_TITLE']; ?>
</h2>

<div id="item-list" class="help">

	<ul class="help">
		<li><a href="#molyapi"><?php echo $lang['HELP_MOLY_TITLE']; ?></a></li>
		<li><a href="#upgrade"><?php echo $lang['HELP_UPGRADE_TITLE']; ?></a></li>
		<li><a href="#search"><?php echo $lang['HELP_SEARCH_TITLE']; ?></a></li>
		<li><a href="#translate"><?php echo $lang['HELP_TRANSLATE_TITLE']; ?></a></li>
		<li><a href="#contribute"><?php echo $lang['HELP_CONTRIBUTE_TITLE']; ?></a></li>
		<li><a href="#donate"><?php echo $lang['HELP_DONATE_TITLE']; ?></a></li>
	</ul>

	<h3>
		<a name="molyapi"></a><?php echo $lang['HELP_MOLY_TITLE']; ?></h3>
<?php echo $lang['HELP_MOLY_API_INSTRUCTIONS']; ?>

<h3>
		<a name="upgrade"></a><?php echo $lang['HELP_UPGRADE_TITLE']; ?></h3>
<?php echo $lang['HELP_UPGRADE_CONTENT']; ?>

<h3>
		<a name="search"></a><?php echo $lang['HELP_SEARCH_TITLE']; ?></h3>
<?php echo $lang['HELP_SEARCH_CONTENT']; ?>

<h3>
		<a name="translate"></a><?php echo $lang['HELP_TRANSLATE_TITLE']; ?></h3>
<?php echo $lang['HELP_TRANSLATE_CONTENT']; ?>

<h3>
		<a name="contribute"></a><?php echo $lang['HELP_CONTRIBUTE_TITLE']; ?></h3>
<?php echo $lang['HELP_CONTRIBUTE_CONTENT']; ?>

<h3>
		<a name="donate"></a><?php echo $lang['HELP_DONATE_TITLE']; ?></h3>
<?php echo $lang['HELP_DONATE_CONTENT']; ?>
<div id="paypal-donate">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post"
			target="_top">
			<input type="hidden" name="cmd" value="_s-xclick"> <input
				type="hidden" name="encrypted"
				value="-----BEGIN PKCS7-----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-----END PKCS7-----
	"> <input type="image"
				src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"
				border="0" name="submit"
				alt="PayPal - The safer, easier way to pay online!"> <img alt=""
				border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif"
				width="1" height="1">
		</form>
	</div>
<?php echo $lang['HELP_CATALOG_CREDITS']; ?>

    <div class="clear"></div>

</div>

<?php include_once('snippets/footer.php') ?>
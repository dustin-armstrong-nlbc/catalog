<?php include_once('snippets/header.php') ?>

<h2>
	<i class="fa fa-search" aria-hidden="true"></i><?php echo $lang['FIND_MOLY_TITLE']; ?>
</h2>

<div id="item-list">
<?php
if (! isset($molyapi)) {
    echo $lang['FIND_MOLY_API_INSTRUCTIONS'];
} else {
    echo $lang['FIND_MOLY_SEARCH_INSTRUCTIONS'];
    ?>

	<form method="post" action="import.php" class="isbn-search">
		<input type="text" name="isbn" class="isbn" /> <input type="submit"
			class="isbn-submit"
			value="<?php echo $lang['FIND_MOLY_SEARCHBUTTON']; ?>" />
	</form>
<?php } ?>

</div>

<?php include_once('snippets/footer.php') ?>
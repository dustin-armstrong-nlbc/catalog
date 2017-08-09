<?php include_once('snippets/header.php') ?>

<h2>
	<i class="fa fa-building" aria-hidden="true"></i><?php echo $lang['PUBLISHERS_TITLE']; ?>
</h2>

<div id="item-list">

<?php
$collection = $db->table('books');
$books = $collection->select('publisher')
    ->distinct()
    ->order('publisher ASC')
    ->all();

if ($books->count() != 1) {
    $wording = $lang['PUBLISHER_PLURAL'];
} else {
    $wording = $lang['PUBLISHER_SINGULAR'];
}

echo '<p>' . $lang['LIST_COUNT_PUBLISHER_PREFIX'] . $books->count() . ' ' . $wording . $lang['LIST_COUNT_SUFFIX'] . '</p>';
?>

    <ul id="genre-list">

<?php

foreach ($books as $book) {
    if ($book->publisher() == '') {} else {
        echo '<li class="publisher"><i class="fa fa-building" aria-hidden="true"></i> <a href="display?publisher=' . urlencode($book->publisher()) . '">' . $book->publisher() . '</a></li>';
    }
}

?>

                </ul>

	<div class="clear"></div>

</div>

<?php include_once('snippets/footer.php') ?>
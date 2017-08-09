<?php include_once('snippets/header.php') ?>

<h2>
	<i class="fa fa-tags" aria-hidden="true"></i><?php echo $lang['GENRES_TITLE']; ?>
</h2>

<div id="item-list">

<?php
$collection = $db->table('genres');
$books = $collection->select('genre')
    ->distinct()
    ->order('genre ASC')
    ->all();

if ($books->count() != 1) {
    $wording = $lang['GENRE_PLURAL'];
} else {
    $wording = $lang['GENRE_SINGULAR'];
}

echo '<p>' . $lang['LIST_COUNT_GENRE_PREFIX'] . $books->count() . ' ' . $wording . $lang['LIST_COUNT_SUFFIX'] . '</p>';
?>

    <ul id="genre-list">

<?php
foreach ($books as $book) {
    if ($book->genre() == '') {} else {
        echo '<li class="genre"><i class="fa fa-tag" aria-hidden="true"></i> <a href="display?genre=' . urlencode($book->genre()) . '">' . $book->genre() . '</a></li>';
    }
}

?>

                </ul>

	<div class="clear"></div>

</div>

<?php include_once('snippets/footer.php') ?>
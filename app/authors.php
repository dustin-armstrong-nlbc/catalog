<?php include_once ('snippets/header.php') ?>

<h2>
	<i class="fa fa-users" aria-hidden="true"></i><?php echo $lang['AUTHORS_TITLE']; ?>
</h2>

<div id="item-list">

<?php
$collection = $db->table('authors');
$books = $collection->select('author')
    ->distinct()
    ->order('author ASC')
    ->all();

if ($books->count() != 1) {
    $wording = $lang['AUTHOR_PLURAL'];
} else {
    $wording = $lang['AUTHOR_SINGULAR'];
}

echo '<p>' . $lang['LIST_COUNT_AUTHOR_PREFIX'] . $books->count() . ' ' . $wording . $lang['LIST_COUNT_SUFFIX'] . '</p>';
?>
    <ul id="author-list">
<?php
foreach ($books as $book) {
    if ($book->author() == '') {} else {
        echo '<li class="author"><i class="fa fa-user" aria-hidden="true"></i> <a href="display?author=' . urlencode($book->author()) . '">' . $book->author() . '</a></li>';
    }
}

?>

                </ul>

	<div class="clear"></div>

</div>

<?php include_once ('snippets/footer.php') ?>
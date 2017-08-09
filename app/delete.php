<?php include_once('snippets/header.php') ?>

<h2>
	<i class="fa fa-trash" aria-hidden="true"></i><?php echo $lang['DELETE_TITLE']; ?>
</h2>

<div id="item-list">

<?php
$collection = $db->table('books');

$url = $_SERVER['REQUEST_URI'];
$id = parse_url($url, PHP_URL_QUERY);
if (strpos($id, 'id=') !== FALSE) {
    $bookid = str_replace('id=', '', $id);
    
    $item = $collection->find($bookid);
    
    if (strpos($id, 'execute') !== FALSE) { // check if form was submitted
        
        $collection = $db->table('books');
        $author_collection = $db->table('authors');
        $genre_collection = $db->table('genres');
        
        if (($collection->where('id', '=', $bookid)->delete()) && ($author_collection->where('book_id', '=', $bookid)->delete()) && ($genre_collection->where('book_id', '=', $bookid)->delete())) {}
        
        echo '<p>' . $lang['DELETE_SUCCESS'] . '<a href="index">' . $lang['DELETE_REDIRECT'] . '</a>.</p>';
    } else {
        ?>
					<p><?php echo $lang['DELETE_WARNING']; ?></p>
	<ul class="delete">
		<li><strong><?php echo $item->title() ?></strong>
		<?php
        
        $author_collection = $db->table('authors');
        $authors = $author_collection->select('author')
            ->where('book_id', '=', $bookid)
            ->all();
        $y = $authors->count();
        if ($y != 0) {
            echo $lang['DELETE_AUTHOR_REF'];
        }
        $i = 1;
        foreach ($authors as $author) {
            echo '<strong>' . $author->author() . '</strong>';
            if ($i != $y) {
                echo ' & ';
            }
            $i ++;
        }
        ?></strong></li>
	</ul>
	<p><?php echo $lang['DELETE_CONFIRM']; ?></p>
	<a class="delete-button" href="delete?<?php echo $id; ?>+execute"><?php echo $lang['DELETE_DELETEBUTTON']; ?></a>
	<a class="cancel-button" href="display?<?php echo $id; ?>"><?php echo $lang['DELETE_CANCELBUTTON']; ?></a>
<?php } } ?>

					<div class="clear"></div>

</div>
<?php include_once('snippets/footer.php') ?>
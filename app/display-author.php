<?php
$author = str_replace('author=', '', $id);
$authorid = urldecode($author);
$collection = $db->table('authors');
$items = $collection->select('book_id', 'author')
    ->where('author', '=', $authorid)
    ->page(1, 10000);
?>

<h2>
	<i class="fa fa-user" aria-hidden="true"></i><?php echo $lang['DISPLAY_AUTHOR_TITLE'].$authorid.$lang['DISPLAY_AUTHOR_TITLE_SUFFIX'] ?></h2>

<?php
$pagination = $items->pagination();
if ($pagination->items() == '1') {
    $wording = $lang['BOOK_SINGULAR'];
} else {
    $wording = $lang['BOOK_PLURAL'];
}
echo ('<p>' . $lang['DISPLAY_AUTHOR_OWN'] . $pagination->items() . ' ' . $wording . $lang['DISPLAY_AUTHOR_AUTHORSHIP'] . $authorid . '.</p>');
?>

<div id="item-list">
	<table class="item-list-table">
        <?php include_once ('snippets/table-head.php');?>

        <tbody>
    
<?php
foreach ($items as $book) {
    $books = $db->table('books');
    $relevants = $books->select('*')
        ->where('id', '=', $book->book_id())
        ->all();
    foreach ($relevants as $relevant) {
        echo '<tr>';
        if ($relevant->islent() == 'on') {
            $lentstatus = '<a href="display?lent=' . urlencode($relevant->islent()) . '" title="' . $relevant->lentto() . ' ' . $relevant->lentat() . '"><i class="fa fa-check" aria-hidden="true"></i></a>';
        } else {
            $lentstatus = '<i class="fa fa-times" aria-hidden="true"></i>';
        }
        
        echo '<td>';
        $authors = $db->table('authors')
            ->select('authors.author', 'authors.book_id')
            ->where('authors.book_id', '=', $book->book_id())
            ->order('author', 'ASC')
            ->all();
        foreach ($authors as $author) {
            echo '<a href="display?author=' . urlencode($author->author()) . '">' . $author->author() . '</a><br />';
        }
        echo '</td>';
        echo '<td><a href="display?id=' . $relevant->id() . '">' . $relevant->title() . '</a></td>';
        echo '<td class="publisher"><a href="display?publisher=' . urlencode($relevant->publisher()) . '">' . $relevant->publisher() . '</a></td>';
        echo '<td class="year"><a href="display?year=' . urlencode($relevant->year()) . '">' . $relevant->year() . '</a></td>';
        echo '<td class="genre">';
        $genres = $db->table('genres')
            ->select('genres.genre', 'genres.book_id')
            ->where('genres.book_id', '=', $book->book_id())
            ->order('genre', 'ASC')
            ->all();
        if ($genres) {
            foreach ($genres as $genre) {
                echo '<a href="display?genre=' . urlencode($genre->genre()) . '">' . $genre->genre() . '</a><br />';
            }
        }
        echo '</td>';
        echo '<td class="lent">' . $lentstatus . '</td>';
        echo '</tr>';
    }
}

?>

        </tbody>
	</table>
</div>

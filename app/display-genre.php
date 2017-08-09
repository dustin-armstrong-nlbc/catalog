<?php
$genre = str_replace('genre=', '', $id);
$genreid = urldecode($genre);
$collection = $db->table('genres');
$items = $collection->select('book_id', 'genre')
    ->where('genre', '=', $genreid)
    ->page(1, 10000);
?>

<h2>
	<i class="fa fa-tag" aria-hidden="true"></i><?php echo ucfirst($genreid).$lang['DISPLAY_GENRE_TITLE']; ?></h2>

<?php
$pagination = $items->pagination();
if ($pagination->items() == '1') {
    $wording = $lang['BOOK_SINGULAR'];
} else {
    $wording = $lang['BOOK_PLURAL'];
}
echo ('<p>' . $lang['DISPLAY_GENRE_OWN'] . $pagination->items() . ' ' . $genreid . ' ' . $wording . $lang['DISPLAY_GENRE_SUFFIX'] . '</p>');
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

    <?php
    if ($items->pagination()->hasPages()) {
        
        if ($items->pagination()->hasPrevPage()) {
            if ($id == '') {
                $pagenum = '1';
            } else {
                $pagenum = $id;
            }
            $prevpage = $pagenum - 1;
            echo '<a class="prevpage" href="page?' . $prevpage . '&genre=' . urlencode($genreid) . '" >&larr; ' . $lang['INDEX_PAGINATION_PREV'] . '</a>';
        }
        if ($items->pagination()->hasNextPage()) {
            if ($id == '') {
                $pagenum = '1';
            } else {
                $pagenum = $id;
            }
            $nextpage = $pagenum + 1;
            echo '<a class="nextpage" href="page?' . $nextpage . '&genre=' . urlencode($genreid) . '" >' . $lang['INDEX_PAGINATION_NEXT'] . ' &rarr;</a>';
        }
    }
    ?>

</div>

<?php
$book_id = $book->id();
if ($book->islent() == 'on') {
    $lentstatus = '<a href="display?lent=' . urlencode($book->islent()) . '" title="' . $book->lentto() . ' ' . $book->lentat() . '"><i class="fa fa-check" aria-hidden="true"></i></a>';
} else {
    $lentstatus = '<i class="fa fa-times" aria-hidden="true"></i>';
}

echo '<tr>';
echo '<td>';
$authors = $db->table('authors')
    ->select('authors.author', 'authors.book_id')
    ->where('authors.book_id = ' . $book_id)
    ->order('author', 'ASC')
    ->all();
foreach ($authors as $author) {
    echo '<a href="display?author=' . urlencode($author->author()) . '">' . $author->author() . '</a><br />';
}
echo '</td>';
echo '<td><a href="display?id=' . $book->id() . '">' . $book->title() . '</a></td>';
echo '<td class="publisher"><a href="display?publisher=' . urlencode($book->publisher()) . '">' . $book->publisher() . '</a></td>';
echo '<td class="year"><a href="display?year=' . urlencode($book->year()) . '">' . $book->year() . '</a></td>';
echo '<td class="genre">';

$genres = $db->table('genres')
    ->select('genres.genre', 'genres.book_id')
    ->where('genres.book_id = ' . $book_id)
    ->order('genre', 'ASC')
    ->all();
foreach ($genres as $genre) {
    echo '<a href="display?genre=' . urlencode($genre->genre()) . '">' . $genre->genre() . '</a><br />';
}
echo '</td>';
echo '<td class="lent">' . $lentstatus . '</td>';
echo '</tr>';
?>
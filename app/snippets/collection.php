<?php
$collection = $db->table('books');
$url = $_SERVER['REQUEST_URI'];
$pagenum = parse_url($url, PHP_URL_QUERY);
$books = $collection->select('*')
    ->order('title')
    ->page($pagenum, 20);
$pagination = $books->pagination();
if ($pagination->items() == '1') {
    $wording = array(
        $lang['VERB_SINGULAR'],
        $lang['ITEM_SINGULAR']
    );
} else {
    $wording = array(
        $lang['VERB_PLURAL'],
        $lang['ITEM_PLURAL']
    );
}
echo ($lang['COLLECTION_PREFIX'] . $wording[0] . ' ' . $pagination->items() . ' ' . $wording[1] . $lang['COLLECTION_MIDDLE'] . $wording[1] . ' ' . $pagination->numStart() . ' &dash; ' . $pagination->numEnd() . $lang['COLLECTION_SUFFIX']);
foreach ($books as $book) {
    include ('results.php');
}
?>
<?php
$publisher = str_replace('publisher=', '', $id);
$publisherid = urldecode($publisher);

$items = $collection->where(array(
    'publisher' => $publisherid
))->page(1, 10000);
?>

<h2>
	<i class="fa fa-building" aria-hidden="true"></i><?php echo $lang['DISPLAY_PUBLISHER_TITLE'].$publisherid.$lang['DISPLAY_PUBLISHER_TITLE_SUFFIX'] ?></h2>

<div id="item-list">

	<table class="item-list-table">
		<?php include_once ('snippets/table-head.php');?>

		<tbody>
	
<?php
$pagination = $items->pagination();
if ($pagination->items() == '1') {
    $wording = $lang['BOOK_SINGULAR'];
} else {
    $wording = $lang['BOOK_PLURAL'];
}
echo ($lang['DISPLAY_PUBLISHER_OWN'] . $pagination->items() . ' ' . $wording . $lang['DISPLAY_PUBLISHER_PUBLISHEDBY'] . $publisherid . $lang['DISPLAY_PUBLISHER_SUFFIX']);
foreach ($items as $book) {
    include ('app/snippets/results.php');
}
?>

		</tbody>
	</table>
</div>
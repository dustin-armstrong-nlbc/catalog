<?php
$year = str_replace('year=', '', $id);
$yearid = urldecode($year);

$items = $collection->where(array(
    'year' => $yearid
))->page(1, 10000);
?>

<h2>
	<i class="fa fa-calendar" aria-hidden="true"></i><?php echo $lang['DISPLAY_YEAR_TITLE'].$yearid.$lang['DISPLAY_YEAR_TITLE_SUFFIX']; ?></h2>

<div id="item-list">

	<table class="item-list-table">
		<?php include ('snippets/table-head.php');?>

		<tbody>
	
<?php
$pagination = $items->pagination();
if ($pagination->items() == '1') {
    $wording = $lang['BOOK_SINGULAR'];
} else {
    $wording = $lang['BOOK_PLURAL'];
}
echo ($lang['DISPLAY_YEAR_OWN'] . $pagination->items() . ' ' . $wording . $lang['DISPLAY_YEAR_PUBLISHEDIN'] . $yearid . $lang['DISPLAY_YEAR_SUFFIX']);
foreach ($items as $book) {
    include ('app/snippets/results.php');
}
?>

		</tbody>
	</table>
</div>

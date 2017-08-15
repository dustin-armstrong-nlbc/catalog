<?php
$items = $collection->where(array(
    'doctype' => 'ebook'
))->page(1, 10000);
?>

<h2>
	<i class="fa fa-plug" aria-hidden="true"></i><?php echo $lang['DISPLAY_EBOOK_TITLE']; ?>
</h2>

<div id="item-list">

	<table class="item-list-table">
		<?php include_once ('snippets/table-head.php');?>

		<tbody>
	
<?php
$pagination = $items->pagination();
if ($pagination->items() == '1') {
    $wording = $lang['EBOOK_SINGULAR'];
} else {
    $wording = $lang['EBOOK_PLURAL'];
}
echo $lang['DISPLAY_EBOOK_PREFIX'] . $pagination->items() . ' ' . $wording . $lang['DISPLAY_EBOOK_SUFFIX'];
foreach ($items as $book) {
    include ('app/snippets/results.php');
}
?>

		</tbody>
	</table>
</div>

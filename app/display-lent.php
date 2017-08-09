<?php
$items = $collection->where(array(
    'islent' => 'on'
))->page(1, 10000);
?>

<h2>
	<i class="fa fa-handshake-o" aria-hidden="true"></i><?php echo $lang['DISPLAY_LENT_TITLE']; ?>
</h2>

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
echo $lang['DISPLAY_LENT_PREFIX'] . $pagination->items() . ' ' . $wording . $lang['DISPLAY_LENT_SUFFIX'];
foreach ($items as $book) {
    include ('app/snippets/results.php');
}
?>

		</tbody>
	</table>
</div>
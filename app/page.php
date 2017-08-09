<?php include_once('snippets/header.php') ?>

<h2>
	<i class="fa fa-book" aria-hidden="true"></i><?php echo $lang['INDEX_TITLE']; ?>
</h2>

<div id="item-list">

	<table class="item-list-table">
        <?php include_once ('snippets/table-head.php');?>

        <tbody>
            <?php
            $url = $_SERVER['REQUEST_URI'];
            $id = parse_url($url, PHP_URL_QUERY);
            ?>
                        
                        <?php include_once('snippets/collection.php') ?>

                        </tbody>
	</table>
    <?php
    if ($books->pagination()->hasPages()) {
        
        if ($books->pagination()->hasPrevPage()) {
            if ($id == '') {
                $pagenum = '1';
            } else {
                $pagenum = $id;
            }
            $prevpage = $pagenum - 1;
            echo '<a class="prevpage" href="page?' . $prevpage . '" >&larr; ' . $lang['INDEX_PAGINATION_PREV'] . '</a>';
        }
        if ($books->pagination()->hasNextPage()) {
            if ($id == '') {
                $pagenum = '1';
            } else {
                $pagenum = $id;
            }
            $nextpage = $pagenum + 1;
            echo '<a class="nextpage" href="page?' . $nextpage . '" >' . $lang['INDEX_PAGINATION_NEXT'] . ' &rarr;</a>';
        }
    }
    ?>
</div>

<?php include_once('snippets/footer.php') ?>
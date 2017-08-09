<?php include_once('snippets/header.php') ?>

<h2>
	<i class="fa fa-plus" aria-hidden="true"></i><?php echo $lang['ADD_TITLE']; ?>
</h2>
<div id="item-list">

<?php
if (isset($_POST['submit'])) { // check if form was submitted
    
    $collection = $db->table('books');
    
    $insert_author = utf8_encode($_POST['author']);
    $insert_title = $_POST['title'];
    $insert_isbn = $_POST['isbn'];
    $insert_publisher = $_POST['publisher'];
    $insert_year = $_POST['year'];
    $insert_description = $_POST['description'];
    $insert_genre = $_POST['genre'];
    $insert_imgpath = $_POST['imgpath'];
    $insert_location = $_POST['location'];
    $insert_owner = $_SESSION['user_id'];
    
    if (isset($_POST['islent'])) {
        
        $insert_islent = $_POST['islent'];
        $insert_lentto = $_POST['lentto'];
        $insert_lentat = $_POST['lentat'];
        
        if ($id = $collection->insert(array(
            'title' => $insert_title,
            'isbn' => $insert_isbn,
            'publisher' => $insert_publisher,
            'year' => $insert_year,
            'description' => $insert_description,
            'imgpath' => $insert_imgpath,
            'location' => $insert_location,
            'islent' => $insert_islent,
            'lentto' => $insert_lentto,
            'lentat' => $insert_lentat,
            'a_str' => $insert_author,
            'g_str' => $insert_genre,
            'owner' => $insert_owner
        
        ))) {
            
            $bookid = $id;
        }
    } else {
        
        if ($id = $collection->insert(array(
            'title' => $insert_title,
            'isbn' => $insert_isbn,
            'publisher' => $insert_publisher,
            'year' => $insert_year,
            'description' => $insert_description,
            'imgpath' => $insert_imgpath,
            'location' => $insert_location,
            'a_str' => $insert_author,
            'g_str' => $insert_genre,
            'owner' => $insert_owner
        
        ))) {
            
            $bookid = $id;
        }
    }
    
    $author_collection = $db->table('authors');
    
    if (strpos($insert_author, ';') !== false) {
        $authors = explode(";", $insert_author);
        foreach ($authors as $author) {
            
            $insert_author = trim($author);
            
            if ($id = $author_collection->insert(array(
                'author' => $insert_author,
                'book_id' => $bookid
            ))) {}
        }
    } else {
        $insert_author = $_POST['author'];
        if ($insert_author != '') {
            if ($id = $author_collection->insert(array(
                'author' => $insert_author,
                'book_id' => $bookid
            ))) {}
        }
    }
    
    $genre_collection = $db->table('genres');
    
    if (strpos($insert_genre, ',') !== false) {
        $genres = explode(",", $insert_genre);
        foreach ($genres as $genre) {
            
            $insert_genre = trim($genre);
            
            if ($id = $genre_collection->insert(array(
                'genre' => $insert_genre,
                'book_id' => $bookid
            ))) {}
        }
    } else {
        $insert_genre = $_POST['genre'];
        if ($insert_genre != '') {
            if ($id = $genre_collection->insert(array(
                'genre' => $insert_genre,
                'book_id' => $bookid
            ))) {}
        }
    }
    echo '<p>' . $lang['ADDED_SUCCESS'] . '<a href="display?id=' . $bookid . '">' . $lang['ADDED_SUCCESS_REDIRECT'] . '</a>.</p>';
} else {
    ?>

    <form action="" method="post">
		<label class="add-new-item"><i class="fa fa-user" aria-hidden="true"></i>
            <?php echo $lang['ADD_AUTHOR_LABEL'] ?></label> <input
			class="add-item-input" type="text" name="author" /><label
			class="add-new-item"><i class="fa fa-font" aria-hidden="true"></i>
            <?php echo $lang['ADD_TITLE_LABEL'] ?></label> <input
			class="add-item-input" type="text" name="title" required /> <label
			class="add-new-item"><i class="fa fa-barcode" aria-hidden="true"></i> <?php echo $lang['ADD_ISBN_LABEL'] ?></label>
		<input class="add-item-input" type="text" name="isbn" /> <label
			class="add-new-item"><i class="fa fa-building" aria-hidden="true"></i>
            <?php echo $lang['ADD_PUBLISHER_LABEL'] ?></label> <input
			class="add-item-input" type="text" name="publisher" /> <label
			class="add-new-item"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $lang['ADD_YEAR_LABEL'] ?></label>
		<input class="add-item-input" type="text" name="year" /> <label
			class="add-new-item"><i class="fa fa-tag" aria-hidden="true"></i> <?php echo $lang['ADD_GENRE_LABEL'] ?></label>
		<input class="add-item-input" type="text" name="genre" /> <label
			class="add-new-item"><i class="fa fa-file-image-o" aria-hidden="true"></i> <?php echo $lang['ADD_COVER_LABEL'] ?></label>
		<input class="add-item-input" type="text" name="imgpath" /> <label
			class="add-new-item"><i class="fa fa-align-left" aria-hidden="true"></i> <?php echo $lang['ADD_DESCRIPTION_LABEL'] ?></label>
		<textarea class="add-item-input" type="text" name="description"></textarea>
		<label class="add-new-item"><i class="fa fa-compass"
			aria-hidden="true"></i> <?php echo $lang['ADD_LOCATION_LABEL'] ?></label>
		<input class="add-item-input" type="text" name="location" />

		<div class="book-lent">
			<input type="checkbox" name="islent" id="iflent"
				class="showHideCheck" /><label for="iflent"></label> <label
				class="add-new-item"><?php echo $lang['ADD_IFLENT_LABEL'] ?></label>

			<div class="hiddenInput">
				<label class="add-new-item"><i class="fa fa-user-circle-o"
					aria-hidden="true"></i> <?php echo $lang['ADD_LENTTO_LABEL'] ?></label>
				<input type="text" class="add-item-input" name="lentto"> <label
					class="add-new-item"><i class="fa fa-calendar-check-o"
					aria-hidden="true"></i> <?php echo $lang['ADD_LENTAT_LABEL'] ?></label>
				<input type="date" class="add-item-input" name="lentat">
			</div>
		</div>

		<input class="add-item-submit" type="submit" name="submit"
			value="<?php echo $lang['ADD_ADDBUTTON'] ?>" /> <input
			class="add-item-submit cancel-this" type="button" name="cancel"
			value="<?php echo $lang['ADD_CANCELBUTTON'] ?>"
			onClick="window.location='index';" />
	</form>

<?php } ?>

    <div class="clear"></div>

</div>

<?php include_once ('snippets/footer.php') ?>
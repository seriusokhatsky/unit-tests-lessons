<!DOCTYPE html>
<?php
	require_once './autoload.php';
	$libraryFacade = new LibraryFacade();

	if( ! empty( $_POST ) ) {
		$libraryFacade->addBook( $_POST['title'], $_POST['author'] );
	}

	if( isset( $_GET['remove'] ) ) {
		$libraryFacade->removeBook( $_GET['remove'] );
	}

	$allBooks = $libraryFacade->findAll();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Library</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container ">
			<div class="row">
				<div class="col-sm-12">
					<h2>Serg's books library</h2>
					<h3>Library Books</h3>
					<ul>
						<?php foreach ($allBooks as $book) : ?>
						<li>"<?php echo $book->getTitle(); ?>" <em>by <?php echo $book->getAuthor(); ?></em> <a href="?remove=<?php echo $book->getTitle(); ?>">delete</a></li>
						<?php endforeach; ?>
					</ul>
					<form action="" method="post">
						<h4>Add a new book</h4>
						<div class="form-group">
							<label for="title">Book Title</label>
							<input type="text" class="form-control" name="title" id="title" placeholder="Book Title">
						</div>
						<div class="form-group">
							<label for="author">Book Author</label>
							<input type="text" class="form-control" name="author" id="author" placeholder="Book Author">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
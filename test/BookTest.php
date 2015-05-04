<?php 


class BookTest extends PHPUnit_Framework_TestCase {



	function testDifferentBooksCanHaveDiffTitles() {
		$book1 = $this->createBook();
		$title1 = 'The 50 shades of grey';
	}

	function testDifferentBooksCanHaveDifferentAuthors() {
		$book1 = $this->createBook();
		$author1 = 'John Doe';
		$book1->setAuthor($author1);
		$this->assertEquals($author1, $book1->getAuthor());

		$book2 = $this->createBook();
		$author2 = 'Don Johe';
		$book2->setAuthor($author2);
		$this->assertEquals($author2, $book2->getAuthor());
	}

	function testWeCanCreateANewBookWithTheInformationWeWant() {
		$title = 'New Title';
		$author = 'Really Cool Guy';
		
		$book = new Novel($title, $author);

		$this->assertEquals($title, $book->getTitle());
		$this->assertEquals($author, $book->getAuthor());
	}

	function testItCanShowNumberOfPages() {
		$book = new Novel();
		$book->setAllPages(100);
		$this->assertEquals(98, $book->numberOfPages());

	}

	function createBook() {
		return new Novel();
	}
}

 ?>
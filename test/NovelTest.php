<?php 

require_once __DIR__.'/../Novel.php';
require_once __DIR__.'/../ColoringBook.php';

class NovelTest extends PHPUnit_Framework_TestCase {

	function testIsNovelMayHaveCategory() {
		$title = 'Novel 1';
		$author = 'Gay';
		$novel = new Novel($title, $author);

		$novel->setCategory('romance');

		$this->assertEquals('romance', $novel->getCategory());
		$this->assertEquals($title, $novel->getTitle());
		$this->assertEquals($author, $novel->getAuthor());

	}

	function testColoringBook() {
		$title = 'Coloring book 1';
		$coloringBook = new ColoringBook($title);
		$range = range(2,5);
		$coloringBook->setYearsRange($range);

		$this->assertEquals($range, $coloringBook->getYearsRange());
		$this->assertEquals($title, $coloringBook->getTitle());
		$this->assertEquals('Not required', $coloringBook->getAuthor());

	}
}

 ?>
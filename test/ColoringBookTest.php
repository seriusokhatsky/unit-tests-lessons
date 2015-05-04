<?php 


class ColoringBookTest extends PHPUnit_Framework_TestCase {


	function testColoringBook() {
		$title = 'Coloring book 1';
		$coloringBook = new ColoringBook($title);
		$range = range(2,5);
		$coloringBook->setYearsRange($range);

		$this->assertEquals($range, $coloringBook->getYearsRange());
		$this->assertEquals($title, $coloringBook->getTitle());
		$this->assertEquals('Not required', $coloringBook->getAuthor());

	}

	function testItCanShowNumberOfPages() {
		$coloringBook = new ColoringBook();
		$coloringBook->setAllPages(100);

		$coloringBook->setIntroductionToParents(15);

		$this->assertEquals(83, $coloringBook->numberOfPages());

	}
}

 ?>
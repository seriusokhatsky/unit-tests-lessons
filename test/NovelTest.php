<?php 


class NovelTest extends PHPUnit_Framework_TestCase {

	function testIsNovelMayHaveCategory() {
		$title = 'Novel 1';
		$author = 'Gay';
		$category = 'romance1';
		$novel = new Novel($title, $author);

		$novel->setCategory($category);

		$this->assertEquals($category, $novel->getCategory());
		$this->assertEquals($title, $novel->getTitle());
		$this->assertEquals($author, $novel->getAuthor());

	}
}

 ?>
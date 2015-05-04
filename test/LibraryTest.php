<?php 


class LibraryTest extends PHPUnit_Framework_TestCase {

	private $library;

	protected function setUp() {
		$this->library = new Library;
	}

	function testIsLibraryCanStoreBook() {
		$library = new Library;
		$novel = new Novel;

		$this->library->add($novel);

		$this->assertEquals(array($novel), $this->library->findAll());

	}
	function testIsLibraryCanStoreSeveralBooks() {
		$library = new Library;
		$novel = new Novel;
		$novel2 = new Novel;

		$this->library->add($novel);
		$this->library->add($novel2);

		$this->assertEquals(array($novel, $novel2), $this->library->findAll());

	}

	function testItCanFindABookByTitle() {
		$title = 'Interstellar Warrior';

		$novel = $this->aMockOfTheNovelWithTitleMethodReturnTitle($title);

		$this->library->add($novel);
		
		$this->assertEquals(array($novel), $this->library->findByTitle($title));

	}

	function testItCanRemoveABookByTitle() {
		$title = 'Interstellar Warrior';

		$novel = $this->aMockOfTheNovelWithTitleMethodReturnTitle($title);
		$novel2 = $this->aMockOfTheNovelWithTitleMethodReturnTitle('Some Novel 2');

		$this->library->add($novel);
		$this->library->add($novel2);
		$this->library->removeByTitle($title);
		
		$this->assertEquals(array($novel2), $this->library->findAll());

	}

	function aMockOfTheNovelWithTitleMethodReturnTitle($title) {
		$novel = $this->getMock('Novel');
		$novel->expects($this->once())->method('getTitle')->will($this->returnValue($title));
		return $novel;
	}
}

 ?>
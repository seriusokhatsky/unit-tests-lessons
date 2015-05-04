<?php 


class LibraryTest extends PHPUnit_Framework_TestCase {

	private $persistence;
	private $library;

	protected function setUp() {

		$this->persistence = \Mockery::mock('PersistenceGateway');
		$this->library = new Library($this->persistence);
	}

	protected function tearDown() {
		\Mockery::close();
	}

	function testIsLibraryCanStoreBook() {
		$library = new Library;
		$novel = new Novel;

		$this->persistence->shouldReceive('save')->once()->withAnyArgs();

		$this->library->add($novel);


		$this->assertEquals(array($novel), $this->library->findAll());

	}
	function testIsLibraryCanStoreSeveralBooks() {
		$library = new Library;
		$novel = new Novel;
		$novel2 = new Novel;

		$this->persistence->shouldReceive('save')->twice()->withAnyArgs();

		$this->library->add($novel);
		$this->library->add($novel2);

		$this->assertEquals(array($novel, $novel2), $this->library->findAll());

	}

	function testItCanFindABookByTitle() {
		$title = 'Interstellar Warrior';

		$novel = $this->aMockOfTheNovelWithTitleMethodReturnTitle($title);

		$this->persistence->shouldReceive('save')->once()->withAnyArgs();

		$this->library->add($novel);
		
		$this->assertEquals(array($novel), $this->library->findByTitle($title));

	}

	function testItCanRemoveABookByTitle() {
		$title = 'Interstellar Warrior';

		$novel = $this->aMockOfTheNovelWithTitleMethodReturnTitle($title);
		$novel2 = $this->aMockOfTheNovelWithTitleMethodReturnTitle('Some Novel 2');

		$this->persistence->shouldReceive('save')->twice()->withAnyArgs();

		$this->library->add($novel);
		$this->library->add($novel2);


		$this->persistence->shouldReceive('save')->once()->withAnyArgs();

		$this->library->removeByTitle($title);
		
		$this->assertEquals(array($novel2), $this->library->findAll());

	}

	function testItCanSaveWithThePersistanceGetawey() {
		$novel = new Novel('some title');

		$this->persistence->shouldReceive('save')->once()->withAnyArgs();
		$this->library->add($novel);

		$this->persistence->shouldReceive('save')->with($this->library->findAll(), Library::$libraryPath);

		$this->library->save();

	}

	function testItCanLoadItselfWithAPersistence() {
		$novel = new Novel('some title');

		$this->persistence->shouldReceive('loadFromFile')->once()->with(Library::$libraryPath)->andReturn(array($novel));

		$this->library->loadFromFile();

		$this->assertEquals([$novel], $this->library->findAll());

	}

	function aMockOfTheNovelWithTitleMethodReturnTitle($title) {
		$novel = $this->getMock('Novel');
		$novel->expects($this->once())->method('getTitle')->will($this->returnValue($title));
		return $novel;
	}
}

 ?>
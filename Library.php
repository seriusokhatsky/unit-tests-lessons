<?php 

class Library {

	private $books = array();
	public static $libraryPath = '/tmp/library.txt';
	private $persistence;

	function __construct(PersistenceGateway $persistence = null) {
		$this->persistence = $persistence ? : new SerializedPersister();
	}

	function add(Book $book) {
		$this->books[] = $book;
		$this->save();
	}

	function findAll() {
		return $this->books;
	}

	function findByTitle($title) {
		return array_filter($this->books, function ($book) use($title) {
			return $book->getTitle() == $title;
		});
	}

	function removeByTitle($title) {
		$this->books = array_values( 
			array_filter($this->books, function ($book) use($title) {
				return $book->getTitle() != $title;
			})
		);
		$this->save();
	}

	function save() {
		$this->persistence->save($this->books, self::$libraryPath);
	}

	function loadFromFile() {
		$this->books = $this->persistence->loadFromFile(self::$libraryPath);
	}
}


 ?>
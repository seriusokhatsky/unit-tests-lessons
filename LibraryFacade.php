<?php 

class LibraryFacade {

	private $library;

	function __construct() {
		$this->library = new Library();
		$this->library->loadFromFile();
	}

	function findAll() {
		return $this->library->findAll();
	}

	function addBook($title, $author) {
		$this->library->add(new Novel($title, $author) );
	}

	function removeBook($title) {
		$this->library->removeByTitle($title);
	}
}
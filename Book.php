<?php 

class Book {

	public $title = '';
	public $author = '';

	function __construct($title = 'N/A', $author = 'N/A') {
		$this->setTitle($title);
		$this->setAuthor($author);
	}

	public function setAuthor($author) {
		$this->author = $author;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getTitle() {
		return $this->title;
	}
}

 ?>
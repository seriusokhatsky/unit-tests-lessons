<?php 

abstract class Book {

	const COVERPAGES = 2;

	public $title = '';
	public $author = '';
	protected $allPages;

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

	abstract public function numberOfPages();

    /**
     * Gets the value of allPages.
     *
     * @return mixed
     */
    public function getAllPages()
    {
        return $this->allPages;
    }

    public function setAllPages($pages)
    {
        $this->allPages = $pages;
        return $this;
    }
}

 ?>
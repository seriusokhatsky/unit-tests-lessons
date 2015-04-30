<?php 

class ColoringBook extends Book {

	private $yearsRange;

	public function __construct($title = 'N/A', $author = 'Not required') {
		parent::__construct($title, $author);
	}

    public function setYearsRange($yearsRange) {
    	$this->yearsRange = $yearsRange;
    }

    public function getYearsRange() {
    	return $this->yearsRange;
    }

}

 ?>
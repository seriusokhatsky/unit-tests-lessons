<?php 

class ColoringBook extends Book {

	private $yearsRange;
    private $introductionToParents = 10;

	public function __construct($title = 'N/A', $author = 'Not required') {
		parent::__construct($title, $author);
	}



    /**
     * Gets the value of yearsRange.
     *
     * @return mixed
     */
    public function getYearsRange()
    {
        return $this->yearsRange;
    }

    /**
     * Sets the value of yearsRange.
     *
     * @param mixed $yearsRange the years range
     *
     * @return self
     */
    public function setYearsRange($yearsRange)
    {
        $this->yearsRange = $yearsRange;

        return $this;
    }

    public function numberOfPages() {
        return $this->allPages - self::COVERPAGES - $this->introductionToParents;
    }

    /**
     * Gets the value of introductionToParents.
     *
     * @return mixed
     */
    public function getIntroductionToParents()
    {
        return $this->introductionToParents;
    }

    /**
     * Sets the value of introductionToParents.
     *
     * @param mixed $introductionToParents the introduction to parents
     *
     * @return self
     */
    public function setIntroductionToParents($introductionToParents)
    {
        $this->introductionToParents = $introductionToParents;

        return $this;
    }
}

 ?>
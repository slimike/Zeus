<?php

class Application_Model_Carousel
{
	/**
	 * @var number
	 */
	protected $carousel_id;
	/**
	 * @var string
	 */
	protected $carousel_img;
	/**
	 * @var string
	 */
	protected $carousel_txt;
	
	
	/**
	 * @return the $carousel_id
	 */
	public function getCarousel_id() {
		return $this->carousel_id;
	}

	/**
	 * @param number $carousel_id
	 */
	public function setCarousel_id($carousel_id) {
		$this->carousel_id = $carousel_id;
		return $this;
	}

	/**
	 * @return the $carousel_img
	 */
	public function getCarousel_img() {
		return $this->carousel_img;
	}

	/**
	 * @param string $carousel_img
	 */
	public function setCarousel_img($carousel_img) {
		$this->carousel_img = $carousel_img;
		return $this;
	}

	/**
	 * @return the $carousel_txt
	 */
	public function getCarousel_txt() {
		return $this->carousel_txt;
	}

	/**
	 * @param string $carousel_txt
	 */
	public function setCarousel_txt($carousel_txt) {
		$this->carousel_txt = $carousel_txt;
		return $this;
	}

	
}

	
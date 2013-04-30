<?php
class Slideshow extends DataObjectDecorator {
	public static $enableHTMLContentEditor = false;
	public static $enableSchedulation = false;
	
	function extraStatics() {
		return array(
			'has_many' => array(
				'SlideshowSlides' => 'SlideshowSlide'
			),
			'has_one' => array(
			)
		);
	}
	function updateCMSFields(&$fields) {
		$image_manager = new ImageDataObjectManager (
			$this->owner,
			'SlideshowSlides',
			'SlideshowSlide',
			'SlideImage',
			array(),
			'getCMSFields_forPopup'
		);
		$image_manager->copyOnImport = false;
		$fields->addFieldToTab('Root.Content.Slideshow',$image_manager);
	}
	public function CurrentSlideshowSlides() {
		$current_slides = DataObject::get(
			'SlideshowSlide',
			'PageID = '.$this->owner->ID.' AND (StartDate IS NULL OR StartDate <= NOW()) AND (EndDate IS NULL OR EndDate > NOW())'
		);
		return $current_slides;
	}
}
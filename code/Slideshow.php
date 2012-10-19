<?php
class Slideshow extends DataObjectDecorator {
	public static $enableHTMLContentEditor = true;
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
}
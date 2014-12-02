<?php
class SlideshowSlide extends DataObject {
	static $db = array(
   		'Content' => 'HTMLText',
   		'LinkTitle' => 'Varchar(255)',
		'StartDate' => 'Date',
		'EndDate' => 'Date',
		'Inactive' => 'Boolean',
		'ExternalLink' => 'Varchar(255)',
		'LinkTargetBlank' => 'Boolean'
	);
	static $has_one = array (
		'Page' => 'Page',
		'SlideImage' => 'Image',
		'Link' => 'SiteTree'
	);
	static $belongs_to = array('Page');
	function canDelete() {
		return Permission::check('CMS_ACCESS_CMSMain');
	}
	function getThumbnailOfSlideImage() {
		return $this->SlideImage()->SetHeight(60);

	}
	function getContentSummary() {
		if($this->Content) {
			return $this->dbObject('Content')->LimitCharacters(80);			
		}
		return 'None';
	}
	function getVisibility() {
		if($this->Inactive) {
			return 'Deactivated';
		}
		if (Slideshow::$enableSchedulation) {
			$now = date('Y-m-d H:i:s');
			if($this->StartDate && $now < $this->StartDate) {
				return 'Pending';
			}
			if($this->EndDate && $now > $this->EndDate) {
				return 'Expired';
			}
		}
		return 'Active';
	}
	function getLinkInfo() {
		if($this->LinkID) {
			return $this->Link()->MenuTitle;
		}
		if($this->ExternalLink) {
			return $this->ExternalLink;
		}
		return '-';
	}
	function getCMSFields_forPopup() {
		$fields = new FieldSet();
		$fields->push(new ImageUploadField('SlideImage', _t('SlideshowSlide.IMAGE','Image')));
		if (Slideshow::$enableSchedulation) {
			$start_date_field = new DateField('StartDate', 'Opitional start date (selected date included)');
			$start_date_field->setConfig('showcalendar',true);
			$fields->push($start_date_field);
			$end_date_field = new DateField('EndDate', 'Optional end date (selected date excluded)');
			$end_date_field->setConfig('showcalendar',true);
			$fields->push($end_date_field);
		}
		if (Slideshow::$enableHTMLContentEditor) {
			$fields->push(new SimpleTinyMCEField('Content', _t('SlideshowSlide.CONTENT','Text'), 'Text'));
		}
		else {
			$fields->push(new TextareaField('Content', _t('SlideshowSlide.CONTENT','Text'), 'Text'));
		}
		$PageDropDown = new SimpleTreeDropdownField('LinkID', 'Link to page');
		$PageDropDown->setEmptyString('-- None --');
		$fields->push($PageDropDown);
		$fields->push(new TextField('ExternalLink', 'External link including "http://" (e.g. http://www.example.com)'));
		$fields->push(new TextField('LinkTitle', 'Link label'));
		$fields->push(new CheckboxField('LinkTargetBlank', 'Open link in new tab / window'));
		$fields->push(new CheckboxField('Inactive', 'Deactivate this slide'));
		$fields->push( new LiteralField('DOM-fix','<div style="height:35px">&nbsp;</div>'));
   		return $fields;
	}
}
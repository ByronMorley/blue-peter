<?php

class BlockExtension extends DataExtension
{

	public function Link()
	{
		$presenter = PresentationHolder::get()->first();

		return ($presenter) ? Controller::join_links(PresentationHolder::get()->first()->Link(), 'show', $this->owner->ID) : null;
	}

	public function BlueLink()
	{
		return $this->owner->Page()->Link();
	}

	public function PresentationLink()
	{
		return PresentationHolder::get()->first()->Link();
	}

	public function LinkingMode()
	{
		if (Controller::curr()->getRequest()->param('ID') == $this->owner->ID) {
			return "active";
		}
	}

	public function NextBlock($blockPages)
	{

		$blocks = Section::get()->filter('PageID', $this->owner->PageID)->exclude('ClassName', 'SectionActivityBlock');
		$block = null;

		$currentPos = $this->getCurrentPosition($blocks, $this->owner->ID);

		if ($currentPos >= (count($blocks) - 1)) {

			$page = $this->getNextBlockPage($blockPages);
			if ($page != null) {
				$sections = Section::get()->filter('PageID', $page->ID);
				$block = $sections[0];
			}

		} else {
			$block = $blocks[$currentPos + 1];
		}

		return $block;
	}

	public function PreviousBlock($blockPages)
	{
		$blocks = Section::get()->filter('PageID', $this->owner->PageID)->exclude('ClassName', 'SectionActivityBlock');
		$block = null;

		$currentPos = $this->getCurrentPosition($blocks, $this->owner->ID);

		if ($currentPos == 0) {

			$page = $this->getPreviousBlockPage($blockPages);
			if ($page != null) {
				$sections = Section::get()->filter('PageID', $page->ID);
				$block = $sections[count($sections) - 1];
			}
		} else {
			$block = $blocks[$currentPos - 1];
		}

		return $block;
	}

	public function getNextBlockPage($blockPages)
	{
		$position = $this->getCurrentPosition($blockPages, $this->owner->PageID);
		return ($position >= (count($blockPages) - 1)) ? null : $blockPages[$position + 1];
	}

	public function getPreviousBlockPage($blockPages)
	{
		$position = $this->getCurrentPosition($blockPages, $this->owner->PageID);
		return ($position == 0) ? null : $blockPages[$position - 1];
	}

	public function getCurrentPosition($array, $ID)
	{
		$pos = 0;
		$position = 0;
		foreach ($array as $item) {
			if ($item->ID == $ID) {
				$position = $pos;
				break;
			}
			$pos++;
		}
		return $position;
	}

	public function getBlockByPosition($blocks, $position)
	{
		$pos = 1;
		foreach ($blocks as $block) {

			if ($pos == $position) {

				return $block;
			}
			$pos++;
		}
	}

}
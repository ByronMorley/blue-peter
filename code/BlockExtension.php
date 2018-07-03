<?php

class BlockExtension extends DataExtension
{

	public function Link()
	{
		return Controller::join_links(PresentationHolder::get()->first()->Link(), 'show', $this->owner->ID);
	}

	public function BlueLink(){
		return $this->owner->Page()->Link();
	}

	public function PresentationLink(){
		return 	PresentationHolder::get()->first()->Link();
	}

	public function LinkingMode()
	{
		if (Controller::curr()->getRequest()->param('ID') == $this->owner->ID) {
			return "active";
		}
	}

	public function NextBlock($blocks)
	{
		$position = $this->owner->getCurrentPosition($blocks);
		return ($position < $blocks->count()) ? $this->owner->getBlockByPosition($blocks, ($position + 1)) : null;
	}

	public function PreviousBlock($blocks)
	{
		$position = $this->owner->getCurrentPosition($blocks);
		return ($position > 1) ? $this->owner->getBlockByPosition($blocks, ($position - 1)) : null;
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

	public function getCurrentPosition($blocks)
	{
		$pos = 1;
		$position=null;
		foreach ($blocks as $block) {

			if ($block->ID == $this->owner->ID) {
				$position = $pos;
			}
			$pos++;
		}
		return $position;
	}

}
<?php

class BlockPageExtension extends DataExtension
{

	public function ParentTitle()
	{
		return $this->owner->Parent()->Title;
	}

	public function BlueLink()
	{
		$section = $this->owner->Sections()->first();
		$presenter = PresentationHolder::get()->first();

		return ($section && $presenter) ? Controller::join_links($presenter->Link(), 'show', $section->ID) : "javascript:void(0)";
	}
}

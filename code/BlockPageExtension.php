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

		return $section ? Controller::join_links(PresentationHolder::get()->first()->Link(), 'show', $section->ID) : "javascript:void(0)";
	}
}

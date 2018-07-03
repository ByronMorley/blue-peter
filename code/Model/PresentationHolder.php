<?php

class PresentationHolder extends Page {
	public function getBlocks()
	{
		$pages = array();
		foreach ($this->getBlockPages() as $page) {
			array_push($pages, $page->ID);
		}
		return Section::get()->filterAny('PageID', $pages);
	}

	public function BlockHolders()
	{
		return $this->getAllPages()->filter('ClassName', 'BlockHolder');
	}

	public function getBlockPages()
	{
		return $this->getAllPages()->filter('ClassName', 'BlockPage');
	}

	public function getAllPages()
	{
		$list = arrayList::create();
		return $this->getPages(0, $list);
	}

	public function getPages($ID, $list)
	{
		$pages = SiteTree::get()->filter('ParentID', $ID)->sort('Sort', 'ASC');

		foreach ($pages as $page) {
			$list->push($page);
			$list = $this->getPages($page->ID, $list);
		}
		return $list;
	}
}
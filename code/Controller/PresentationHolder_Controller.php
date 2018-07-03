<?php

class PresentationHolder_Controller extends Page_Controller
{

	public function init()
	{
		parent::init();
		Requirements::css(BLUE_PETER_DIR . '/css/style.css');;
		Requirements::javascript(BLUE_PETER_DIR . '/js/main.min.js');
	}

	public static $allowed_actions = array(
		'show'
	);

	public function show(SS_HTTPRequest $request)
	{
		$block = Section::get()->byID($request->param('ID'));
		if (!$block) {
			return $this->httpError(404, 'Block could not be found');
		} else {

			$Page = $block->Page();
			$blocklist = $Page->Sections();
			$blocks = $this->getBlocks();

			return array(
				'NextBlock' => $block->nextBlock($blocks),
				'PreviousBlock' => $block->previousBlock($blocks),
				'PageTitle' => $Page->Title,
				'BlockList' => $blocklist,
				'Block' => $block,
				'HolderTitle'=> $block->Page()->ParentTitle()
			);
		}
	}


}
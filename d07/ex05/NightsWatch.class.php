<?php
class NightsWatch{

	private $nights_watch = array();

	public function recruit( $who )
	{
		if ($who instanceof IFighter)
		{
			$this->nights_watch[] = $who;
		}
	}

	public function fight()
	{
		foreach($this->nights_watch as $member)
		{
			$member->fight();
		}
	}
}
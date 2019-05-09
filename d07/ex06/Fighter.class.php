<?php
class Fighter{
	private $fighter_name;

	public function __construct( $name ){
		$this->fighter_name = $name;
	}

	public function getName()
	{
		return $this->fighter_name;
	}
}
<?php
class UnholyFactory{

	private $absorbed = array();

	public function absorb( $who )
	{
		if ($who instanceof Fighter){
			$name = $who->getName();
			if (!isset($this->absorbed[$name])){
				echo "(Factory absorbed a fighter of type ".$name.")".PHP_EOL;
				$this->absorbed[$name] = $who;
			}
			else
				echo "(Factory already absorbed a fighter of type ".$name.")".PHP_EOL;
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
	}

	public function fabricate( $who )
	{
		if (isset($this->absorbed[$who])){
			echo "(Factory fabricates a fighter of type ".$who.")".PHP_EOL;
			return new $this->absorbed[$who];
		}
		else
			echo "(Factory hasn't absorbed any fighter of type ".$who.")".PHP_EOL;
	}
}
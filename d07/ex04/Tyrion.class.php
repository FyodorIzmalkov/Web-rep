<?php
class Tyrion extends Lannister{

	public function sleepWith( $name )
	{
		if (is_subclass_of($name, 'Lannister'))
			echo "Not even if I'm drunk !".PHP_EOL;
		else
			echo "Let's do this.".PHP_EOL;
	}
}
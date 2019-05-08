<?php
class Color{
	static $verbose = false;
	public $red;
	public $green;
	public $blue;

	public function __construct($arr)
	{
		if (isset($arr['rgb']))
		{
			$rgb = intval($arr['rgb']);
			$this->red = (($rgb >> 16) & 255);
			$this->green = (($rgb >> 8) & 255);
			$this->blue = ($rgb & 255);
		}
		else
		{
			$this->red = intval($arr['red']);
			$this->green = intval($arr['green']);
			$this->blue = intval($arr['blue']);
		}
		if (self::$verbose === true)
			echo $this->__toString()." constructed.".PHP_EOL;
	}

	public function __destruct()
	{
		if (self::$verbose === true)
			echo $this->__toString()." destructed.".PHP_EOL;
	}

	public function __toString()
	{
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	public static function doc()
	{
		return file_get_contents('Color.doc.txt');
	}

	public function add( $add )
	{
		$r = $this->red + $add->red;
		$g = $this->green + $add->green;
		$b = $this->blue + $add->blue;
		return new Color(array('red' => $r, 'green' => $g, 'blue' => $b));
	}

	public function sub( $sub )
	{
		$r = $this->red - $sub->red;
		$g = $this->green - $sub->green;
		$b = $this->blue - $sub->blue;
		return new Color(array('red' => $r, 'green' => $g, 'blue' => $b));
	}

	public function mult( $m )
	{
		$r = $this->red * $m;
		$g = $this->green * $m;
		$b = $this->blue * $m;
		return new Color(array('red' => $r, 'green' => $g, 'blue' => $b));
	}

}
<?php
class Vertex{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	static $verbose = false;
	
	public static function doc()
	{
		return file_get_contents('Vertex.doc.txt');
	}

	public function __construct($arr)
	{
			$this->_x = $arr['x'];
			$this->_y = $arr['y'];
			$this->_z = $arr['z'];

			if (isset($arr['w']))
				$this->_w = $arr['w'];
			else
				$this->_w = 1.0;
			if (isset($arr['color']))
				$this->_color = $arr['color'];
			else
				$this->_color = new Color(array('rgb' => 0xffffff));
			if (self::$verbose === true)
				echo $this->__toString()." constructed". PHP_EOL;
	}

	public function __destruct()
	{
		if (self::$verbose === true)
			echo $this->__toString()." destructed". PHP_EOL;
	}

	public function __toString()
	{
		if (self::$verbose === true)
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		else
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	public function get_x(){
		return $this->_x;
	}

	public function get_y(){
		return $this->_y;
	}

	public function get_z(){
		return $this->_z;
	}

	public function get_w(){
		return $this->_w;
	}

	public function get_color(){
		return $this->_color;
	}

	public function set_x($x){
		$this->_x = $x;
	}

	public function set_y($y){
		$this->_y = $y;
	}

	public function set_z($z){
		$this->_z = $z;
	}

	public function set_w($w){
		$this->_w = $w;
	}

	public function set_color( $color ){
		$this->_color = $color;
	}
}
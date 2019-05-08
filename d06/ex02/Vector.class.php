<?php
require_once 'Color.class.php';
class Vector{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;
	public static $verbose = false;

	public static function doc()
	{
		return file_get_contents('Vector.doc.txt');
	}

	public function __construct(array $arr)
	{
		if (isset($arr['dest']) && $arr['dest'] instanceof Vertex)
		{
			if (isset($arr['orig']) && $arr['orig'] instanceof Vertex)
				$orig = $arr['orig'];
			else
			{
				$orig = new Vertex( array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1) );
			}
			$this->_x = $arr['dest']->get_x() - $orig->get_x();
			$this->_y = $arr['dest']->get_y() - $orig->get_y();
			$this->_z = $arr['dest']->get_z() - $orig->get_z();
		}
		if (self::$verbose === true)
			echo $this." constructed".PHP_EOL;
	}

	public function __destruct()
	{
		if (self::$verbose === true)
			echo $this." destructed". PHP_EOL;
	}

	public function __toString()
	{
		return (sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function magnitude(){
		return (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
	}

	public function normalize()
	{
			$magnitude = $this->magnitude();
			if ($magnitude == 1) {
				return clone $this;
			}
			return new Vector(array( 'dest' => new Vertex(array(
				'x' => $this->_x / $magnitude, 'y' => $this->_y / $magnitude, 'z' => $this->_z / $magnitude))));
	}

	public function add(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z))));
	}

	public function sub(Vector $rhs)
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z))));
	}

	public function opposite()
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
	}

	public function scalarProduct( $k )
	{
		return new Vector(array( 'dest' => new Vertex(array(
			'x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
	}

	public function dotProduct( Vector $rhs )
	{	
		return (float)($this->_x * $rhs->get_x() + $this->_y * $rhs->get_y() + $this->_z * $rhs->get_z());
	}

	public function cos( Vector $rhs )
	{
		$a = $this->_x * $rhs->get_x() + $this->_y * $rhs->get_y() + $this->_z * $rhs->get_z();
		$b = $this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z;
		$c = $rhs->get_x() * $rhs->get_x() + $rhs->get_y() * $rhs->get_y() + $rhs->get_z() * $rhs->get_z();
		return ($a / sqrt($b * $c));
	}

	public function crossProduct( Vector $rhs )
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => $this->_y * $rhs->get_z() - $this->_z * $rhs->get_y(),
			'y' => $this->_z * $rhs->get_x() - $this->_x * $rhs->get_z(),
			'z' => $this->_x * $rhs->get_y() - $this->_y * $rhs->get_x()))));
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
}
<?php
class Image
{
	var $character;
	var $r;
	var $g;
	var $b;
	var $hexColor;

	public function  __construct($character, $r, $g, $b) {
		$this->character = $character;
		$this->r = $r;
		$this->g = $g;
		$this->b = $b;
	}

	function rgb2hex() {
	   $hex = "#";
	   $hex .= str_pad(dechex($this->r), 2, "0", STR_PAD_LEFT);
	   $hex .= str_pad(dechex($this->g), 2, "0", STR_PAD_LEFT);
	   $hex .= str_pad(dechex($this->b), 2, "0", STR_PAD_LEFT);
	   $this->hexColor = $hex;
	}

}
?>
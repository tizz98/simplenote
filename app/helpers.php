<?php

class Helper {

	public static function setActive($path, $active = 'active') {
  		return Request::is($path) ? 'active' : '';
  	}

}
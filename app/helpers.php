<?php

class Helper {

	public static function setActive($paths, $active = 'active') {
		if (is_array($paths))
		{
			for ($i=0; $i < count($paths) ; $i++) { 
				if (Request::is($paths[$i]))
				{
					return $active;
				}
			}

			return '';
		}
		else
		{
	  		return Request::is($paths) ? $active : '';
		}		
  	}

}
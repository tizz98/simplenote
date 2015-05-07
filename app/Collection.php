<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model {

	public function getRGB()
	{
	   $hex = str_replace("#", "", $this->color);

	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   return implode(",", $rgb); // returns the rgb values separated by commas
	   //return $rgb; // returns an array with the rgb values
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'color', 'is_public'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function notes()
	{
		return $this->hasMany('App\Note');
	}
}

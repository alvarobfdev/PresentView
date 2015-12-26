<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class possibleanswers extends Sximo  {
	
	protected $table = 'app_possible_answers';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT app_possible_answers.* FROM app_possible_answers  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE app_possible_answers.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}

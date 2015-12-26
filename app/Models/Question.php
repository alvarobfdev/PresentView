<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class question extends Sximo  {
	
	protected $table = 'app_questions';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT app_questions.* FROM app_questions  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE app_questions.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}

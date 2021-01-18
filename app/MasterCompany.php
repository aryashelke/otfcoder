<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterCompany extends Model
{
	protected $table = "company";
	
    public function countryHasMany(){
    	return $this->hasMany("App\MasterCountry", "country_id");
    }

    public function countryHasOne(){
    	return $this->hasOne("App\MasterCountry", "id", "country_id");
    }
}

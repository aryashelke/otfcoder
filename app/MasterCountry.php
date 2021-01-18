<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterCountry extends Model
{
    protected $table = "country";

    public function getTable(){
    	return $this->table;
    }

    public function companyHasMany(){
    	$this->hasMany("App\MasterCompany", "company_id");
    }
}

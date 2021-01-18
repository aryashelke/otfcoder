<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\MasterCompany;
use App\MasterCountry;

class UserController extends Controller {
    
    /**
     * Get all the user list
     */
    public function index(Request $request){

    	$country_list = MasterCountry::get();
    	$country_id = $request['country_id'];
    	$user_list = User::with(["companyHasOne"]);

    	if (!is_null_or_empty($request["user_name"])) {
    		$user_list = $user_list->where("name", "LIKE", "%" . $request["user_name"] . "%");
    	}

    	$user_list = $user_list->get();

    	return view("welcome", [
    		"user_list" => $user_list,
    		"country_list" => $country_list,
    		"request" => $request,
    	]);
    }
}

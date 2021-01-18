<?php

use Illuminate\Database\Seeder;

use App\MasterCompany;

class CompanyInsertTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterCompany::insert([
        	"name" => "OTFCoder PVT LTD",
        	"country_id" => 1,
        ],
    	[
        	"name" => "ABC PVT LTD",
        	"country_id" => 1,
        ]);
    }
}

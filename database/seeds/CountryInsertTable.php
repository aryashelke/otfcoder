<?php

use Illuminate\Database\Seeder;

use App\MasterCountry;

class CountryInsertTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterCountry::insert([
        	"name" => "India"
        ]);
    }
}

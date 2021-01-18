<?php

use Illuminate\Database\Seeder;

use App\User;

class UserInsertTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	"name" => "Sachin Shelke",
        	"company_id" => 1
        ],
        [
        	"name" => "OTF Coder",
        	"company_id" => 2
        ]);
    }
}

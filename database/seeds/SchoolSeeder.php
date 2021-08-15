<?php

use App\Group;
use App\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        School::insert(
            [
                ['slug' => "school", 'name' => "school"],
                ['slug' => "maarifa", 'name' => "maarifa"],
                ['slug' => "supmti", 'name' => "supmti"]
            ]
        );
    }
}

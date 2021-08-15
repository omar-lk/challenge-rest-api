<?php

use App\Group;
use App\School;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Group::insert(
            [
                ['name' => "group1", 'school' => "school1"],
                ['name' => "group2", 'school' => "school1"],
                ['name' => "groupe3", 'school' => "school1"],
                ['name' => "group4", 'school' => "supmti"],
                ['name' => "group5", 'school' => "supmti"]
            ]
        );
    }
}

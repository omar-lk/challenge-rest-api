<?php

namespace App\Repositories;

use App\School;

class currentSchool
{
    public function currentSchool()
    {
        $url=config('app.url');
        $subdomain= explode('.',$url);
        $subdomain=array_shift($subdomain);
        
        $subdomain=str_replace('http://', '', $subdomain);
        $school=School::where('slug',$subdomain)->first();
        //dd($subdomain);
        return $school;
    }
}
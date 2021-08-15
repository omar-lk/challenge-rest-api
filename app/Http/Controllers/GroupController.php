<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades;
use App\Group;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\User;

class GroupController extends Controller
{
  //
  use ResponseTrait;

  public function getGroups()
  {
    $currentSchool = \SchoolFacade::currentSchool();
    $groups = Group::where('school', $currentSchool->slug)->get();
    return $this->success('list des groupes', $groups);
  }
  public function joinGroup(Request $request)
  {
    $data = $request->all();
    $user = User::find($data['user_id']);
    $group = Group::find($data['group_id']);

    if ($user->groups->contains($data['group_id']))
    return $this->failure('user already exist in this group');

    $user->groups()->attach($group);
    return $this->success('joined', null);
  }
}

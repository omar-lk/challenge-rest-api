<?php

namespace App\Http\Middleware;

use App\GroupUser;
use App\Http\Traits\ResponseTrait;
use Closure;


class isMember
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(GroupUser::where('user_id',$request->input('user_id'))
        ->where('group_id',$request->input('group_id'))->exists())
        {
        return $next($request);
        }
        return $this->failure('user not member in this group');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SecondTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $topic_id = $request->route('topic')->id;

        $topics = DB::table('tests')->where('user_id', $user->id)->pluck('topic_id');
        $topics = $topics->toArray();


        if (in_array($topic_id, $topics)) {

            return  redirect(app()->getLocale() . '/secondTime');
        }
        return $next($request);
    }
}

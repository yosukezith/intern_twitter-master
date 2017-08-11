<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * @return mixed
     */

    public function index()
{

    $user = \Auth::user();
    $tweets = Tweet::orderBy('id','desc')->get();

    $follower=Friendship::where('follower_id', '=', 'user->id')->get();
    $following=Friendship::where('followee_id', '=', 'user->id')->get();
    return view('home',compact('user','tweets','follower','following'));
}

    public function post_home(Request $request)
    {
        $this->validate($request, [
            'body' => ['required', 'string', 'max:191'],
            ]);

        \Auth::user()->tweets()->create($request->all());


        return redirect('/home');
    }

}

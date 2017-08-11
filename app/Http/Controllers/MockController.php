<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MockController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        $user = \Auth::user();
        return view('settings.account',compact('user'));
    }

    public function updateAccount(Request $request)
    {

        //$user->update()= \Auth::user();
        //dd(11111);
        $this->validate($request, [
//            'url_name' => [
//                'required',
//                'string',
//                'alpha_num',
//                'max:15',
//                Rule::unique('users'),
//                Rule::notIn($this->unavailableUrlNames()),
//            ],
//            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        \Auth::user()
            ->update([
//                'url_name' => $request->input('name'),
//                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

        $user = \Auth::user();
        return view('settings.account',compact('user'));
    }

    protected function unavailableUrlNames(): array
    {
        return ['home', 'login', 'settings', 'logout', 'register', 'password', 'profile', 'user'
            , 'search', 'following', 'followers', 'account', 'profile'];
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $user = \Auth::user();
        return view('settings.profile',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'display_name' => ['required', 'string', 'max:191'],
            //'description' => ['required', 'string', 'max:160'],
            ]);

        \Auth::user()
            ->update([
                'display_name' => $request->input('display_name'),
                //'avatar' => $request->input('avatar'),
                'description' =>$request->input('description'),
            ]);

        //return redirect('/settings/profile');
        $user = \Auth::user();
        return view('settings.profile',compact('user'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keyword =$request->keyword;
        $tweets = Tweet::query();
        //dd($query);
        //$user = user()->get();

        if(!empty($keyword)) {
//            $searchs = Tweet::where('body', 'like', '%$keyword%')
//                ->orderBy('id','desc');
                $tweets=Tweet::where('body', 'like', '%'.$keyword.'%')
                ->orderBy('id','desc')->get();
        }


//        $searchs= $query->orderBy('id','desc');
        //$searchs= $query;
        //dd($tweets);
        return view('search',compact('tweets','keyword'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user($id)
    {

        $user = User::where('id', '=', $id)->first();
        //$tweets = Tweet::where('user_id', '=', $id)->get();
        $tweets =Tweet::where('user_id', '=', $id)->orderBy('id','desc')->get();

        $login_user = \Auth::user();
        $friendship=Friendship::where('follower_id', '=', $id)
            ->where('followee_id', '=', $login_user->id);
        $follower=Friendship::where('follower_id', '=', $id)->get();
        $following=Friendship::where('followee_id', '=', $id)->get();

        //dd($user);
        return view('user.index',compact('user','login_user','tweets','friendship','follower','following'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function followed($id)
    {
        //dd($id);
        //$friendship=Friendship::where('follower_id', '=', $id)
//            ->where('followee_id', '=', \Auth::user()->id);


//        if($id!=$friendship->follower_id)
//        {
//            Friendship::create([
//                'follower_id' => $id,
//                'followee_id' => \Auth::user()->id,
//            ]);
//        }
//
//        else
//        {
//            Friendship::where('followee_id', '=', $id)->delete();
//        }
        Friendship::create([
                'follower_id' => $id,
                'followee_id' => \Auth::user()->id,
            ]);

        return redirect('/{$id}');
    }

    public function following()
    {
        return view('user.following');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function followers()
    {
        return view('user.followers');
    }
}

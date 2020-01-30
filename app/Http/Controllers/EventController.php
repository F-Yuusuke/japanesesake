<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Event_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //付け加えた


class EventController extends Controller
{
    public function index(Request $id)
    {
        $events = Event::with('event_user')->get();

        return view('events.index',['events' => $events]);
    }


    public function search(Request $request)
    {
        // return 'Hello World';
        // return view('student.list')->with('students',$students); 検索機能

        $events = Event::all();

        //キーワードを取得
        $keyword = $request->input('keyword');

          #もしキーワードがあったら
        if(!empty($keyword))
        {
            //イベントに入っているキーワードから検索
            $events = DB::table('events')
            ->where('name', 'like', '%'.$keyword.'%')
            ->orWhere('description', 'like', '%'.$keyword.'%')// 複数のカラムから参照したいときはorWhereで同じようにかく
            ->paginate(15); // これで検索結果を表示する数を決めれる

        }

        return view('events.index',['events' => $events]);
        // 'events.index'はここのURLに情報を返してくださいと言う事
    }


    public function apply(int $id)//申込
    {
        $event = Event::find($id);
        // $user = User::find($id);

        // return redirect()->route('event.apply');

        return view('events.apply', ['event' => $event]);
    }


    public function applyed(int $id, Request $request)//申込完了
    {
        $event_users = new Event_user();
        $event = Event_user::first();

        $event_users->Event_id = $request->eventid;
        $event_users->User_id = Auth::user()->id;
        $event_users->People_count = $request->People_count;
        $event_users->Special_comment = $request->Special_comment;

        // dd(Auth::user()->id, $id, $event,$event_users);

        $event_users->save();

        return redirect()->route('user.mypage')->with('message', 'booking confirmed');
    }

    public function cancel(int $id)
   {
        // $user = User::find($id);
        $event = Event_user::first();
        // dd($user);
        // dd(Auth::user()->id, $id, $event);

        if (Auth::user()->id !== $event->user_id) {
            abort(403);
        }

        // $events = Event::with('users')->get();

        //取得したデータを削除
        // dd($event_user);
        $event->delete();

        return redirect()->route('user.mypage');
    }
}

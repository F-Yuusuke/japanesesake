<?php

namespace App\Http\Controllers;

use App\Event;
use App\Owner;
use Illuminate\Support\Facades\Auth;
use App\Event_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //付け加えた


class EventController extends Controller
{
    public function index() //イベント一覧表示
    {
        $events = Event::all();

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


    public function event_apply(int $id)//申込
    {
        $event = Event::find($id);

        // return redirect()->route('event.apply');

        return view('events.apply', ['event' => $event]);
    }


    public function event_applyed(int $id, Request $request)//申込完了
    {
        $event_users = new Event_user();

        $event_users->User_id = $request->id;
        $event_users->Event_id = '000';//仮設id
        $event_users->People_count = '1';
        $event_users->Special_comment = $request->Special_comment;

        // dd($event_user);
        // $event_user = Event_user::where('id', $id)->with('event_user')->first();
        $event_users->save();

        return redirect()->route('event.index');
    }
}



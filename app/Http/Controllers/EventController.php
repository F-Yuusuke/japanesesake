<?php

namespace App\Http\Controllers;

use App\Event;
use App\Owner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //付け加えた

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('events.index',[
            'events' => $events,
            // 'keyword' => "kkkkk"
        ]);
    }
    public function event_create()//新規投稿
    {
        return view('events.create');
    }
    public function event_store(Request $request)//DBに保存
    {
        $events = new Event();

        $events->name = $request->name;
        $events->description = $request->description;
        $events->date = $request->date;
        $events->place = $request->place;
        $events->price = $request->price;
        $events->owner_id = Owner::owner()->id;
        $events->picture_path = $request->picture_path;
        $events->save();

        return redirect()->route('event.index');
    }
    // public function destroy(int $id)
    public function destroy(Event $event)
   {
    //    dd($event);
        //Diaryモデルを使用して、diariesテーブルから$idと一致するidをもつデータを取得
        // $event = Event::find($id);
        // dd($event);

        //取得したデータを削除
        $event->delete();

        return redirect()->route('event.index');
    }


    // 追加
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

    public function event_edit(int $id)
    {
        $event = Event::find($id);

        return view('events.edit', ['event' => $event]);//ここまでOK
    }
    public function event_update(int $id, Request $request)
    {
        $event = Event::find($id);

        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->place = $request->place;
        $event->price = $request->price;
        $event->picture_path = $request->picture_path;
        $event->save();

        return redirect()->route('event.index');
    }
}





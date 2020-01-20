<?php

namespace App\Http\Controllers;

use App\Event;
use App\Event_user;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('events.index',['events' => $events]);
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



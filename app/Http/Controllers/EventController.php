<?php

namespace App\Http\Controllers;

use App\Event;
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

        return view('events.create');//ここのURLをトップに変更
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
}



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



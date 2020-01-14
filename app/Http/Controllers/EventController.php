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


    // 追加
    public function search()
    {
        // return 'Hello World';
        // return view('student.list')->with('students',$students); 検索機能

        $events = Event::all();

        //キーワードを取得
        $keyword = $request->input('search');

          #もしキーワードがあったら
        if(!empty($keyword))
        {
        $query->where('event','like','%'.$keyword.'%')
        ->paginate(4);
        // ->orWhere('mail','like','%'.$keyword.'%');
        }

        return view('events.index',['events' => $events]);
    }

}



<?php

namespace App\Http\Controllers;

use App\Event;
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
            ->paginate(4);

        }

        return view('events.index',['events' => $events]);
        // 'events.index'はここのURLに情報を返してくださいと言う事
    }

}





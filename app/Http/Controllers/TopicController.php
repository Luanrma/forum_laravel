<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function index() 
    {   
        $topics = Topic::with('user')->get();
        
        return view('topics', [
            'topics' => $topics
        ]);
    }

    public function storeTopic(Request $request)
    {   
        if(Auth::check()) {
            $request->except(['_token']);
            
            $topic = new Topic();
            $topic->title = $request->title;
            $topic->question = $request->question;
            $topic->active = 1;
            $topic->user_id = Auth::user()->id;
            $topic->save();

            return redirect()->route('index.topics');
        } else {
            return redirect()->route('showRegister.user');
        }
    }

    public function showTopic($id)
    {
        $topic = self::selectTopic($id);
        
        $user = $topic->user()->first();
        
        $answers = $topic->answers()->with('user')->get();
        
        return view('topic-show', [
            'user' => $user,
            'topic' => $topic,
            'answers' => $answers
        ]);
    }

    public static function selectTopic($id)
    {
        $topic = Topic::where('topics.id', '=', $id)->first();
        
        return $topic;
    }

    public function createTopic()
    {   
        return view('topic-create');
    }

    public function editTopic($id)
    {
        $topic = self::selectTopic($id);

        return view('topic-edit', [
            'topic' => $topic
        ]);
    }

    public function updateTopic(Request $request)
    {
        if(Auth::check()) {
            $request->except(['_token']);

            $params = $request->all();
            $topic = Topic::find($request->id);

            //$topic->title    = $request->title;
            //$topic->question = $request->question;
            
            $topic->update($params);

            return redirect()->route('show.topic',['id' => $request->id]);
        } else {
            return redirect()->route('showRegister.user');
        }
    }

}

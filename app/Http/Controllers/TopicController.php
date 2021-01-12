<?php

namespace App\Http\Controllers;

use App\Models\Topic;
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
        $topic = Topic::where('topics.id', '=', $id)->first();
        
        $user = $topic->user()->first();
        
        $answers = $topic->answers()->with('user')->get();
       
        return view('show-topic', [
            'user' => $user,
            'topic' => $topic,
            'answers' => $answers
        ]);
    }

    public function selectTopic($id)
    {
        $topic = Topic::where('topics.id', '=', $id)->first();
        
        $user = $topic->user()->first();

        $answers = $topic->answers()->with('user')->get();
        
        return view('select-topic', [
            'user' => $user,
            'topic' => $topic,
            'answers' => $answers
        ]);
    }

    public function createTopic()
    {   
        return view('topic-create');
    }

    public function editTopic($id)
    {
        $topic = Topic::where('topics.id', '=', $id)->first(); 
    }

}

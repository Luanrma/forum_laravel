<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function index() 
    {   
        $topics = Topic::all();
        
        return view('topics', [
            'topics' => $topics
        ]);
    }

    public function storeTopic(Request $request)
    {
        $request->except(['_token']);
        
        $topic = new Topic();
        $topic->title = $request->title;
        $topic->question = $request->question;
        $topic->user_id = 1;
        $topic->save();
        
        return redirect()->route('index.topics');

    }

    public function selectTopic(Request $request)
    {
        $topic = Topic::find($request->id);

        return view('select-topic', [
            'topic' => $topic
        ]);
    }

    public function createTopic()
    {
        return view('topic-create');
    }

    public function user()
    {

        return $this->belongsTo(Topic::class);

    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Answer;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    

    public function storeAnswer(Request $request)
    {   
        if(Auth::check()) {
            $request->except(['_token']);
                 
            $topic = Topic::find($request->topic_id);
            $topic->count_answers = $topic->count_answers + 1;
            $topic->save();

            $answer = new Answer();
            $answer->user_id = Auth::user()->id;
            $answer->topic_id = $request->topic_id;
            
            $answer->response = $request->response;
            $answer->save();

            return redirect()->back();
        } else {
            return redirect()->route('showLogin.user');
        }
    }

    public static function selectAnswer($id)
    {
        return Answer::where('answers.id', '=', $id)->first();
    }

    public function editAnswer($id)
    {
        $answer = self::selectAnswer($id);

        return view('answer-edit', [
            'answer' => $answer
        ]);
    }

    public function updateAnswer(Request $request)
    {
        if(Auth::check()) {
            $request->except(['_token']);

            //$params = $request->all();
            $answer = Answer::find($request->id);
            $answer->response = $request->response;             
            $answer->save();

            return redirect()->route('show.topic',['id' => $request->id_topic]);
        } else {
            return redirect()->route('showLogin.user');
        }
    }
}

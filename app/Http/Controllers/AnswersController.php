<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    public function storeAnswer(Request $request)
    {   
        if(Auth::check()) {
            $request->except(['_token']);
            
            $answer = new Answer();
            $answer->user_id = Auth::user()->id;
            $answer->topic_id = $request->topic_id;
            $answer->title = $request->response;
            $answer->response = $request->response;
            $answer->save();

            return redirect()->back();
        } else {
            return redirect()->route('showRegister.user');
        }
    }
}

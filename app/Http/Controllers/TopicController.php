<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Auth;

class TopicController extends Controller
{
    public function store (Request $request)
    {
      $topic = new Topic;
      $topic->user_id = Auth::user()->id;
      $topic->title = $request->title;
      $topic->save();
      
      $request->session()->flash('message', 'Your topic has been created successfully');
      return redirect()->back();
    }
}

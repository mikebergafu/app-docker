<?php

namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecondaryContentController extends Controller
{
    public function index(){
        $title = 'Videos';
        return view('subscriber.pages.video-content', compact('title'));
    }
}

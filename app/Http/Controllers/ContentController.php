<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $content = Content::all()->groupBy('section');
        dd($content);
        return view('welcome',compact('content'));
    }
}

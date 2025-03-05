<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Section;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $sections = ['home', 'aboutus', 'features', 'services', 'pricing', 'testimonials', 'contact'];
        $contentData = [];

        foreach ($sections as $section) {
            $contentData[$section] = Content::where('section', $section)->get()->map(function ($item) {
                if (is_string($item->content)) {
                    $item->content = json_decode($item->content, true);
                }
                return $item;
            });
        }
        return view('welcome', ['contentData' => $contentData]); 
    } 

    public function admin()
    {
        return view('auth.login');
    }
}

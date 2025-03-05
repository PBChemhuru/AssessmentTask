<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $contentData = Content::where('section', 'home')->get()->map(function ($item) {
            if (is_string($item->content)) {
                $item->content = json_decode($item->content, true);
            }
            return $item;
        });
        return view('adminblades.home', compact('contentData'));
    }

    public function aboutus()
    {
        $contentData = Content::where('section', 'aboutus')->get()->map(function ($item) {
            if (is_string($item->content)) {
                $item->content = json_decode($item->content, true);
            }
            return $item;
        });
        return view('adminblades.aboutus', compact('contentData'));
    }

    public function features()
    {
        $contentData = Content::where('section', 'features')->get()->map(function ($item) {
            if (is_string($item->content)) {
                $item->content = json_decode($item->content, true);
            }
            return $item;
        });
        return view('adminblades.features', compact('contentData'));
    }

    public function services()
    {
        $contentData = Content::where('section', 'services')->get()->map(function ($item) {
            if (is_string($item->content)) {
                $item->content = json_decode($item->content, true);
            }
            return $item;
        });
        return view('adminblades.services', compact('contentData'));
    }

    public function pricing()
    {
        $contentData = Content::where('section', 'pricing')->get()->map(function ($item) {
            if (is_string($item->content)) {
                $item->content = json_decode($item->content, true);
            }
            return $item;
        });
        return view('adminblades.pricing', compact('contentData'));
    }

    public function testimonials()
    {
        $contentData = Content::where('section', 'testimonials')->get()->map(function ($item) {
            if (is_string($item->content)) {
                $item->content = json_decode($item->content, true);
            }
            return $item;
        })->groupBy('type');

        return view('adminblades.testimonials', compact('contentData'));
    }


    public function contactus()
    {
        $contentData = Content::where('section', 'contact')->get()->map(function ($item) {
            if (is_string($item->content)) {
                $item->content = json_decode($item->content, true);
            }
            return $item;
        });
        
        return view('adminblades.contactus', compact('contentData'));
    }

    public function update(Request $request, $section)
    {
        $contentData = Content::where('section', $section)->get();

        foreach ($contentData as $item) {
            $updatedContent = $request->input("content.{$item->id}", []);

            // Handle Founder Image Upload
            if ($item->type == 'profile' && $request->hasFile("content.{$item->id}.image")) {
                $file = $request->file("content.{$item->id}.image");
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $updatedContent['image'] = 'images/' . $filename;
            }

            // Handle Top & Bottom Image Uploads Separately
            if ($item->type == 'image' && isset($item->content['style']) && $request->hasFile("content.{$item->id}.src")) {
                $file = $request->file("content.{$item->id}.src");
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $updatedContent['src'] = 'images/' . $filename;
                $updatedContent['style'] = $item->content['style'];
            }

            // Handle Lists (Preserve structure)
            if ($item->type == 'list' && is_array($updatedContent)) {
                foreach ($updatedContent as $index => $listItem) {
                    $updatedContent[$index]['text'] = $listItem['text'] ?? '';
                }
            }

            // Ensure Content is Properly Encoded Before Saving
            $item->content = json_encode($updatedContent);
            $item->save();
        }

        return redirect()->back()->with('success', ucfirst($section) . ' section updated successfully.');
    }
}

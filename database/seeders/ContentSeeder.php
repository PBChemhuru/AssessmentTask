<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $homeSection = Section::where('name', 'home')->first();
        $aboutUsSection = Section::where('name', 'aboutus')->first();

        if ($homeSection) {
            $contents = [
                ['type' => 'text', 'content' => ['title' => 'Some Title']],
                ['type' => 'text', 'content' => ['subtitle' => 'Subtitle']],
                ['type' => 'text', 'content' => ['paragraph' => 'This is a paragraph of text']],
                ['type' => 'button', 'content' => ['text' => 'Get Started']],
                ['type' => 'video_text', 'content' => ['text' => 'Play Video']],
                ['type' => 'image', 'content' => ['src' => 'images/istockphoto-1308949444-1024x1024.jpg']],
                ['type' => 'stats', 'content' => [
                    ['title' => '3x Won Awards', 'description' => 'List of awards'],
                    ['title' => '6.5k Hires', 'description' => 'List of hires'],
                    ['title' => '80K Something', 'description' => 'Worldwide'],
                    ['title' => '6x More Things', 'description' => 'All the things'],
                ]],
            ];

            foreach ($contents as $content) {
                Content::create([
                    'section_id' => $homeSection->id,
                    'type' => $content['type'],
                    'content' => $content['content'],
                ]);
            }
        }

        if ($aboutUsSection) {
            $contents = [
                ['type' => 'text', 'content' => ['title' => 'MORE ABOUT US']],
                ['type' => 'text', 'content' => ['heading' => 'OUR GOALS OR SOMETHING LIKE THAT']],
                ['type' => 'text', 'content' => ['subheading' => 'What has inspired us to be the way we are']],
                ['type' => 'list', 'content' => [
                    ['text' => 'this'],
                    ['text' => 'this thing'],
                    ['text' => 'this other thing'],
                    ['text' => 'this'],
                    ['text' => 'this thing'],
                    ['text' => 'this other thing'],
                ]],
                ['type' => 'image', 'content' => ['src' => 'images/istockphoto-1308949444-1024x1024.jpg']],
                ['type' => 'profile', 'content' => [
                    'name' => 'Mario Smith',
                    'role' => 'CEO & Founder',
                    'image' => 'images/istockphoto-1308949444-1024x1024.jpg'
                ]],
                ['type' => 'contact', 'content' => [
                    'label' => 'Call us anytime',
                    'phone' => '+123456-789'
                ]],
                ['type' => 'image_gallery', 'content' => [
                    ['src' => 'images/istockphoto-1308949444-1024x1024.jpg', 'style' => 'large'],
                    ['src' => 'images/istockphoto-1308949444-1024x1024.jpg', 'style' => 'small']
                ]]
            ];

            foreach ($contents as $content) {
                Content::create([
                    'section_id' => $aboutUsSection->id,
                    'type' => $content['type'],
                    'content' => $content['content'],
                ]);
            }
        }

        
    }
}

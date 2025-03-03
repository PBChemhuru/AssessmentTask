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
    }
}

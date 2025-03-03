@php
$homeContents = App\Models\Section::where('name', 'home')->first()->contents;
@endphp

<section id="home" class="diagonal-section d-flex flex-column min-vh-100">
    <div class="container mt-5 flex-grow-1 d-flex align-items-start">
        <div class="row">
            <div class="col-5">
                <div class="container mt-2 ms-0 mb-3" style="max-width:65%;">
                    <div class="workingforyou fs-5 fw-bold d-flex align-items-center">
                        <i class="bi bi-gear-fill p-4" style="color:#0c76f0; font-size: 2rem;"></i>
                        Working for your success
                    </div>
                    <h1 class="text-start fs-1">
                        {{ $homeContents->where('type', 'text')->where('content->title')->first()?->content['title'] ?? 'Default Title' }}
                    </h1>
                    <h2 class="text-start fs-3">
                        {{ $homeContents->where('type', 'text')->where('content->subtitle')->first()?->content['subtitle'] ?? 'Default Subtitle' }}
                    </h2>
                    <p class="text-start fs-5">
                        {{ $homeContents->where('type', 'text')->where('content->paragraph')->first()?->content['paragraph'] ?? 'Default paragraph' }}
                    </p>
                    <div class="d-flex align-items-center">
                        <button class="btn text-white fs-5 px-4 py-3" style="background:#0c76f0; border-radius:25px;">
                            {{ $homeContents->where('type', 'button')->first()?->content['text'] ?? 'Get Started' }}
                        </button>
                        <p class="mt-3 d-flex align-items-center mb-0 ms-4 fs-5">
                            <i class="bi bi-play-circle me-2" style="font-size: 1.8rem;"></i>
                            {{ $homeContents->where('type', 'video_text')->first()?->content['text'] ?? 'Play Video' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <img src="{{ asset($homeContents->where('type', 'image')->first()?->content['src'] ?? 'default.jpg') }}" style="width:100%"> 
            </div>
        </div>
    </div>

    <div class="container my-4 shadow-lg align-items-center p-4 rounded-3 bg-white" style="min-width: 85%; height: 20vh;">
        <div class="row h-100 align-items-center">
            @foreach ($homeContents->where('type', 'stats')->first()?->content ?? [] as $stat)
                <div class="col">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-trophy p-4" style="background: #a6cbf7; color:#0c76f0; border-radius:50%; font-size: 2rem;"></i>
                        <div class="m-4">
                            <h1 class="fs-4">{{ $stat['title'] }}</h1>
                            <h3 class="fw-normal fs-5">{{ $stat['description'] }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

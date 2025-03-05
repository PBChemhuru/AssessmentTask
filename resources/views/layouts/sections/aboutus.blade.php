@php
$aboutContents = $contentData['aboutus'] ?? collect();
$aboutText = $aboutContents->where('type', 'text')->pluck('content')->collapse();
$aboutTitle = $aboutText['title'] ?? 'MORE ABOUT US';
$aboutHeading = $aboutText['heading'] ?? 'OUR GOALS OR SOMETHING LIKE THAT';
$aboutSubheading = $aboutText['subheading'] ?? 'What has inspired us to be the way we are';
$listItems = $aboutContents->where('type', 'list')->first()?->content ?? [];
$half = ceil(count($listItems) / 2);
$founder = $aboutContents->where('type', 'profile')->first()?->content ?? [
    'name' => 'Mario Smith', 
    'role' => 'CEO & Founder', 
    'image' => 'images/default-founder.jpg'
];
$phone = optional($aboutContents->where('type', 'contact')->first())->content['phone'] ?? '+123456-789';
$topImage = optional($aboutContents->where('type', 'image')->firstWhere('content.style', 'top'))->content['src'] ?? 'images/default-main.jpg';
$bottomImage = optional($aboutContents->where('type', 'image')->firstWhere('content.style', 'bottom'))->content['src'] ?? 'images/default-small.jpg';
@endphp

<section id="aboutus" class="bg-white d-flex flex-column min-vh-100">
    <div class="container mt-5 flex-grow-1 d-flex align-items-center">
        <div class="row min-vh-100 w-100 align-items-center">
            <div class="col-md-6 pe-md-5">
                <h2>{{ $aboutTitle }}</h2>
                <h1>{{ $aboutHeading }}</h1>
                <h3>{{ $aboutSubheading }}</h3>

                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            @foreach(array_slice($listItems, 0, $half) as $point)
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill me-2 text-primary"></i> 
                                    <span>{{ $point['text'] ?? $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            @foreach(array_slice($listItems, $half) as $point)
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill me-2 text-primary"></i> 
                                    <span>{{ $point['text'] ?? $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="d-flex flex-row align-items-center">
                        <!-- Founder Info -->
                        <div class="d-flex align-items-center me-4">
                            <img src="{{ asset($founder['image']) }}" class="rounded-circle" 
                                style="width: 100px; height: 100px;">
                            <div class="ms-3">
                                <h1 class="fs-5 mb-1">{{ $founder['name'] }}</h1>
                                <h2 class="fs-6">{{ $founder['role'] }}</h2>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="d-flex align-items-center shadow-lg p-3 rounded-2 bg-light" style="width: 400px">
                            <i class="bi bi-telephone-fill fs-3 text-primary me-3"></i>
                            <div>
                                <h3 class="fs-6 mb-1">Call us anytime</h3>
                                <p class="fw-bolder fs-5 mb-0">{{ $phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Overlapping Images -->
            <div class="col-md-6 text-center">
                <div class="position-relative d-inline-block">
                    <img src="{{ asset($bottomImage) }}" class="img-fluid rounded-3 shadow-lg" 
                        style="width: 350px;">
                    <img src="{{ asset($topImage) }}" 
                        class="position-absolute top-50 start-0 translate-middle rounded-3 shadow-lg" 
                        style="width: 180px;">
                </div>
            </div>
        </div>
    </div>
</section>

@php
$testimonials = $contentData['testimonials']->where('type', 'testimonial')->map(function ($testimonial) {
    return [
        'quote' => $testimonial->content['quote'] ?? 'This service changed everything for us!',
        'author' => $testimonial->content['author'] ?? 'John Doe',
        'role' => $testimonial->content['role'] ?? 'CEO & Founder',
        'image' => $testimonial->content['image'] ?? 'images/default-user.jpg',
        'rating' => $testimonial->content['rating'] ?? 5,
    ];
});
$stats = $contentData['testimonials']->where('type', 'stats')->first()?->content ?? [];
$defaultStats = [
    ['label' => 'Clients', 'value' => 232],
    ['label' => 'Projects', 'value' => 521],
    ['label' => 'Hours Of Support', 'value' => 1453],
    ['label' => 'Workers', 'value' => 32],
];
$stats = !empty($stats) ? $stats : $defaultStats;
@endphp

<section id="testimonials" style="background-color: #9ac0eb">
    <h1 class="text-black text-center">Testimonials</h1>
    <p class="text-black text-center">Don't just take our word, read what previous clients thought</p>

    <div class="container">
        <div class="row mb-5">
            @foreach($testimonials as $testimonial)
                <div class="col-md-6 mb-4">
                    <div class="bg-white shadow-lg p-3 rounded-3">
                        <div class="d-flex align-content-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="images\1741205796_photo-1575936123452-b67c3203c357.jpeg" 
                                    style="border-radius: 50%; width:100px; height:100px">
                            </div>
                            <div class="ms-3">
                                <p class="mb-1 fw-bold">{{ $testimonial['author'] }}</p>
                                <p class="text-muted">{{ $testimonial['role'] }}</p>
                                @for($i = 0; $i < $testimonial['rating']; $i++)
                                    <i class="bi bi-star-fill" style="color:gold"></i>
                                @endfor
                            </div>
                        </div>
                        <div class="m-3 d-flex align-items-center">
                            <i class="bi bi-quote" style="color: #9ac0eb; font-size: 1.5rem;"></i>
                            <p class="px-3">{{ $testimonial['quote'] }}</p>
                            <i class="bi bi-quote" style="transform: rotate(180deg); color: #9ac0eb; font-size: 1.5rem;"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="bg-white text-dark py-5">
        <div class="container-fluid text-center">
            <div class="row">
                @foreach($stats as $stat)
                    <div class="col-md-3">
                        <h1 class="fw-bold">{{ $stat['value'] }}</h1>
                        <hr class="mx-auto" style="width: 30px; border: 2px solid blue;">
                        <p>{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </footer>
</section>

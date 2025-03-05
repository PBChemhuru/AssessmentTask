@php
$pricingPlans = $contentData['pricing']->where('type', 'pricing_plan')->map(function ($plan) {
    return [
        'title' => $plan->content['title'] ?? 'Default Plan',
        'price' => $plan->content['price'] ?? '$0/month',
        'description' => $plan->content['description'] ?? 'No description available.',
        'features' => $plan->content['features'] ?? ['Feature 1', 'Feature 2'],
        'button_text' => $plan->content['button_text'] ?? 'Buy Now',
        'button_color' => $plan->content['button_color'] ?? '#0c76f0',
        'is_popular' => $plan->content['is_popular'] ?? false,
    ];
});
$faqContent = $contentData['pricing']->where('type', 'faq')->first()?->content ?? [];
$faqTitle = $faqContent['title'] ?? 'Have a question? Check out the FAQ';
$faqDescription = $faqContent['description'] ?? 'List of asked questions';
$faqQuestions = $faqContent['questions'] ?? [];
$ctaContent = $contentData['pricing']->where('type', 'cta')->first()?->content ?? [];
$ctaMessage = $ctaContent['message'] ?? 'All the things you need to do to succeed';
$ctaDescription = $ctaContent['description'] ?? 'This is where to take action';
$ctaButtonText = $ctaContent['button_text'] ?? 'Call To Action';
$ctaButtonColor = $ctaContent['button_color'] ?? '#62a2ec';
$ctaBorderColor = $ctaContent['button_border'] ?? 'white';
@endphp

<section id="pricing" style="background-color: #9ac0eb">
    <h1 class="text-white text-center">Pricing</h1>
    <p class="text-white text-center">Check out our pricing plans.</p>

    <div class="row m-1 w-100">
        @foreach($pricingPlans as $plan)
            <div class="col m-1 rounded shadow-md 
                {{ $plan['is_popular'] ? 'bg-primary text-white position-relative' : 'bg-white text-black' }}">
                
                @if($plan['is_popular'])
                    <div class="position-absolute top-0 start-50 translate-middle px-3 py-1 fw-bold rounded-pill shadow-sm"
                        style="background-color: white; color: #0c76f0; width: 30%; align-self: center;">
                        Most Popular
                    </div>
                @endif

                <div class="mt-3 p-3">
                    <h2 class="{{ $plan['is_popular'] ? 'text-white' : 'text-black' }}">{{ $plan['title'] }}</h2>
                    <h3 class="{{ $plan['is_popular'] ? 'text-white' : 'text-black' }}">{{ $plan['price'] }}</h3>
                    <p class="{{ $plan['is_popular'] ? 'text-white' : 'text-black' }}">{{ $plan['description'] }}</p>
                    
                    <h2 class="{{ $plan['is_popular'] ? 'text-white' : 'text-black' }}">Features included:</h2>
                    <ul class="list-unstyled">
                        @foreach($plan['features'] as $feature)
                            <li class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill me-2" style="color: {{ $plan['is_popular'] ? 'white' : '#0c76f0' }}"></i>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                    
                    <button class="btn w-100 mt-2" 
                        style="background-color: {{ $plan['button_color'] }};
                               color: {{ $plan['is_popular'] ? '#0c76f0' : 'white' }};
                               border-radius: 8px;">
                        {{ $plan['button_text'] }} <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row m-1 w-100">
        <div class="col text-center">
            <h1 class="text-white">{{ $faqTitle }}</h1>
            <p class="text-white">{{ $faqDescription }}</p>
        </div>
        <div class="col">
            <div class="accordion" id="accordionExample">
                @foreach($faqQuestions as $index => $question)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                {{ $question['question'] }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>{{ $question['answer'] }}</strong>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row my-2 bg-primary w-100 mx-0 py-4" style="height: fit-content">
        <div class="container w-100 text-center">
            <p class="text-white fs-4 fst-italic">{{ $ctaMessage }}</p>
            <p class="text-white fs-5">{{ $ctaDescription }}</p>
            <button class="btn" style="background: {{ $ctaButtonColor }}; border-color: {{ $ctaBorderColor }}; border-style: solid; color: white;">
                {{ $ctaButtonText }}
            </button>
        </div>
    </div>
</section>

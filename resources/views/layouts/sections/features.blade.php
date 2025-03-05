<section id="features" class="bg-white">
    <div class="container">
        @php
            $features = $contentData['features'] ?? collect();
            $featureText = $features->firstWhere('type', 'text');
            $itemsWithIcons = $features->where('type', 'text')->whereNotNull('content.items_with_icons')->pluck('content.items_with_icons')->flatten(1);
            $featureBoxes = $features->firstWhere('type', 'feature_boxes')->content['feature_boxes'] ?? [];
            $imageGallery = $features->firstWhere('type', 'image_gallery')->content['images'] ?? [];
            $cta = $features->firstWhere('type', 'text')->content ?? [];
        @endphp

        <h1>{{ $featureText['title'] ?? 'Features' }}</h1>
        <p>{{ $featureText['description'] ?? 'Explore our awesome features.' }}</p>

        <!-- Segmented Control for Features -->
        <div class="d-flex justify-content-center mt-5">
            <div class="segmented-control">
                @foreach ($itemsWithIcons as $index => $item)
                    <div class="segmented-option {{ $index === 0 ? 'selected' : '' }}" data-target="feature-set-{{ $index + 1 }}">
                        {{ $item['name'] }}
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Feature Sections -->
        @foreach ($itemsWithIcons as $index => $item)
            <div class="feature-set {{ $index !== 0 ? 'd-none' : '' }}" id="feature-set-{{ $index + 1 }}">
                <div class="row my-2">
                    <div class="col-6">
                        <h1>{{ $item['title'] }}</h1>
                        <h3>{{ $item['subheading'] ?? 'Subheading Placeholder' }}</h3>
                        <ul class="list-unstyled">
                            @foreach ($item['list'] as $listItem)
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-check2-all" style="color: #0c76f0"></i>
                                    <span>{{ $listItem['text'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <p style="float: left">{{ $item['scroll_text'] ?? 'Additional text here' }}</p>
                    </div>
                    <div class="col-6">
                        <img src="{{ $item['image'] ?? 'images/placeholder.jpg' }}" class="img-fluid" style="width: 300px;height:120px; border-radius: 10px;">
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Feature Boxes -->
        <div class="row my-2">
            @foreach ($featureBoxes as $box)
                <div class="col m-1 p-1 rounded" style="background: {{ $box['background_color'] }}">
                    <i class="bi {{ $box['icon'] }}" style="color: {{ $box['icon_color'] }}"></i>
                    <div>
                        <h1 style="font-size: 20px">{{ $box['title'] }}</h1>
                        <p>{{ $box['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Call to Action Section -->
        <div class="row my-2 bg-primary rounded">
            <div class="container m-2">
                <p style="color: white">{{ $cta['cta_text'] ?? 'All the things you need to do to succeed' }}</p>
                <p style="color: white">{{ $cta['cta_subtext'] ?? 'This is where to take action' }}</p>
                <button style="{{ $cta['cta_button_style'] ?? 'background: #62a2ec;border-color:white;border-style:solid' }}">
                    {{ $cta['cta_button_text'] ?? 'Call To Action' }}
                </button>
            </div>
        </div>

        <!-- Image Gallery -->
        <div class="row my-2">
            <div class="container my-4 align-items-center p-4 bg-white" style="min-width: 85%; height: 20vh;">
                <div class="row h-100 align-items-center">
                    @foreach ($imageGallery as $image)
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <img src="{{ $image['src'] }}" class="img-fluid" style="width: 300px;height:120px; border-radius: 10px; filter:grayscale(100%)">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Loader -->
        <div class="row my-2">
            <div class="loader">
                @for ($i = 0; $i < 9; $i++)
                    <div class="dot {{ $i === 0 ? 'chosen' : '' }}"></div>
                @endfor
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.segmented-option').forEach(item => {
            item.addEventListener('click', () => {
                document.querySelector('.selected').classList.remove('selected');
                item.classList.add('selected');

                document.querySelectorAll('.feature-set').forEach(set => set.classList.add('d-none'));
                document.getElementById(item.getAttribute('data-target')).classList.remove('d-none');
            });
        });

        document.querySelectorAll('.dot').forEach(item => {
            item.addEventListener('click', () => {
                document.querySelector('.chosen').classList.remove('chosen');
                item.classList.add('chosen');
            });
        });
    </script>
</section>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Features Section') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 50rem;">
            <form method="POST" action="{{ route('admin.update', 'features') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @foreach ($contentData as $item)
                    <div class="mb-3">
                        <label class="form-label">{{ ucfirst($item->type) }}</label>

                        @php
                            $content = $item->content;
                        @endphp

                        <!-- Title & Description -->
                        @if ($item->type == 'text')
                            @if(isset($content['title']))
                                <input type="text" name="content[{{ $item->id }}][title]" class="form-control mb-2" value="{{ $content['title'] }}" placeholder="Title">
                            @endif
                            @if(isset($content['description']))
                                <input type="text" name="content[{{ $item->id }}][description]" class="form-control" value="{{ $content['description'] }}" placeholder="Description">
                            @endif

                        <!-- Feature Items with Icons -->
                        @elseif ($item->type == 'list' && isset($content['items_with_icons']))
                            <div class="mb-3">
                                <label class="form-label">Feature Items</label>
                                @foreach ($content['items_with_icons'] as $index => $feature)
                                    <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][items_with_icons][{{ $index }}][name]" value="{{ $feature['name'] }}" placeholder="Feature Name">
                                    <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][items_with_icons][{{ $index }}][title]" value="{{ $feature['title'] }}" placeholder="Feature Title">
                                    <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][items_with_icons][{{ $index }}][subheading]" value="{{ $feature['subheading'] ?? '' }}" placeholder="Subheading">
                                    <input type="file" class="form-control" name="content[{{ $item->id }}][items_with_icons][{{ $index }}][image]">
                                    @if (!empty($feature['image']))
                                        <div class="text-center mt-2">
                                            <img src="{{ asset($feature['image']) }}" class="rounded" style="width: 100%; max-width: 300px;">
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                        <!-- Feature Boxes -->
                        @elseif ($item->type == 'feature_boxes' && isset($content['feature_boxes']))
                            <div class="mb-3">
                                <label class="form-label">Feature Boxes</label>
                                @foreach ($content['feature_boxes'] as $index => $box)
                                    <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][feature_boxes][{{ $index }}][title]" value="{{ $box['title'] }}" placeholder="Feature Box Title">
                                    <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][feature_boxes][{{ $index }}][text]" value="{{ $box['text'] }}" placeholder="Feature Box Text">
                                    <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][feature_boxes][{{ $index }}][icon]" value="{{ $box['icon'] }}" placeholder="Icon Class (e.g., bi-star)">
                                    <input type="color" class="form-control mb-2" name="content[{{ $item->id }}][feature_boxes][{{ $index }}][background_color]" value="{{ $box['background_color'] }}">
                                    <input type="color" class="form-control mb-2" name="content[{{ $item->id }}][feature_boxes][{{ $index }}][icon_color]" value="{{ $box['icon_color'] }}">
                                @endforeach
                            </div>

                        <!-- Call To Action -->
                        @elseif ($item->type == 'text' && isset($content['cta_text']))
                            <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][cta_text]" value="{{ $content['cta_text'] }}" placeholder="CTA Text">
                            <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][cta_subtext]" value="{{ $content['cta_subtext'] }}" placeholder="CTA Subtext">
                            <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][cta_button_text]" value="{{ $content['cta_button_text'] }}" placeholder="CTA Button Text">

                        <!-- Image Gallery -->
                        @elseif ($item->type == 'image_gallery' && isset($content['images']))
                            <div class="mb-3">
                                <label class="form-label">Image Gallery</label>
                                @foreach ($content['images'] as $index => $image)
                                    <input type="file" name="content[{{ $item->id }}][images][{{ $index }}][src]" class="form-control mb-2">
                                    <img src="{{ asset($image['src']) }}" class="img-fluid mt-2" width="100">
                                @endforeach
                            </div>

                        <!-- Default Input for Any Other Type -->
                        @elseif (is_array($content))
                            @foreach ($content as $key => $value)
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][{{ $key }}]" value="{{ $value }}">
                            @endforeach
                        @else
                            <input type="text" class="form-control" name="content[{{ $item->id }}]" value="{{ $content }}">
                        @endif
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Features Section</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Testimonials Section') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 50rem;">
            <form method="POST" action="{{ route('admin.update', 'testimonials') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($contentData->isEmpty())
                    <p class="text-danger text-center">No data found for the Testimonials section.</p>
                @else
                    <!-- Header Section -->
                    @if(isset($contentData['header']))
                        @foreach ($contentData['header'] as $item)
                            <div class="border p-3 rounded mb-3">
                                <label class="form-label fw-bold">Title</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][title]"
                                       value="{{ $item->content['title'] ?? '' }}" placeholder="Title">

                                <label class="form-label fw-bold">Subtitle</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][subtitle]"
                                       value="{{ $item->content['subtitle'] ?? '' }}" placeholder="Subtitle">

                                <label class="form-label fw-bold">Background Color</label>
                                <input type="color" class="form-control form-control-color mb-2"
                                       name="content[{{ $item->id }}][background_color]"
                                       value="{{ $item->content['background_color'] ?? '#ffffff' }}" title="Pick a color">
                            </div>
                        @endforeach
                    @endif

                    <!-- Testimonials -->
                    @if(isset($contentData['testimonial']))
                        @foreach ($contentData['testimonial'] as $item)
                            <div class="border p-3 rounded mb-3">
                                <label class="form-label fw-bold">Quote</label>
                                <textarea class="form-control mb-2" name="content[{{ $item->id }}][quote]"
                                          placeholder="Testimonial Quote">{{ $item->content['quote'] ?? '' }}</textarea>

                                <label class="form-label fw-bold">Author</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][author]"
                                       value="{{ $item->content['author'] ?? '' }}" placeholder="Author Name">

                                <label class="form-label fw-bold">Role</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][role]"
                                       value="{{ $item->content['role'] ?? '' }}" placeholder="Author Role">

                                <label class="form-label fw-bold">Rating</label>
                                <input type="number" class="form-control mb-2" name="content[{{ $item->id }}][rating]"
                                       value="{{ $item->content['rating'] ?? '5' }}" min="1" max="5" placeholder="Rating">

                                <label class="form-label fw-bold">Current Image</label>
                                @if (!empty($item->content['image']))
                                    <div class="text-center mt-2">
                                        <img src="{{ asset($item->content['image']) }}" alt="Testimonial Image" class="rounded"
                                             style="width: 100%; max-width: 200px;">
                                    </div>
                                @endif

                                <label class="form-label fw-bold">Upload New Image</label>
                                <input type="file" class="form-control mb-2" name="content[{{ $item->id }}][image]">
                            </div>
                        @endforeach
                    @endif

                    <!-- Statistics -->
                    @if(isset($contentData['stats']))
                        @foreach ($contentData['stats'] as $item)
                            <div class="border p-3 rounded mb-3">
                                <label class="form-label fw-bold">Statistics</label>
                                @foreach ($item->content as $index => $stat)
                                    <div class="mb-2">
                                        <input type="text" class="form-control mb-2"
                                               name="content[{{ $item->id }}][{{ $index }}][label]"
                                               value="{{ $stat['label'] ?? '' }}" placeholder="Stat Label">
                                        <input type="number" class="form-control"
                                               name="content[{{ $item->id }}][{{ $index }}][value]"
                                               value="{{ $stat['value'] ?? '' }}" placeholder="Stat Value">
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                @endif

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Testimonials Section</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

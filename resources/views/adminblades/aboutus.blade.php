<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit About Us Section') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 50rem;">
            <form method="POST" action="{{ route('admin.update', 'aboutus') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @foreach ($contentData as $item)
                    <div class="mb-3">
                        <label class="form-label">{{ ucfirst($item->type) }}</label>

                        @php
                            $content = $item->content;
                        @endphp

                        <!-- Title, Heading & Subheading -->
                        @if ($item->type == 'text')
                            @if(isset($content['title']))
                                <input type="text" name="content[{{ $item->id }}][title]" class="form-control mb-2" value="{{ $content['title'] }}" placeholder="Title">
                            @endif
                            @if(isset($content['heading']))
                                <input type="text" name="content[{{ $item->id }}][heading]" class="form-control mb-2" value="{{ $content['heading'] }}" placeholder="Heading">
                            @endif
                            @if(isset($content['subheading']))
                                <input type="text" name="content[{{ $item->id }}][subheading]" class="form-control" value="{{ $content['subheading'] }}" placeholder="Subheading">
                            @endif

                        <!-- Key Points List -->
                        @elseif ($item->type == 'list' && is_array($content))
                            <div class="mb-3">
                                <label class="form-label">Key Points</label>
                                @foreach ($content as $index => $listItem)
                                    <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][{{ $index }}][text]" value="{{ $listItem['text'] ?? '' }}" placeholder="Key Point">
                                @endforeach
                            </div>

                        <!-- Founder Information -->
                        @elseif ($item->type == 'profile')
                            <div class="mb-3">
                                <label class="form-label">Founder Name</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][name]" value="{{ $content['name'] ?? '' }}" placeholder="Founder Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Founder Role</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][role]" value="{{ $content['role'] ?? '' }}" placeholder="Founder Role">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Founder Image</label>
                                <input type="file" class="form-control" name="content[{{ $item->id }}][image]" required>
                                @if (!empty($content['image']))
                                    <div class="text-center mt-2">
                                        <img src="{{ asset($content['image']) }}" alt="Founder Image" class="rounded-circle" style="width: 150px;">
                                    </div>
                                @endif
                            </div>

                        <!-- Contact Information -->
                        @elseif ($item->type == 'contact')
                            <div class="mb-3">
                                <label class="form-label">Contact Phone</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][phone]" value="{{ $content['phone'] ?? '' }}" placeholder="Phone Number">
                            </div>

                        <!-- Overlapping Images (Top & Bottom) -->
                        @elseif ($item->type == 'image' && isset($content['style']))
                            <div class="mb-3">
                                <label class="form-label">
                                    {{ $content['style'] == 'top' ? 'Top Image' : 'Bottom Image' }}
                                </label>
                                <input type="file" name="content[{{ $item->id }}][src]" class="form-control" required>
                                @if (!empty($content['src']))
                                    <div class="text-center mt-2">
                                        <img src="{{ asset($content['src']) }}" class="img-fluid rounded shadow-lg" width="150">
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update About Us Section</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Contact Us Section') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 50rem;">
            <form method="POST" action="{{ route('admin.update', 'contact') }}">
                @csrf
                @method('PUT')

                @if ($contentData->isEmpty())
                    <p class="text-danger text-center">No data found for the Contact Us section.</p>
                @else
                    @foreach ($contentData as $item)
                        <div class="mb-3">
                            <label class="form-label">{{ ucfirst(str_replace('_', ' ', $item->type)) }}</label>

                            @php
                                $content = is_string($item->content) ? json_decode($item->content, true) : $item->content;
                            @endphp

                            <!-- Contact Title & Subtitle -->
                            @if ($item->type == 'text')
                                <div class="border p-3 rounded mb-3">
                                    @if (isset($content['title']))
                                        <label class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][title]"
                                               value="{{ $content['title'] ?? '' }}" placeholder="Title">
                                    @endif

                                    @if (isset($content['subtitle']))
                                        <label class="form-label fw-bold">Subtitle</label>
                                        <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][subtitle]"
                                               value="{{ $content['subtitle'] ?? '' }}" placeholder="Subtitle">
                                    @endif
                                </div>

                            <!-- Contact Information -->
                            @elseif ($item->type == 'contact_info')
                                <div class="border p-3 rounded mb-3">
                                    @foreach ($content as $index => $info)
                                        <div class="mb-2">
                                            <label class="form-label fw-bold">{{ ucfirst($info['label']) }}</label>
                                            <input type="text" class="form-control" name="content[{{ $item->id }}][{{ $index }}][value]"
                                                   value="{{ $info['value'] ?? '' }}" placeholder="{{ $info['label'] }}">
                                            <input type="hidden" name="content[{{ $item->id }}][{{ $index }}][label]"
                                                   value="{{ $info['label'] }}">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Contact Us Section</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

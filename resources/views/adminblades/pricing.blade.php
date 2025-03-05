<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pricing Section') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 50rem;">
            <form method="POST" action="{{ route('admin.update', 'pricing') }}">
                @csrf
                @method('PUT')

                @foreach ($contentData as $item)
                    <div class="mb-3">
                        <label class="form-label">{{ ucfirst(str_replace('_', ' ', $item->type)) }}</label>

                        @php
                            $content = is_string($item->content) ? json_decode($item->content, true) : $item->content;
                        @endphp

                        <!-- Pricing Plans -->
                        @if ($item->type == 'pricing_plan')
                            <div class="border p-3 rounded mb-3">
                                <label class="form-label fw-bold">Plan Name</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][title]"
                                       value="{{ $content['title'] ?? '' }}" placeholder="Plan Name">

                                <label class="form-label fw-bold">Price</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][price]"
                                       value="{{ $content['price'] ?? '' }}" placeholder="Price">

                                <label class="form-label fw-bold">Description</label>
                                <textarea class="form-control mb-2" name="content[{{ $item->id }}][description]"
                                          placeholder="Plan Description">{{ $content['description'] ?? '' }}</textarea>

                                <label class="form-label fw-bold">Features (Comma Separated)</label>
                                <textarea class="form-control mb-2" name="content[{{ $item->id }}][features]"
                                          placeholder="Feature List">{{ isset($content['features']) ? implode(", ", $content['features']) : '' }}</textarea>

                                <label class="form-label fw-bold">Button Text</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][button_text]"
                                       value="{{ $content['button_text'] ?? 'Buy Now' }}" placeholder="Button Text">

                                <label class="form-label fw-bold">Button Color</label>
                                <input type="color" class="form-control form-control-color mb-2"
                                       name="content[{{ $item->id }}][button_color]"
                                       value="{{ $content['button_color'] ?? '#0c76f0' }}" title="Pick a color">

                                <label class="form-label fw-bold">Is Popular?</label>
                                <select class="form-control" name="content[{{ $item->id }}][is_popular]">
                                    <option value="1" {{ !empty($content['is_popular']) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ empty($content['is_popular']) ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                        <!-- FAQ Section -->
                        @elseif ($item->type == 'faq')
                            <div class="border p-3 rounded mb-3">
                                <label class="form-label fw-bold">FAQ Title</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][title]"
                                       value="{{ $content['title'] ?? '' }}" placeholder="FAQ Title">

                                <label class="form-label fw-bold">FAQ Description</label>
                                <textarea class="form-control mb-2" name="content[{{ $item->id }}][description]"
                                          placeholder="FAQ Description">{{ $content['description'] ?? '' }}</textarea>

                                <label class="form-label fw-bold">FAQ Questions</label>
                                @foreach ($content['questions'] ?? [] as $index => $question)
                                    <div class="border p-2 rounded mb-2">
                                        <input type="text" class="form-control mb-2" 
                                               name="content[{{ $item->id }}][questions][{{ $index }}][question]" 
                                               value="{{ $question['question'] ?? '' }}" placeholder="Question">
                                        <textarea class="form-control" 
                                                  name="content[{{ $item->id }}][questions][{{ $index }}][answer]" 
                                                  placeholder="Answer">{{ $question['answer'] ?? '' }}</textarea>
                                    </div>
                                @endforeach
                            </div>

                        <!-- Call to Action (CTA) -->
                        @elseif ($item->type == 'cta')
                            <div class="border p-3 rounded mb-3">
                                <label class="form-label fw-bold">CTA Message</label>
                                <textarea class="form-control mb-2" name="content[{{ $item->id }}][message]"
                                          placeholder="CTA Message">{{ $content['message'] ?? '' }}</textarea>

                                <label class="form-label fw-bold">CTA Description</label>
                                <textarea class="form-control mb-2" name="content[{{ $item->id }}][description]"
                                          placeholder="CTA Description">{{ $content['description'] ?? '' }}</textarea>

                                <label class="form-label fw-bold">CTA Button Text</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][button_text]"
                                       value="{{ $content['button_text'] ?? '' }}" placeholder="CTA Button Text">

                                <label class="form-label fw-bold">CTA Button Color</label>
                                <input type="color" class="form-control form-control-color mb-2"
                                       name="content[{{ $item->id }}][button_color]"
                                       value="{{ $content['button_color'] ?? '#62a2ec' }}" title="Pick a color">

                                <label class="form-label fw-bold">CTA Button Border</label>
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][button_border]"
                                       value="{{ $content['button_border'] ?? 'white' }}" placeholder="CTA Button Border">
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Pricing Section</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

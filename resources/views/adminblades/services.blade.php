<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Services Section') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 50rem;">
            <form method="POST" action="{{ route('admin.update', 'services') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @foreach ($contentData as $item)
                    <div class="mb-3">
                        <label class="form-label">{{ ucfirst($item->type) }}</label>

                        @if($item->type == 'image')
                            <input type="file" class="form-control" name="content[{{ $item->id }}][src]">
                            <input type="hidden" name="content[{{ $item->id }}][src]" value="{{ $item->content['src'] ?? '' }}">
                            @if(!empty($item->content['src']))
                                <div class="text-center mt-2">
                                    <img src="{{ asset($item->content['src']) }}" alt="Service Image" class="rounded" style="width: 100%; max-width: 300px;">
                                </div>
                            @endif
                        @elseif($item->type == 'list')
                            @foreach($item->content as $index => $service)
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="content[{{ $item->id }}][{{ $index }}][title]" value="{{ $service['title'] ?? '' }}" placeholder="Service Title">
                                    <textarea class="form-control mt-1" name="content[{{ $item->id }}][{{ $index }}][description]" placeholder="Service Description">{{ $service['description'] ?? '' }}</textarea>
                                </div>
                            @endforeach
                        @elseif(is_array($item->content))
                            @foreach($item->content as $key => $value)
                                <input type="text" class="form-control mb-2" name="content[{{ $item->id }}][{{ $key }}]" value="{{ $value }}">
                            @endforeach
                        @else
                            <input type="text" class="form-control" name="content[{{ $item->id }}]" value="{{ $item->content }}">
                        @endif
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Services Section</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

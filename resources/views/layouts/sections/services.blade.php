@php
$serviceCards = $contentData['services']->where('type', 'card') ?? collect();
@endphp

<section id="services" style="background-color: #9ac0eb; padding: 50px 0;">
    <div class="container-fluid">
        <h1 class="text-center">Our Services</h1>
        <p class="text-center">What we offer to our clients.</p>
        <div class="row justify-content-center">
            @foreach($serviceCards as $service)
                <div class="col-lg-5 col-md-6 m-3">
                    <div class="card d-flex align-items-center p-4 shadow-sm" style="border-radius: 20px; min-height: 250px;">
                        <div class="d-flex w-100 align-items-center">
                            <div class="p-4 d-flex align-items-center justify-content-center"
                                style="background-color: #E9F2FF; width:80px; height:80px; border-radius:15px;">
                                <i class="{{ $service->content['icon'] ?? 'bi bi-info-circle' }}" style="color: #0c76f0; font-size:40px;"></i>
                            </div>
                            <div class="ms-4">
                                <h2 style="font-size: 22px; margin-bottom: 5px;">{{ $service->content['title'] ?? 'Service Title' }}</h2>
                                <p style="margin-bottom: 5px;">{{ $service->content['description'] ?? 'Service Description' }}</p>
                                <button type="button" class="btn btn-link text-primary p-0" 
                                        style="font-size: 18px; font-weight: 500; text-decoration: none;" 
                                        data-bs-toggle="modal" data-bs-target="#modal-{{ $service->id }}">
                                    Read More <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @foreach($serviceCards as $service)
            <div class="modal fade" id="modal-{{ $service->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $service->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalLabel-{{ $service->id }}">{{ $service->content['title'] ?? 'Service Details' }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $service->content['modal_content'] ?? 'More details about this service will go here.' }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

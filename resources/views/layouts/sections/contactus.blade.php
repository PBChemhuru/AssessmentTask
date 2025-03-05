@php
    $contactContent = $contentData['contact'] ?? collect();
    $contactTitle = optional($contactContent->where('type', 'text')->where('content->title', '!=', null)->first())->content['title'] ?? 'CONTACT US';
    $contactSubtitle = optional($contactContent->where('type', 'text')->where('content->subtitle', '!=', null)->first())->content['subtitle'] ?? 'We would love to hear from you';
    $contactInfo = $contactContent->where('type', 'contact_info')->first()->content ?? [];
@endphp

<section id="contact" style="background-color: #9ac0eb">
    <h1 style="color:white">{{ $contactTitle }}</h1>
    <p style="color:white">{{ $contactSubtitle }}</p>

    <div class="container" style="height: 60%">
        <div class="row mb-2 flex-grow-1" style="height: 100%">
            <div class="col rounded-2 bg-primary mx-2 text-center">
                <h2 style="color:white">Contact info</h2>
                <p style="color:white">Feel Free to get in touch</p>
                @foreach ($contactInfo as $info)
                    <div class="row d-flex align-items-center mb-2">
                        <div class="d-flex w-100">
                            <div class="d-flex align-items-center justify-content-center" style="width: 10%">
                                @if (strtolower($info['label']) == 'address')
                                    <i class="bi bi-geo-alt" style="color: white; background-color:#9ac0eb; border-radius:50%; width:fit-content; height:fit-content; font-size:30px; padding:5px"></i>
                                @elseif (strtolower($info['label']) == 'phone')
                                    <i class="bi bi-telephone" style="color: white; background-color:#9ac0eb; border-radius:50%; width:fit-content; height:fit-content; font-size:30px; padding:5px"></i>
                                @elseif (strtolower($info['label']) == 'email')
                                    <i class="bi bi-envelope" style="color: white; background-color:#9ac0eb; border-radius:50%; width:fit-content; height:fit-content; font-size:30px; padding:5px"></i>
                                @endif
                            </div>
                            <div class="m-1" style="text-align: left">
                                <p style="color: white; margin-bottom:2px; font-weight:bold">{{ $info['label'] }}</p>
                                <p style="color: white; margin-bottom:2px; font-size:12px">{{ $info['value'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col rounded-2 bg-white mx-2">
                <form style="height: 100%">
                    <h1>Get In Touch</h1>
                    <p>Send us your inquiries and we will get back to you</p>
                    <div class="row mb-3">
                        <div class="col me-2">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Your Email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                    </div>
                    <div class="mb-3" style="width: 100%; height:40%">
                        <textarea id="message" name="message" placeholder="Message" style="width: 100%; height:100%"></textarea>
                    </div>
                    <button class="btn btn-primary rounded-pill text-white">Send Message</button>
                </form>
            </div>
        </div>
    </div>
	 <footer class="bg-light text-dark pt-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold">iLanding</h5>
                    <p>A108 Adam Street<br>New York, NY 535022</p>
                    <p><strong>Phone:</strong> +1 5589 55488 55</p>
                    <p><strong>Email:</strong> info@example.com</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-dark rounded-circle"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="btn btn-outline-dark rounded-circle"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-outline-dark rounded-circle"><i
                                class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-outline-dark rounded-circle"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Useful Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-decoration-none" style="color: black">Home</a></li>
                        <li><a href="#about" class="text-decoration-none" style="color: black">About us</a></li>
                        <li><a href="#pricing" class="text-decoration-none" style="color: black">Pricing</a></li>
                        <li><a href="#contact" class="text-decoration-none" style="color: black">Contact Us</a></li>
                        <li><a href="#" class="text-decoration-none" style="color: black">Terms of service</a></li>
                        <li><a href="#" class="text-decoration-none" style="color: black">Privacy policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#services" class="text-decoration-none" style="color: black"> <h5>Our Services</h5></a>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none" style="color: black" >Web Design</a></li>
                        <li><a href="#" class="text-decoration-none" style="color: black">Web Development</a></li>
                        <li><a href="#" class="text-decoration-none" style="color: black">Product Management</a></li>
                        <li><a href="#" class="text-decoration-none" style="color: black">Marketing</a></li>
                        <li><a href="#" class="text-decoration-none" style="color: black">Graphic Design</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Hic solutastep</h5>
                    <ul class="list-unstyled">
                        <li>Molestiae accusamus iure</li>
                        <li>Exercitation dignissimos</li>
                        <li>Suscipit distinctio</li>
                        <li>Dilecta</li>
                        <li>Sit quas consectetur</li>
                    </ul>
                </div>
            </div>
            <div class="text-center py-3 border-top mt-3">
                <p class="mb-0">&copy; Copyright <strong>iLanding</strong>. All Rights Reserved</p>
                <small>Designed by <a href="#">BootstrapMade</a></small>
            </div>
        </div>
    </footer>
</section>

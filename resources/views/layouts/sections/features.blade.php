<section id="features" class="bg-white">
    <div class="container">
        <h1>Features</h1>
        <p>Explore our awesome features.</p>

        <div class="d-flex justify-content-center mt-5">
            <div class="segmented-control">
                <div class="segmented-option selected" data-target="feature-set-1">Modsit</div>
                <div class="segmented-option" data-target="feature-set-2">Praesent</div>
                <div class="segmented-option"data-target="feature-set-3">Explica</div>
            </div>
        </div>
        <div class="feature-set" id="feature-set-1">
            <div class="row my-2">
                <div class="col-6">
                    <h1>random text insert here</h1>
                    <h3>random sub insert</h3>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center">
                            <i class="bi bi-check2-all" style="color: #0c76f0"></i> <span>this</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-check2-all" style="color: #0c76f0"></i> <span>this thing</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bi bi-check2-all" style="color: #0c76f0"></i> <span>this other thing</span>
                        </li>
                    </ul>
                    <p style="float: left">more things to add textscrwal</p>
                </div>
                <div class="col-6">
                    <img src="images\istockphoto-1308949444-1024x1024.jpg" class="img-fluid"
                        style="width: 300px;height:120px; border-radius: 10px;">
                </div>
            </div>
        </div>
        <div class="feature-set d-none" id="feature-set-2">
            <div class="row my-2">
                <div class="col m-1 p-1 rounded" style="background: #fcae06">
                    <i class="bi bi-award" style="color: #eeddb8"></i>
                    <div>
                        <h1 style="font-size: 20px">So this volupes</h1>
                        <p>text stuff added</p>
                    </div>
                </div>
                <div class="col m-1 p-1 rounded" style="background: #04b8ff">
                    <i class="bi bi-patch-check" style="color: #a3c8f1"></i>
                    <div>
                        <h1 style="font-size: 20px">So this volupes</h1>
                        <p>text stuff added</p>
                    </div>
                </div>
                <div class="col m-1 p-1 rounded" style="background: #03ff39">
                    <i class="bi bi-sunrise" style="color: #b1f1bf"></i>
                    <div>
                        <h1 style="font-size: 20px">So this volupes</h1>
                        <p>text stuff added</p>
                    </div>
                </div>
                <div class="col m-1 p-1 rounded" style="background: #ff3030">
                    <i class="bi bi-shield-check" style="color: #fac9c9"></i>
                    <div>
                        <h1 style="font-size: 20px">So this volupes</h1>
                        <p>text stuff added</p>
                    </div>
                </div>
            </div>
            <div class="row my-2 bg-primary rounded">
                <div class="container m-2">
                    <p style="color: white">All the things you need to do to success</p>
                    <p style="color: white">This is where to take action</p>
                    <button style="background: #62a2ec;border-color:white;border-style:solid">Call To Action</button>
                </div>
            </div>
        </div>
        <div class="feature-set d-none" id="feature-set-3">
            <div class="row my-2 ">
                <div class="container my-4 align-items-center p-4 bg-white" style="min-width: 85%; height: 20vh;">
                    <div class="row h-100 align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <img src="images\istockphoto-1308949444-1024x1024.jpg" class="img-fluid"
                                    style="width: 300px;height:120px; border-radius: 10px; filter:grayscale(100%)">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <img src="images\istockphoto-1308949444-1024x1024.jpg" class="img-fluid"
                                    style="width: 300px;height:120px; border-radius: 10px; filter:grayscale(100%)">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <img src="images\istockphoto-1308949444-1024x1024.jpg" class="img-fluid"
                                    style="width: 300px;height:120px; border-radius: 10px; filter:grayscale(100%)">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <img src="images\istockphoto-1308949444-1024x1024.jpg" class="img-fluid"
                                    style="width: 300px;height:120px; border-radius: 10px; filter:grayscale(100%)">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <img src="images\istockphoto-1308949444-1024x1024.jpg" class="img-fluid"
                                    style="width: 300px;height:120px; border-radius: 10px; filter:grayscale(100%)">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <img src="images\istockphoto-1308949444-1024x1024.jpg" class="img-fluid"
                                    style="width: 300px;height:120px; border-radius: 10px; filter:grayscale(100%)">
                            </div>
                        </div>
    
    
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="loader">
                    <div class="dot chosen"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
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

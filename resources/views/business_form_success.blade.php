<x-app-layout>
    <style>
        #main-nav {
            display: none;
        }
        .main-nav {
            display: none;
        }
    </style>
    <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top"
    style="display: none;"><i class="fas fa-arrow-up"></i></button>

    <div class="row">
        <div class="col-md-6 card pb-4 mb-5 p-0" id="main-card-post">
            <div class="header-top w-100" style="height:60px !important">
                <div class="text-center" style="padding-top:10px;">
                   <h2 class="text-light">Adsmarket For Business</h2>
                </div>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h2 class="mt-5 fw-bold fs-4 text-center" style="margin-top:100px;">Thank you for providing your details!</h2>
            <p class="m-0 text-center">Our sales team will reach out to you shortly.</p>

            <!-- AOS animation section -->
            <div class="col-md-10 mx-auto mt-3">
                <div class="position-relative">
                    <div class="position-absolute mt-2 ms-3 h-100 d-flex justify-content-end align-items-center pe-3">
                        <h1 data-aos="fade-right" data-aos-duration="1000" 
                            class="text-uppercase text-white fw-bold text-end" 
                            style="z-index: 2; font-size: 1.8rem; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);">
                            Successful <br> Submission
                        </h1>
                    </div>
                    <img src="{{ asset('assets/images/happy-successful-businessman.jpg') }}" data-aos="fade-left" data-aos-duration="1000" class="w-100 mt-3" alt="Ads for Business">
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Auto Redirect -->
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('index') }}"; // Replace 'index' with your actual route name
        }, 3000); // Redirect after 3 seconds
    </script>
</x-app-layout>

<x-app-layout>
@section('title', 'Contact Us — AdsMarket')
@section('meta_description', 'Get in touch with the AdsMarket team for support or inquiries.')

<div class="breadcrumb-bar">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </nav>
    </div>
</div>

{{-- Contact Banner --}}
@isset($contactBanners)
@if(count($contactBanners))
<div class="swiper contact-banner-swiper">
    <div class="swiper-wrapper">
        @foreach($contactBanners as $banner)
        <div class="swiper-slide">
            <img src="{{ asset('assets/images/' . $banner->path) }}" alt="Contact Banner"
                 style="width:100%;height:200px;object-fit:cover">
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
@endif
@endisset

<div class="container py-5">

    {{-- Page Header --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary-custom">Get In Touch</h2>
        <p class="text-muted">Have a question or need help? We're here for you.</p>
    </div>

    <div class="row g-4 justify-content-center">

        {{-- Info Cards --}}
        <div class="col-lg-4">
            <div class="d-flex flex-column gap-3">

                <div class="bg-white rounded-3 border p-4 d-flex gap-3 align-items-start">
                    <div class="stat-icon bg-accent-icon flex-shrink-0">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-primary-custom mb-1">Email Us</h6>
                        <p class="text-muted small mb-0">support@adsmarket.pk</p>
                        <p class="text-muted small mb-0">hello@adsmarket.pk</p>
                    </div>
                </div>

                <div class="bg-white rounded-3 border p-4 d-flex gap-3 align-items-start">
                    <div class="stat-icon bg-primary-icon flex-shrink-0">
                        <i class="bi bi-phone"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-primary-custom mb-1">Call Us</h6>
                        <p class="text-muted small mb-0">+92 300 1234567</p>
                        <p class="text-muted small mb-0">Mon - Sat: 9am - 6pm</p>
                    </div>
                </div>

                <div class="bg-white rounded-3 border p-4 d-flex gap-3 align-items-start">
                    <div class="stat-icon bg-success-icon flex-shrink-0">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-primary-custom mb-1">Our Office</h6>
                        <p class="text-muted small mb-0">Lahore, Punjab, Pakistan</p>
                    </div>
                </div>

                <div class="bg-white rounded-3 border p-4">
                    <h6 class="fw-bold text-primary-custom mb-3">Follow Us</h6>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contact Form --}}
        <div class="col-lg-6">
            <div class="bg-white rounded-3 border p-4 p-md-5">
                <h5 class="fw-bold text-primary-custom mb-4">Send Us a Message</h5>

                @if(session('success'))
                <div class="alert alert-success-custom d-flex gap-2 mb-4">
                    <i class="bi bi-check-circle-fill mt-1"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                <form action="{{ route('contact.save') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Your Name *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', auth()->user()?->name) }}" required placeholder="John Doe">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', auth()->user()?->email) }}" required placeholder="you@example.com">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}" placeholder="03XX-XXXXXXX">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subject *</label>
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                                   value="{{ old('subject') }}" required placeholder="How can we help?">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message *</label>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                                      rows="5" required placeholder="Write your message here…">{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary-custom px-5 py-2 fw-bold">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
new Swiper('.contact-banner-swiper', {
    loop: true,
    autoplay: { delay: 4000 },
    pagination: { el: '.swiper-pagination', clickable: true },
});
</script>
@endpush

</x-app-layout>

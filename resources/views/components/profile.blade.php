<!-- resources/views/components/review-details.blade.php -->

@props([
    'image' => 'assets/images/Profile-Male-PNG.png',
    'name' => '',
    'phone' => '',
    'showPhoneCheckbox' => true,
])

<div {{ $attributes->merge(['class' => 'profile-img']) }}>
    <h4 class="mt-2 choose mb-3">REVIEW YOUR DETAILS</h4>
    <div class="inner-profile">
        <img src="{{ $image }}" width="40px" height="40px" alt="">
        @auth
            <label for="name" class="label-text">
                <span class="label-span">Name</span>
                <input type="text" class="form-control p-4"
                    style="width: 100%; box-sizing: border-box; padding: 6px !important;"
                    value="{{ $name ?: Auth::user()->name }}" >
            </label>
        @endauth
    </div>

    @auth
        <label for="phone" class="label-text">
            <span class="label-span mb-0 mt-3">Mobile Phone Number</span>
        </label>
        <div class="input-group input-group-sm rounded border border-1 mb-4">
           
            <input type="text" class="form-control border-0 ps-0" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" value="{{ $phone ?: Auth::user()->phone_no }}" >
        </div>
    @endauth

    @if ($showPhoneCheckbox)
        <div class="form-check form-switch p-0">
            <label class="form-check-label" for="flexSwitchCheckDefault">Show my phone number in ads</label>
            <input class="form-check-input float-end ms-auto " type="checkbox" id="flexSwitchCheckDefault" checked>
        </div>
    @endif
</div>


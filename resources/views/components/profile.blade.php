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
        
        <div class="input-group input-group-sm rounded border border-1 mb-1">
            <!-- Conditionally show "+92 |" only for Google users without a phone number -->
            @if (Auth::user()->google_id && !Auth::user()->phone_no)
                <span class="input-group-text border-0 pe-0 bg-transparent" id="inputGroup-sizing-sm">+92 |</span>
                <input type="text" class="form-control border-0 ps-0" name="phone_no" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" placeholder="Enter your phone number">
            @else
                <!-- Show the saved phone number as readonly for all other users -->
                <input type="text" class="form-control border-0 ps-0" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" value="{{ Auth::user()->phone_no }}" readonly>
            @endif
        </div>

        <!-- Conditionally show verification label if phone number is not verified -->
        @if (!Auth::user()->phone_verified)
            <label for="phone" class="label-text mt-0 d-flex" onClick="openPhoneEditModal()">
                <span class="label-span" style="color:red; cursor:pointer">
                    Please Verify Your Phone Number 
                    <button type="button" class="post-ad-btn" style="width:45px; height:20px;">Verify</button>
                </span>
            </label>
        @endif
    @endauth

    @if ($showPhoneCheckbox)
        <div class="form-check form-switch p-0">
            <label class="form-check-label" for="flexSwitchCheckDefault">Show my phone number in ads</label>
            <input class="form-check-input float-end ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
        </div>
    @endif
</div>

<!-- Modal for Phone Number Edit and Verification -->
<div id="phoneEditModal" class="modal fade" tabindex="-1" aria-labelledby="phoneEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content w-75">
            <div id="step1" class="modal-body">
                <form id="phoneEditForm" action="{{ route('sendVerificationCode') }}" method="POST">
                    @csrf
                    <div class="form-group mx-auto w-75">
                        <label for="new_phone" class="mt-2 text-center"> Phone Number</label>
                        <input type="text" class="form-control ps-0" name="new_phone" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-sm" value="{{ old('new_phone', $phone ?: Auth::user()->phone_no) }}">
                    </div>
                    <button type="submit" class="post-ad-btn mt-3 mx-auto" onclick="showVerificationStep(); return false;">Send Code</button>
                </form>
            </div>
            <div id="step2" class="modal-body  text-center d-none">
                <!-- Circular Timer -->
                <div class="circular-timer-container float-end">
                    <div class="circular-timer" id="circularTimer">
                        <span id="timerText">60</span> <!-- Timer text -->
                    </div>
                </div>
                <form id="verificationForm" action="{{ route('verifyCode') }}" method="POST">
                    @csrf
                    <div class="form-group text-center">
                        <label for="verification_code" class="fw-bolder">Enter Verification Code</label>
                        <div class="d-flex text-center ms-auto">
                            @for ($i = 0; $i < 6; $i++)
                                <input type="text" name="verification_code[]" maxlength="1" class="form-control text-center mx-auto mt-2" style="width: 35px; height:30px">
                            @endfor
                        </div>
                    </div>
                    <button type="submit" class="post-ad-btn mt-3 mx-auto">Verify Code</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.circular-timer-container {
    position: relative;
    width: 25px;
    height: 25px;
    margin: 0 5px;
    display: flex;
    justify-content: end;
    align-items: end;
}

.circular-timer {
    position: relative;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 2px solid #4d5bf9; /* Initial border color */
    background: #e0e0e0; /* Background color */
    display: flex;
    justify-content: center;
    align-items: center;
}

.circular-timer span {
    font-size: 14px;
    font-weight: bold;
    color: #333;
}
</style>

<script>
function openPhoneEditModal() {
    var phoneEditModal = new bootstrap.Modal(document.getElementById('phoneEditModal'));
    phoneEditModal.show();
}

function showVerificationStep() {
    document.getElementById('step1').classList.add('d-none');
    document.getElementById('step2').classList.remove('d-none');
}
</script>

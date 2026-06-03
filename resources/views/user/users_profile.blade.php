<x-app-user-layout>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{ url('user/users_profile') }}">Profile</a></li>
        </ol>
      </nav>
    </div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <div class="d-flex">
                  @if(Auth::check())
                      @php
                          $user = Auth::user();
                          $profileImage = $user->profile_image ? asset($user->profile_image) : asset('user-panel/assets/img/1_avatar.png');
                      @endphp
                      <img src="{{ $profileImage }}" alt="Profile" class="rounded-circle" height="60px" width="60px">
                  @endif
                  @auth
                  <div class="text-left mt-3" style="line-height: 1; margin-left:15px">
                      <span class=" mt-1" style="font-size: 16px; color: #555;">Hello</span>
                      <p class="mb-2 mt-1 fw-bolder" style="font-size: 20px;color:#333 !important;">{{ Auth::user()->name }}</p>
                  </div>
                  @endauth
                  @auth
                
                  @endauth
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
                
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-md-10">
                        <div class="row p-1 m-1">
                          <div class="col-lg-3 col-md-4 label ">Full Name</div>
                            @auth
                          <div class="col-lg-9 col-md-8 border py-1 " readonly>{{ Auth::user()->name }}</div>
                          @endauth
                        </div>
                        <div class="row p-1 m-1">
                          <div class="col-lg-3 col-md-4 label">Phone</div>
                          @auth
                              <div class="col-lg-9 col-md-8 border py-1" readonly>{{ Auth::user()->phone_no }}</div>
                          @endauth
                        </div>
                        <div class="row p-1 m-1">
                          <div class="col-lg-3 col-md-4 label">Email</div>
                          @auth
                          <div class="col-lg-9 col-md-8 border py-1" readonly>{{ Auth::user()->email}}</div>
                          @endauth
                        </div>
                      </div>
                    </div>
                  </div>
               <!-- Edit Profile Tab -->
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ Session::get('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{ Session::get('error') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                      <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <!-- Profile Image -->
                          <div class="row mb-3">
                              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                              <div class="col-md-8 col-lg-9">
                                  @if(Auth::check())
                                      @php
                                          $user = Auth::user();
                                          $profileImage = $user->profile_image ? asset($user->profile_image) : asset('user-panel/assets/img/1_avatar.png');
                                      @endphp
                                      <img src="{{ $profileImage }}" alt="Profile" class="rounded-circle me-2 preview-img" height="80px" width="80px" id="imagePreview">
                                  @endif
                                  <div class="pt-2">
                                      <input type="file" name="profileImage" id="profileImageInput" class="form-control">
                                  </div>
                              </div>
                          </div>

                          <!-- Full Name -->
                          <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                              <div class="col-md-8 col-lg-9">
                                  <input name="fullName" type="text" class="form-control" id="fullName" value="{{ Auth::user()->name }}">
                              </div>
                          </div>

                          <!-- Phone -->
                          <div class="row mb-3">
                              <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                              <div class="col-md-8 col-lg-9">
                                  <input name="phone_no" type="text" class="form-control" id="Phone" value="{{ Auth::user()->phone_no }}">
                              </div>
                          </div>

                          <!-- Email -->
                          <div class="row mb-3">
                              <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                              <div class="col-md-8 col-lg-9">
                                  <input name="email" type="email" class="form-control" id="Email" value="{{ Auth::user()->email }}">
                              </div>
                          </div>

                          <div class="text-center">
                              <button type="submit" class="post fs-6">Save Changes</button>
                          </div>
                      </form>

                </div>
                  <!-- Change Password Tab -->
                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <form action="{{ route('user.changePassword') }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-md-10">
                          <div class="row mb-3">
                            <label for="currentPassword" class="col-md-5 col-lg-5 col-form-label">Current Password</label>
                            <div class="col-md-6 col-lg-6">
                              <input name="currentPassword" type="password" class="form-control" id="currentPassword"  required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="newPassword" class="col-md-5 col-lg-5 col-form-label">New Password</label>
                            <div class="col-md-6 col-lg-6">
                              <input name="newPassword" type="password" class="form-control" id="newPassword" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="renewPassword" class="col-md-5 col-lg-5 col-form-label">Re-enter New Password</label>
                            <div class="col-md-6 col-lg-6">
                              <input name="renewPassword" type="password" class="form-control" id="renewPassword" required>
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="post fs-6 mx-auto">Change Password</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom" style="background-color:#fdfcfc !important;">
    <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="{{ url('/') }}" class="link"> <strong
            class="px-1 sitename">Ads Market</strong></a><span>All
          Rights Reserved</span></p>
    </div>
  </footer>
  </x-app-user-layout>
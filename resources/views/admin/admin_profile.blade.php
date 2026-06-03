<x-app-admin-layout>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{ url('admin/admin_profile') }}">Profile</a></li>
        </ol>
      </nav>
    </div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="{{asset('admin/assets/img/admin2_img.png')}}" alt="Profile" class="rounded-circle " height="120px" width="120px">
              @auth
              <h4>{{ Auth::user()->name }}</h4>
              @endauth

               @auth
              <h4>{{ Auth::user()->role }}</h4>
              @endauth
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#profile-overview">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
               
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                    Password</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    @auth
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                    @endauth
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    @auth
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->phone_no }}</div>
                    @endauth

                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    @auth
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email}}</div>
                    @endauth
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <form action="{{ route('admin.admin_profile', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  
                    <!-- Profile Image Section -->
                    <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img src="{{ Auth::user()->profile_image ? asset('assets/images/' . Auth::user()->profile_image) : asset('admin/assets/img/admin2_img.png') }}" alt="Profile" height="80px" width="80px">
                            <div class="pt-2">
                                <input type="file" name="profile_image" class="form-control-file">
                                <button type="submit" class="mt-2 border-0 rounded px-2 py-1 text-white" style="background:#545f8b" title="Upload new profile image">
                                    <i class="bi bi-upload"></i> Upload
                                </button>
                                <button type="submit" name="delete_image" class=" mt-2 border-0 rounded px-2 py-1 text-white"  style="background:#545f8b" title="Remove my profile image">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Other Input Fields -->
                    <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="fullName" type="text" class="form-control" id="fullName" value="{{ Auth::user()->name }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="Phone" value="{{ Auth::user()->phone_no }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class=" border-0 rounded px-2 py-1 text-white"  style="background:#545f8b">Save Changes</button>
                    </div>
              </form>

                </div>
                
                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <form>
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
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
</x-app-admin-layout>
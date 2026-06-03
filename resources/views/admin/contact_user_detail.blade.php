<x-app-admin-layout>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('admin.detail_contact')}}">Contact Deatail</a></li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12 col-12">
          <div class="card recent-sales overflow-auto">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title"> Detail <span> | Today</span></h5>
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td style="font-size: 13px">{{ $contact->name }}</td>
                        <td style="font-size: 13px">{{ $contact->email }}</td>
                        <td style="font-size: 13px">{{ Str::limit($contact->subject, 60) }}</td>
                        <td style="font-size: 13px">{!! nl2br(e(Str::limit($contact->message, 80))) !!}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>


      </div>
    </section>

  </main>
  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom" style="background-color:#fdfcfc !important;">

    <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="{{ url('/') }}" class="link"> <strong
            class="px-1 sitename">Ads Market</strong></a><span>
          All Rights Reserved</span></p>
    </div>

  </footer>

</x-app-admin-layout>
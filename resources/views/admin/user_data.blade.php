<x-app-admin-layout>
    <style>
        #main-nav {
            display: none;
        }
        .main-nav {
            display: none;
        }
    </style>
    <button onclick="topFunction()" class="custom-fixed-button float-end me-3" id="myBtn" title="Go to top" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </button>
   
        <div class="card w-50 mx-auto p-2" style="border:1px solid #D8DFE0; box-shadow:none !important; margin-top:100px !important">
            <h5 class="mb-3" style="color:#545f8b">Ad Business Details</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $adsbusiness->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $adsbusiness->name }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ $adsbusiness->phone_no }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $adsbusiness->category_name }}</td>
                    </tr>
                    <tr>
                        <td>Interests</td>
                        <td>{{ $adsbusiness->interests }}</td>
                    </tr>
                </tbody>
            </table> 
        </div>
    
  </main>
  <footer id="footer" class="footer pb-0 mt-4 fixed-bottom" style="background-color:#fdfcfc !important;">
    <div class="container copyright text-center  border-top pt-2 mb-0 pb-2 ">
      <p class="pb-0 mb-0">© 2024<span> Copyright</span> <a href="{{ url('/') }}" class="link"> 
        <strong class="px-1 sitename">Ads Market</strong></a><span>All Rights Reserved</span></p>
    </div>
  </footer>
</x-app-admin-layout>

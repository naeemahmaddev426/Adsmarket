<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

       
        <link href="{{asset('admin/assets/img/logo.svg')}}" rel="icon">
		<link href="{{asset('admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

		<!-- Google Fonts -->
		<link href="https://fonts.gstatic.com" rel="preconnect">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	  <!-- Vendor CSS Files -->
	  <link href="{{asset('/admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	  <link href="{{asset('/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
	  <link href="{{asset('/admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
	  <link href="{{asset('/admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
	  <link href="{{asset('/admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
	  <link href="{{asset('/admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
	  <link href="{{asset('/admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
	  <link rel="stylesheet" href="{{asset('/admin/assets/font/css/all.css')}}">
	  <link rel="stylesheet" href="{{asset('/admin/assets/font/css/all.min.css')}}">
	  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  
  
	  <!-- Template Main CSS File -->
      <link href="{{asset('/admin/assets/css/style.css')}}" rel="stylesheet">
			@livewireStyles
  </head>
  <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
           
        <x-app-user-header></x-app-user-header>
        <x-assidebaradmin></x-assidebaradmin>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
			<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>
		  <script src="{{asset('/admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
		  <script src="{{asset('/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		  <script src="{{asset('/admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
		  <script src="{{asset('/admin/assets/vendor/echarts/echarts.min.js')}}"></script>
		  <script src="{{asset('/admin/assets/vendor/quill/quill.js')}}"></script>
		  <script src="{{asset('/admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
		  <script src="{{asset('/admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
		  <script src="{{asset('/admin/assets/vendor/php-email-form/validate.js')}}"></script>
		  <script src="{{asset('admin/assets/js/main.js')}}"></script>
		  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
		  <script>
		  document.addEventListener('DOMContentLoaded', function() {
			const idLinks = document.querySelectorAll('.id-link');
			idLinks.forEach((link, index) => {
			  link.textContent = index + 1;
			});
		  });
		</script>
		<script>
			document.addEventListener('DOMContentLoaded', function () {
					// Handle image upload button click
					document.getElementById('upload-button').addEventListener('click', function () {
						document.getElementById('image-upload').click();
					});

					// Handle file input change for image preview
					document.getElementById('image-upload').addEventListener('change', function () {
						const file = this.files[0];
						if (file) {
							const reader = new FileReader();
							reader.onload = function () {
								const imagePreview = document.querySelector('.image-box');
								imagePreview.innerHTML = `<img src="${reader.result}" alt="Uploaded Image" style="max-width: 100%; max-height: 100%;">`;
							};
							reader.readAsDataURL(file);
						}
					});

					// Handle delete button click
					document.querySelectorAll('.delete-category').forEach(button => {
						button.addEventListener('click', function () {
							const categoryId = this.getAttribute('data-id');
							if (confirm('Are you sure you want to delete this category?')) {
								const form = document.createElement('form');
								form.method = 'POST';
								form.action = `/admin/adscategory/${categoryId}`;
								const csrfField = document.createElement('input');
								csrfField.type = 'hidden';
								csrfField.name = '_token';
								csrfField.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
								const methodField = document.createElement('input');
								methodField.type = 'hidden';
								methodField.name = '_method';
								methodField.value = 'DELETE';
								form.appendChild(csrfField);
								form.appendChild(methodField);
								document.body.appendChild(form);
								form.submit();
							}
						});
					});

					// Handle update button click
					document.querySelectorAll('.update-category').forEach(button => {
						button.addEventListener('click', function () {
							const categoryId = this.getAttribute('data-id');
							window.location.href = `/admin/adscategory/${categoryId}/edit`;
						});
					});
				});
		</script>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				setTimeout(function() {
					let alertElement = document.querySelector('.alert');
					if (alertElement) {
						alertElement.classList.add('fade-out');
						setTimeout(function() {
							alertElement.remove();
						}, 500);
					}
				}, 5000);
			});
		</script>
		<script>
			$(document).ready(function() {
				$('#category_id').change(function() {
					var selectedCategoryId = $(this).val();
					$('#sub_category_id option').each(function() {
						if ($(this).data('category-id') != selectedCategoryId) {
							$(this).hide();
						} else {
							$(this).show();
						}
					});
				}).change(); // Trigger change event initially to filter based on default selected category
			});
		</script>
		<script>
			function previewImage() {
				const file = document.getElementById('banner').files[0];
				if (file) {
					const reader = new FileReader();
					reader.onload = function(e) {
						document.getElementById('preview').src = e.target.result;
						document.getElementById('imagePreview').style.display = 'block';
					}
					reader.readAsDataURL(file);

					// Initially, show save button and hide update button
					document.getElementById('saveButton').style.display = 'inline-block';
					document.getElementById('updateButton').style.display = 'none';
				}
			}
			document.getElementById('bannerForm').onsubmit = function() {
				// Show update button after form submission
				document.getElementById('saveButton').style.display = 'none';
				document.getElementById('updateButton').style.display = 'inline-block';
			};
		</script>
		<script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.notification-item.unread').forEach(item => {
                    item.addEventListener('click', async (event) => {
                        event.preventDefault();
                        
                        const notificationId = item.dataset.id; // Get the notification ID directly from .notification-item
                        try {
                            // Send an AJAX request to mark the notification as read
                            const response = await fetch(`/notifications/mark-read/${notificationId}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json'
                                }
                            });

                            if (response.ok) {
                                // Update the UI: remove 'unread', add 'read'
                                item.classList.remove('unread');
                                item.classList.add('read');

                                // Update the badge count
                                const badge = document.querySelector('.badge');
                                if (badge) {
                                    let count = parseInt(badge.textContent || '0');
                                    if (count > 1) {
                                        badge.textContent = count - 1;
                                    } else {
                                        badge.remove(); // Remove badge if no unread notifications
                                    }
                                }
                            } else {
                                console.error('Failed to mark notification as read');
                            }
                        } catch (error) {
                            console.error('Error:', error);
                        }
                    });
                });
            });
        </script>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <meta property="og:title" content="@yield('og_title', 'AdsMarkets Pk')" />
		<meta property="og:description" content="@yield('og_description', 'Trusted UK advertising and marketing services')" />
		<meta property="og:image" content="@yield('og_image', asset('images/adsmarkets-banner.jpg'))" />
		<meta property="og:url" content="{{ url()->current() }}" />
		<meta property="og:type" content="website" />

		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:title" content="@yield('twitter_title', 'AdsMarkets Pk')" />
		<meta name="twitter:description" content="@yield('twitter_description', 'Powerful digital marketing in the Pk')" />
		<meta name="twitter:image" content="@yield('twitter_image', asset('images/adsmarkets-banner.jpg'))" />

        <!-- Fonts -->
            
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.svg')}}" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/font/css/all.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/font/css/all.min.css')}}">
        <script src="{{ asset('assets/js/lazysizes.min.js')}}" async></script>
        <!-- Add Swiper -->
        <link rel="stylesheet" href="{{ asset('assets/swiper/package/swiper-bundle.min.css')  }}"/>
        <link rel="stylesheet" href="{{ asset('assets/font/css/bootstrap-icons.css')}}">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="{{ asset('assets/js/boxicons.js')}}"></script>
		<link href="{{ asset('assets/css/aos.css')}}" rel="stylesheet">

</head>

        <!-- Scripts -->
         
        <!-- Styles -->
        @livewireStyles

    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <x-footer />
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.js')}}"></script>
        <script src="{{ asset('assets/swiper/package/swiper-bundle.min.js') }}"></script>
		<script src="{{asset('assets/js/aos.js')}}"></script>
		<script>
            AOS.init();
        </script>
		<script>
            document.querySelectorAll('.custom-dropdown-item').forEach(function (item) {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    const selectedValue = this.getAttribute('data-value');
                    const selectedText = this.textContent;
                    // Update the dropdown button text
                    document.getElementById('dropdownMenuButton').textContent = selectedText;
                    // Update the hidden input value
                    document.getElementById('selected-category').value = selectedValue;
                });
            });
        </script>
        <script>
           // Iterate over each select element
		$(".custom-select-element").each(function () {
		  var $this = $(this),
			numberOfOptions = $this.children("option").length;

		  $this.addClass("custom-hidden");
		  $this.wrap('<div class="custom-select"></div>');
		  $this.after('<div class="custom-styled"></div>');
		  var $styledSelect = $this.next("div.custom-styled");
		  $styledSelect.text($this.children("option").eq(0).text());
		  var $list = $("<ul />", { class: "custom-options" }).insertAfter($styledSelect);

		  for (var i = 0; i < numberOfOptions; i++) {
			$("<li />", {
			  text: $this.children("option").eq(i).text(),
			  rel: $this.children("option").eq(i).val(),
			}).appendTo($list);
		  }

		  var $listItems = $list.children("li");

		  $styledSelect.click(function (e) {
			e.stopPropagation();
			$("div.custom-styled.active").each(function () {
			  $(this).removeClass("active").next("ul.custom-options").hide();
			});
			$(this).toggleClass("active").next("ul.custom-options").toggle();
		  });

		  $listItems.click(function (e) {
			e.stopPropagation();
			$styledSelect.text($(this).text()).removeClass("active");
			$this.val($(this).attr("rel"));
			$list.hide();
		  });

		  $(document).click(function () {
			$styledSelect.removeClass("active");
			$list.hide();
		  });
		});


        </script>
        <script>
		   document.addEventListener('DOMContentLoaded', function () {
                // Attach event listeners to all checkboxes
                document.querySelectorAll('.heart-checkbox').forEach(function (checkbox) {
                    checkbox.addEventListener('change', function () {
                        const adId = this.getAttribute('data-ad-id'); // Get the ad ID
                        const isChecked = this.checked; // Determine if it's checked
                        const action = isChecked ? 'like' : 'unlike'; // Define the action
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // CSRF token

                        // Reference the heart icon for styling
                        const heartIcon = this.nextElementSibling;

                        // Optimistically update the UI
                        if (isChecked) {
                            heartIcon.style.color = '#545fb8';
                            heartIcon.style.borderColor = '#545fb8';
                        } else {
                            heartIcon.style.color = 'gray';
                            heartIcon.style.borderColor = 'gray';
                        }

                        // AJAX request to update the database
                        fetch(`/toggle-like/${adId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({ action: action }) // Pass the action
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (!data.success) {
                                // Revert the checkbox and UI if there was an error
                                alert(data.message || 'Something went wrong!');
                                this.checked = !isChecked; // Undo the checkbox state
                                heartIcon.style.color = this.checked ? '#545fb8' : 'gray';
                                heartIcon.style.borderColor = this.checked ? '#545fb8' : 'gray';
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            alert('An error occurred while processing your request.');

                            // Revert the checkbox and UI on failure
                            this.checked = !isChecked;
                            heartIcon.style.color = this.checked ? '#545fb8' : 'gray';
                            heartIcon.style.borderColor = this.checked ? '#545fb8' : 'gray';
                        });
                    });
                });
            });
         </script>
		 <script>
           function updateCharCount(inputId, maxLength) {
                var input = document.getElementById(inputId);
                var charCountElement = document.getElementById(inputId + '-charCount').querySelector('.count-text');
                charCountElement.textContent = input.value.length + '/' + maxLength;

                // Optional: Add warning styles when the character limit is close
                if (input.value.length > maxLength - 10) {
                    charCountElement.style.color = 'red'; // Highlight text when close to the limit
                } else {
                    charCountElement.style.color = 'inherit'; // Reset to default
                }
            }

            // Initialize character counts for all inputs with counters on page load
            document.addEventListener('DOMContentLoaded', function () {
                var inputs = document.querySelectorAll('[oninput="updateCharCount(id, 70)"]');
                inputs.forEach(function (input) {
                    updateCharCount(input.id, 70);
                });
            });
        </script>
		<script>
             function menuToggle() {
                const toggleMenu = document.querySelector(".menu");
                toggleMenu.classList.toggle("active");
                }

            // Close the dropdown when clicking outside
            document.addEventListener("click", function (event) {
            const menu = document.querySelector(".menu");
            const profile = document.querySelector(".profile");

            // Check if the click is outside the menu and profile
            if (!menu.contains(event.target) && !profile.contains(event.target)) {
                menu.classList.remove("active"); // Hide the menu
            }
            });

        </script>
		 <script>
			$(document).ready(function () {
				// Show the first 22 items initially
				$(".ad-item2").slice(0, 22).show();

				// Check if there are any hidden items initially and show the "Load More" button if needed
				if ($(".ad-item2:hidden").length > 0) {
					$("#load-more-btn").show(); // Show the "Load More" button
				} else {
					$("#load-more-btn").hide(); // Hide the button if no hidden items exist
				}

				// Delegated event binding for dynamically added elements
				$(document).on("click", "#load-more-btn", function (event) {
					event.preventDefault();
					console.log("Load More button clicked!");

					// Show the next 3 hidden items
					$(".ad-item2:hidden").slice(0, 3).fadeIn(800);

					// Check again if there are no more hidden items
					if ($(".ad-item2:hidden").length === 0) {
						console.log("No more hidden items. Hiding button.");
						$(this).fadeOut();
					}
				});
			});
		 </script>
         <script>
			 const phoneNumberButton = document.getElementById('phoneNumberButton');
			 if (phoneNumberButton) {
				 phoneNumberButton.addEventListener('click', function () {
					 // Show the phone number
					 const showPhoneNumberButton = document.getElementById('showPhoneNumberButton');
					 if (showPhoneNumberButton) {
						 showPhoneNumberButton.style.display = 'block';
					 }

					 // Hide the button once the phone number is shown
					 this.style.display = 'none';

					 // Prepare the CSRF token
					 const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
					 const adId = document.querySelector('input[name="ad_id"]')?.value;

					 if (token && adId) {
						 // Send the AJAX request to save the phone view action
						 fetch(`/save-phone-view`, {
							 method: 'POST',
							 headers: {
								 'Content-Type': 'application/json',
								 'X-CSRF-TOKEN': token
							 },
							 body: JSON.stringify({
								 ad_id: adId,
								 action: 'phone_view'
							 })
						 })
							 .then(response => response.json())
							 .then(data => {
							 if (data.success) {
								 console.log('Phone view recorded successfully');
							 } else {
								 console.error('Action failed:', data.message);
							 }
						 })
							 .catch(error => console.error('Error:', error));
					 }
				 });
			 }
          </script>
          <script>
				document.addEventListener("DOMContentLoaded", function() {
				// Handle ad clicks for non-owners
				document.querySelectorAll('.ad-click').forEach(adLink => {
					adLink.addEventListener('click', function(event) {
						event.preventDefault(); // Prevent immediate navigation
						// Extract data attributes
						const adId = this.getAttribute('data-ad-id');
						const userId = this.getAttribute('data-user-id');
						const redirectUrl = this.getAttribute('data-url'); // Ensure data-url is correctly set
						const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

						// Check if the redirect URL is being correctly retrieved
						if (!redirectUrl) {
							console.error('Redirect URL is missing.');
							return;
						}

						// Log the extracted details to debug
						console.log('Ad ID:', adId, 'User ID:', userId, 'Redirect URL:', redirectUrl);

						// Send POST request to save view
						fetch("{{ route('ad.view.store') }}", {
							method: 'POST',
							headers: {
								'X-CSRF-TOKEN': token,
								'Content-Type': 'application/json'
							},
							body: JSON.stringify({ ad_id: adId, users_id: userId })
						})
						.then(response => response.json())
						.then(data => {
							if (data.success) {
								// Redirect to the detail page URL after recording view
								window.location.href = redirectUrl;
							} else {
								// If recording view fails, still redirect
								alert(data.message || 'Redirecting to the detail page.');
								window.location.href = redirectUrl;
							}
						})
						.catch(error => {
							console.error('Error:', error);
							alert('An error occurred. Redirecting to the detail page.');
							window.location.href = redirectUrl;
						});
					});
				});
			});
          </script>
          <script>
				  document.addEventListener("DOMContentLoaded", function() {
						document.querySelectorAll('.notification-item.unread').forEach(function(element) {
							element.addEventListener('click', function(e) {
								e.preventDefault();
								e.stopPropagation(); // Prevents the dropdown from closing

								var notificationId = this.getAttribute('data-id');

								// Send AJAX request to mark as read
								$.post('/notifications/toggle-read-status/' + notificationId, {
									_token: "{{ csrf_token() }}"
								}, function(response) {
									if (response.success) {
										var badge = document.querySelector('.badge');
										var count = parseInt(badge ? badge.innerHTML : 0);

										// Update the notification element background to white and mark as read
										element.classList.remove('unread');
										element.classList.add('read');

										// Update the badge count or remove it if no unread notifications
										if (count > 1) {
											badge.innerHTML = count - 1;
										} else if (badge) {
											badge.remove();
										}
									}
								});
							});
						});
					});
             </script>
             <script>
					 document.addEventListener("DOMContentLoaded", function () {
						const searchInput = document.getElementById("search");
						const dropdown = document.getElementById("category-dropdown");
						let searchData = []; // Store fetched data for validation

						// Fetch `search_type.json` file
						async function fetchSearchData() {
							if (searchData.length === 0) {
								try {
									const response = await fetch('/search_type.json'); // Update path to your JSON file
									if (response.ok) {
										searchData = await response.json();
									} else {
										console.error("Failed to load search data.");
									}
								} catch (error) {
									console.error("Error fetching search data:", error);
								}
							}
							return searchData;
						}

						// Filter the JSON data based on search query
						function filterSearchData(data, query) {
							if (!query) return [];
							query = query.toLowerCase();

							return data.filter((item) => item.name.toLowerCase().includes(query));
						}

						// Render results in the dropdown
						function renderDropdown(results) {
							dropdown.innerHTML = ""; // Clear the dropdown
							dropdown.style.display = results.length > 0 ? "block" : "none";

							if (results.length > 0) {
								const ul = document.createElement("ul");
								ul.style.listStyle = "none";
								ul.style.padding = "0";
								ul.style.margin = "0";

								results.forEach((item) => {
									const li = document.createElement("li");
									li.textContent = item.name; // Only show the name
									li.style.padding = "8px";
									li.style.borderBottom = "1px solid #ddd";
									li.style.cursor = "pointer";
									li.style.fontSize = "12px";

									// Handle click
									li.addEventListener("click", () => {
										searchInput.value = item.name; // Set input value
										dropdown.style.display = "none";
									});

									ul.appendChild(li);
								});

								dropdown.appendChild(ul);
							}
						}

						// Handle input event for live search suggestions
						searchInput.addEventListener("input", async function () {
							const query = searchInput.value.trim();
							if (query) {
								const data = await fetchSearchData();
								const results = filterSearchData(data, query);
								renderDropdown(results);
							} else {
								dropdown.style.display = "none";
							}
						});

						// Validate input on form submission
						const form = document.getElementById("searchForm");
						form.addEventListener("submit", async function (e) {
							e.preventDefault(); // Prevent form submission until validation

							const query = searchInput.value.trim();

							if (!query) {
								alert("Please select a valid item from the dropdown.");
								return;
							}

							// Check if the input matches any valid entry in the fetched data
							const data = await fetchSearchData();
							const isValid = data.some((item) => item.name.toLowerCase() === query.toLowerCase());

							if (!isValid) {
								alert("Please select a valid item from the dropdown.");
								return;
							}

							// Check ads availability for the selected category
							try {
								const response = await fetch(`/check-ads?category=${encodeURIComponent(query)}`);
								if (response.ok) {
									const result = await response.json();

									if (!result.exists) {
										// Show alert only if ads are not available
										alert(`No ads are available for "${query}". Please select a different category.`);
									} else {
										// Ads are available, submit the form
										form.submit();
									}
								} else {
									alert("An error occurred while checking ads availability. Please try again.");
								}
							} catch (error) {
								alert("An error occurred while checking ads availability. Please try again.");
								console.error("Error:", error);
							}
						});

						// Close dropdown when clicking outside
						document.addEventListener("click", function (e) {
							if (!document.getElementById("input_full").contains(e.target)) {
								dropdown.style.display = "none";
							}
						});
					});

               </script>
		       <script>
					const togglePassword = document.getElementById('togglePassword');
					if (togglePassword) {
						togglePassword.addEventListener('click', function () {
							const passwordField = document.getElementById('password');
							const icon = document.getElementById('toggleIcon');

							if (passwordField && icon) {
								// Toggle the type attribute
								if (passwordField.type === 'password') {
									passwordField.type = 'text';
									icon.classList.remove('fa-eye');
									icon.classList.add('fa-eye-slash');
								} else {
									passwordField.type = 'password';
									icon.classList.remove('fa-eye-slash');
									icon.classList.add('fa-eye');
								}
							}
						});
					}

					// Validate Remember Me checkbox
					const signupButton = document.getElementById('signupButton');
					if (signupButton) {
						signupButton.addEventListener('click', function (event) {
							const rememberMeChecked = document.getElementById('terms')?.checked;
							const rememberError = document.getElementById('rememberError');

							if (rememberError) {
								if (!rememberMeChecked) {
									event.preventDefault(); // Prevent form submission
									rememberError.style.display = 'block';
								} else {
									rememberError.style.display = 'none';
								}
							}
						});
					}
              </script>
			   <script>
					// Toggle password visibility for login form
					document.getElementById('toggleLoginPassword').addEventListener('click', function() {
						const passwordField = document.getElementById('login_password');
						const icon = document.getElementById('toggleLoginIcon');

						// Toggle the type attribute
						if (passwordField.type === 'password') {
							passwordField.type = 'text';
							icon.classList.remove('fa-eye');
							icon.classList.add('fa-eye-slash');
						} else {
							passwordField.type = 'password';
							icon.classList.remove('fa-eye-slash');
							icon.classList.add('fa-eye');
						}
					});

					// Toggle password visibility for register form
					document.getElementById('toggleRegisterPassword').addEventListener('click', function() {
						const passwordField = document.getElementById('register_password');
						const icon = document.getElementById('toggleRegisterIcon');

						// Toggle the type attribute
						if (passwordField.type === 'password') {
							passwordField.type = 'text';
							icon.classList.remove('fa-eye');
							icon.classList.add('fa-eye-slash');
						} else {
							passwordField.type = 'password';
							icon.classList.remove('fa-eye-slash');
							icon.classList.add('fa-eye');
						}
					});
					document.getElementById('toggleconfirmRegister').addEventListener('click', function() {
						const passwordField = document.getElementById('password_confirmation');
						const icon = document.getElementById('toggleconfirmRegisterIcon');

						// Toggle the type attribute
						if (passwordField.type === 'password') {
							passwordField.type = 'text';
							icon.classList.remove('fa-eye');
							icon.classList.add('fa-eye-slash');
						} else {
							passwordField.type = 'password';
							icon.classList.remove('fa-eye-slash');
							icon.classList.add('fa-eye');
						}
					});
				</script>
				<script>
					 function openPhoneEditModal() {
						const phoneEditModal = new bootstrap.Modal(document.getElementById('phoneEditModal'));
						phoneEditModal.show();
					}

					function showVerificationStep(event) {
						event.preventDefault(); // Prevent form submission

						const step1 = document.getElementById('step1');
						const step2 = document.getElementById('step2');

						if (step1 && step2) {
							step1.classList.add('d-none');
							step2.classList.remove('d-none');
						}
					}

					document.addEventListener('input', function (event) {
						if (event.target.matches('input[name="verification_code[]"]')) {
							const inputs = document.querySelectorAll('input[name="verification_code[]"]');
							const index = Array.from(inputs).indexOf(event.target);

							if (event.target.value.length === 1 && index < inputs.length - 1) {
								inputs[index + 1].focus();
							}
						}
					});

					document.addEventListener('DOMContentLoaded', function () {
						const phoneEditForm = document.getElementById('phoneEditForm');
						if (phoneEditForm) {
							phoneEditForm.addEventListener('submit', function (e) {
								const newPhoneInput = phoneEditForm.querySelector('input[name="new_phone"]');
								const newPhoneValue = newPhoneInput?.value.trim();

								if (!newPhoneValue || !/^\d{10}$/.test(newPhoneValue)) {
									alert('Please enter a valid 10-digit phone number.');
									e.preventDefault(); // Prevent form submission
								}
							});
						}

						const verificationForm = document.getElementById('verificationForm');
						if (verificationForm) {
							verificationForm.addEventListener('submit', function (e) {
								e.preventDefault();
								const formData = new FormData(verificationForm);

								fetch(verificationForm.action, {
									method: 'POST',
									headers: {
										'X-Requested-With': 'XMLHttpRequest',
										'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
									},
									body: formData
								})
								.then(response => response.json())
								.then(data => {
									if (data.success) {
										window.location.href = "http://127.0.0.1:8000/now-page";
									} else {
										alert('Verification failed. Please check your code and try again.');
									}
								})
								.catch(error => console.error('Error:', error));
							});
						}
					});
				</script>
                <script>
					document.getElementById('sort-by-select').addEventListener('change', function () {
						const sort = this.value; // Get the selected sort value

						// Prepare the URL to include the sorting parameter
						const url = new URL(window.location.href);
						url.searchParams.set('sort', sort);

						// Fetch the sorted ads without refreshing the page
						fetch(url.toString(), {
							method: 'GET',
							headers: {
								'X-Requested-With': 'XMLHttpRequest', // Mark the request as AJAX
							},
						})
							.then((response) => {
								// Check if the response is valid JSON
								const contentType = response.headers.get('content-type');
								if (!response.ok || !contentType || !contentType.includes('application/json')) {
									throw new Error('Invalid response type: Expected JSON');
								}
								return response.json();
							})
							.then((data) => {
								// Update the content in #right_bar with the new sorted ads list
								if (data.html) {
									document.getElementById('right_bar').innerHTML = data.html;
								} else {
									throw new Error('Invalid response data');
								}
							})
							.catch((error) => {
								console.error('Error:', error);
							   // alert('Failed to fetch ads: ' + error.message);
							});
					});

                </script>
				<script>
					const uploadButton = document.getElementById('uploadButton');
						const profileImageInput = document.getElementById('profileImageInput');
						const profileForm = document.getElementById('profileForm');

						if (uploadButton && profileImageInput && profileForm) {
							uploadButton.addEventListener('click', function () {
								profileImageInput.click();
							});

							profileImageInput.addEventListener('change', function () {
								profileForm.submit();
							});
						}
				</script>
                <script>
						function showVerificationStep() {
							document.getElementById('step1').classList.add('d-none');
							document.getElementById('step2').classList.remove('d-none');

							startTimer(60); // 60 seconds timer
						}

						function startTimer(duration) {
							const circularTimer = document.getElementById('circularTimer');
							const timerText = document.getElementById('timerText');
							let endTime = Date.now() + duration * 1000; // Calculate end time

							const interval = setInterval(() => {
								let now = Date.now();
								let remaining = Math.max(0, Math.floor((endTime - now) / 1000)); // Remaining seconds
								timerText.innerText = remaining;

								if (remaining <= 0) {
									clearInterval(interval);
									circularTimer.style.borderTopColor = '#e0e0e0'; // Timer ended
									return;
								}

								// Update the border color based on remaining time
								const percentage = (remaining / duration) * 100;
								const borderColor = `rgba(77, 91, 249, ${percentage / 100})`; // Dynamic border color
								circularTimer.style.borderTopColor = borderColor;
							}, 1000);
						}
                  </script>
                  <script>
						 document.getElementById('loginRegisterBtn').addEventListener('click', function (event) {
								event.preventDefault();
								var offcanvasElement = document.getElementById('offcanvasExample');
								var offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
								offcanvas.hide();

								offcanvasElement.addEventListener('hidden.bs.offcanvas', function () {
									var modalElement = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
									modalElement.show();
								}, { once: true });
							});

							var categorySwiper = new Swiper('#category-swiper', {
							slidesPerView: 1,
							loop: false,
							breakpoints: {
								320: {
									slidesPerView: 4,
								},
								480: {
									slidesPerView: 5,
								},
								640: {
									slidesPerView: 7,
								}
							},
							navigation: {
								nextEl: '.category-swiper-button-next',
								prevEl: '.category-swiper-button-prev',
							},
						});

							function getDirection() {
							  var windowWidth = window.innerWidth;
							  var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

							  return direction;
							}
							setTimeout(function () {
							  var preloaderContainer = document.getElementById('preloader-container');
							  preloaderContainer.style.display = 'none';
							}, 100);
                   </script>
                   <script>
							window.onscroll = function () { scrollFunction() };
							function scrollFunction() {
							  var mybutton = document.getElementById("myBtn");
							  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
								mybutton.style.display = "block";
							  } else {
								mybutton.style.display = "none";
							  }
							}

							function topFunction() {
							  document.body.scrollTop = 0;
							  document.documentElement.scrollTop = 0;
							}

                    </script>
                    <script>
							document.addEventListener('DOMContentLoaded', function () {
								var phoneNumberButton = document.getElementById('phoneNumberButton');
								var showPhoneNumberButton = document.getElementById('showPhoneNumberButton');
								var loginModal = new bootstrap.Modal(document.getElementById('loginModal'), {
									keyboard: false
								});

								// Function to handle button click based on authentication status
								phoneNumberButton.addEventListener('click', function () {
									@if(auth()->check())
										// User is logged in, show phone number
										showPhoneNumberButton.style.display = 'inline';
										phoneNumberButton.style.display = 'none';
									@else
										// User is not logged in, show modal
										loginModal.show();
									@endif
								});
							});
                     </script>
                     <script>
							var thumbsSwiper = new Swiper('.thumbs-swiper', {
								spaceBetween: 10,
								slidesPerView: 4,
								freeMode: true,
								watchSlidesProgress: true,
							});

							var mainSwiper = new Swiper('.main-swiper', {
								zoom: true,
								navigation: {
									nextEl: '.main-swiper-button-next',
									prevEl: '.main-swiper-button-prev',
								},
								thumbs: {
									swiper: thumbsSwiper,
								},
								pagination: {
									el: ".swiper-pagination",
									clickable: true,
								},
							});
                     </script>
                    <script src="{{ asset('js/authCheck.js') }}"></script>
                    <script>
						document.getElementById('phoneNumberButton').addEventListener('click', function(event) {
							@guest
								event.preventDefault();
								var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
								loginModal.show();
							@endguest
						});
                    </script>
		            <script>
						document.getElementById('postAdLink').addEventListener('click', function(event) {
							@guest
								event.preventDefault();
								var loginModal2 = new bootstrap.Modal(document.getElementById('loginModal2'));
								loginModal2.show();
							@endguest
						});
                    </script>
					<!--<script>
							document.addEventListener('DOMContentLoaded', function() {
							const input = document.getElementById('city');
							const label = document.querySelector('.custom-label');
							const cityList = document.getElementById('city-list');

							input.addEventListener('focus', function() {
								label.classList.add('focused');
								cityList.classList.add('show');
							});

							input.addEventListener('blur', function() {
								setTimeout(() => {
									if (!input.value) {
										label.classList.remove('focused');
									}
									cityList.classList.remove('show');
								}, 200);
							});

							cityList.addEventListener('mousedown', function(e) {
								if (e.target.tagName === 'LI') {
									input.value = e.target.textContent;
									input.dataset.value = e.target.dataset.value;
									label.classList.add('focused');
								}
							});

							input.addEventListener('input', function() {
								const filter = input.value.toLowerCase();
								const items = cityList.querySelectorAll('li');
								items.forEach(item => {
									if (item.textContent.toLowerCase().indexOf(filter) > -1) {
										item.style.display = '';
									} else {
										item.style.display = 'none';
									}
								});
							});
						});
					</script>-->
					<script>
						 document.addEventListener('DOMContentLoaded', function () {
							const imageContainers = document.querySelectorAll('.image-container');
							const maxImages = 20;

							imageContainers.forEach(container => {
								const fileInput = container.querySelector('.file-input');
								const addPhotoIcon = container.querySelector('.add-photo-icon');
								const hiddenInput = container.querySelector('.hiddenInput');
								let imagesArray = [];

								// Handle click event to trigger file input
								addPhotoIcon.addEventListener('click', () => {
									fileInput.click();
								});

								// Existing images delete functionality
								container.querySelectorAll('.delete-icon').forEach(icon => {
									icon.addEventListener('click', () => {
										const imageId = icon.dataset.id;
										// Send an AJAX request to delete the image from the server
										fetch(`/ads-images/${imageId}`, {
											method: 'DELETE',
											headers: {
												'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
											}
										}).then(response => {
											if (response.ok) {
												// Remove image from the DOM
												icon.parentElement.remove();
												updateIndices();
												updateHiddenInput();
												updateCoverBanner();
											} else {
												alert('Failed to delete image.');
											}
										});
									});
								});

								// Handle file input change for new images
								fileInput.addEventListener('change', () => {
									if (fileInput.files.length + imagesArray.length > maxImages) {
										alert(`You can upload a maximum of ${maxImages} images.`);
										fileInput.value = '';
										return;
									}

									Array.from(fileInput.files).forEach(file => {
										const reader = new FileReader();
										reader.onload = function (e) {
											const wrapper = document.createElement('div');
											wrapper.classList.add('image-wrapper');
											wrapper.setAttribute('data-index', imagesArray.length + 1); // Set the index dynamically

											const img = document.createElement('img');
											img.src = e.target.result;
											img.style.width = '100px';
											img.style.height = '100px';
											img.style.objectFit = 'cover';
											img.setAttribute('draggable', 'true');
											img.style.cursor = 'move';

											// Drag events
											img.addEventListener('dragstart', (event) => {
												event.dataTransfer.setData('text/plain', wrapper.dataset.index);
												setTimeout(() => {
													wrapper.classList.add('invisible');
												}, 0);
											});

											img.addEventListener('dragend', () => {
												wrapper.classList.remove('invisible');
												updateCoverBanner(); // Ensure the first image is always the cover after drag
											});

											// Delete icon for newly uploaded images
											const deleteIcon = document.createElement('span');
											deleteIcon.classList.add('delete-icon');
											deleteIcon.innerHTML = '&times;';
											deleteIcon.addEventListener('click', () => {
												const index = imagesArray.indexOf(file);
												if (index > -1) {
													imagesArray.splice(index, 1);
												}
												container.removeChild(wrapper);
												updateIndices();
												updateHiddenInput();
												updateCoverBanner();
											});

											wrapper.appendChild(img);
											wrapper.appendChild(deleteIcon);

											// Add to container and array
											container.insertBefore(wrapper, addPhotoIcon); // Insert the wrapper
											imagesArray.push(file); // Add image to array
											updateHiddenInput();
											updateCoverBanner(); // Update cover image
										};
										reader.readAsDataURL(file);
									});

									fileInput.value = ''; // Clear file input after selection
								});

								// Dragover event on container to allow drop
								container.addEventListener('dragover', (event) => {
									event.preventDefault();
								});

								// Drop event to handle repositioning of images
								container.addEventListener('drop', (event) => {
									event.preventDefault();
									const draggedIndex = parseInt(event.dataTransfer.getData('text/plain')) - 1;
									const targetWrapper = event.target.closest('.image-wrapper');

									if (targetWrapper && draggedIndex !== null) {
										const targetIndex = parseInt(targetWrapper.dataset.index) - 1;
										if (draggedIndex !== targetIndex) {
											// Swap images in the array
											[imagesArray[draggedIndex], imagesArray[targetIndex]] = [imagesArray[targetIndex], imagesArray[draggedIndex]];

											// Swap the DOM elements
											const allWrappers = Array.from(container.querySelectorAll('.image-wrapper'));
											const draggedWrapper = allWrappers[draggedIndex];
											const targetElement = allWrappers[targetIndex];

											if (draggedWrapper && targetElement) {
												const nextSibling = targetElement.nextSibling;
												container.insertBefore(draggedWrapper, nextSibling ? nextSibling : targetElement);
												container.insertBefore(targetElement, draggedWrapper.nextSibling);
											}

											updateIndices();
											updateHiddenInput();
											updateCoverBanner(); // Ensure the first image is the cover
										}
									}
								});

								// Function to update cover banner
								function updateCoverBanner() {
									const allWrappers = container.querySelectorAll('.image-wrapper');
									allWrappers.forEach(wrapper => {
										const coverBanner = wrapper.querySelector('.cover-banner');
										if (coverBanner) {
											wrapper.removeChild(coverBanner);
										}
									});

									if (allWrappers.length > 0) {
										const firstWrapper = allWrappers[0]; // First image is the cover
										const coverBanner = document.createElement('div');
										coverBanner.classList.add('cover-banner');
										coverBanner.textContent = 'Cover Image';
										firstWrapper.appendChild(coverBanner); // Add cover banner to the first image
									}
								}

								// Function to update indices
								function updateIndices() {
									const allWrappers = container.querySelectorAll('.image-wrapper');
									allWrappers.forEach((wrapper, index) => {
										wrapper.setAttribute('data-index', index + 1);
									});
								}

								function updateHiddenInput() {
									const dataTransfer = new DataTransfer();
									imagesArray.forEach(file => {
										dataTransfer.items.add(file);
									});
									hiddenInput.files = dataTransfer.files;
								}
							});
						});

					</script>
                    <script>
						 document.addEventListener('DOMContentLoaded', function () {
							const imageContainers = document.querySelectorAll('.custom-photo-container');
							const maxImages = 20;

							imageContainers.forEach(container => {
								const fileInput = container.querySelector('.custom-file-input');
								const addPhotoIcon = container.querySelector('.custom-add-photo');
								const hiddenInput = container.querySelector('.custom-hidden-input');
								let imagesArray = [];

								// Add existing images to the imagesArray and make them draggable
								container.querySelectorAll('.custom-image-wrapper').forEach((wrapper, index) => {
									imagesArray.push({ wrapper, type: 'existing', index });
									makeImageDraggable(wrapper);
								});

								// Handle click event to trigger file input
								addPhotoIcon.addEventListener('click', () => {
									fileInput.click();
								});

								// Handle file input change for new images
								fileInput.addEventListener('change', () => {
									const newFiles = Array.from(fileInput.files);

									if (newFiles.length + imagesArray.length > maxImages) {
										alert(`You can upload a maximum of ${maxImages} images.`);
										fileInput.value = '';
										return;
									}

									newFiles.forEach((file) => {
										const reader = new FileReader();
										reader.onload = function (e) {
											const wrapper = document.createElement('div');
											wrapper.classList.add('custom-image-wrapper');
											wrapper.setAttribute('data-index', imagesArray.length);

											const img = document.createElement('img');
											img.src = e.target.result;
											img.classList.add('custom-ad-image');
											img.style.width = '100px';
											img.style.height = '100px';
											img.style.objectFit = 'cover';
											img.setAttribute('draggable', 'true');
											img.style.cursor = 'move';

											// Delete icon for newly uploaded images
											const deleteIcon = document.createElement('span');
											deleteIcon.classList.add('custom-delete-icon');
											deleteIcon.innerHTML = '&times;';
											deleteIcon.addEventListener('click', () => {
												const index = imagesArray.findIndex(item => item.wrapper === wrapper);
												if (index > -1) {
													imagesArray.splice(index, 1); // Remove from array
												}
												container.removeChild(wrapper);
												updateHiddenInput();
												updateCoverBanner();
											});

											wrapper.appendChild(img);
											wrapper.appendChild(deleteIcon);

											container.insertBefore(wrapper, addPhotoIcon);

											// Add the newly uploaded image to imagesArray
											imagesArray.push({ file, wrapper, type: 'new' });
											updateHiddenInput();
											makeImageDraggable(wrapper);
											updateCoverBanner();
										};
										reader.readAsDataURL(file);
									});

									// Reset file input after processing

								});

								// Dragover event on container to allow drop
								container.addEventListener('dragover', (event) => {
									event.preventDefault();
								});

								// Drop event to handle repositioning of images
								container.addEventListener('drop', (event) => {
									event.preventDefault();
									const draggedIndex = parseInt(event.dataTransfer.getData('text/plain'), 10);
									const draggedItem = imagesArray[draggedIndex];

									const targetWrapper = event.target.closest('.custom-image-wrapper');
									if (targetWrapper) {
										const targetIndex = imagesArray.findIndex(item => item.wrapper === targetWrapper);

										if (targetIndex === 0) {
											// If dropped on cover image, make dragged image the cover
											moveToCover(draggedItem);
										} else if (draggedIndex !== targetIndex) {
											// Otherwise, swap images
											swapImages(draggedIndex, targetIndex);
										}
									}

									updateHiddenInput();
									updateCoverBanner();
								});

								// Function to make an image the cover image
								function moveToCover(item) {
									imagesArray = imagesArray.filter(i => i !== item); // Remove dragged item
									imagesArray.unshift(item); // Add dragged item to the start
									reorderDOM();
								}

								// Function to update cover banner
								function updateCoverBanner() {
									const allWrappers = container.querySelectorAll('.custom-image-wrapper');
									allWrappers.forEach(wrapper => {
										const coverBanner = wrapper.querySelector('.custom-cover-banner');
										if (coverBanner) {
											wrapper.removeChild(coverBanner);
										}
									});

									if (allWrappers.length > 0) {
										const firstWrapper = allWrappers[0]; // First image is the cover
										const coverBanner = document.createElement('div');
										coverBanner.classList.add('custom-cover-banner');
										coverBanner.textContent = 'Cover Image';
										firstWrapper.appendChild(coverBanner); // Add cover banner to the first image
									}
								}

								// Make an image wrapper draggable
								function makeImageDraggable(wrapper) {
									const img = wrapper.querySelector('img');
									img.addEventListener('dragstart', (event) => {
										const index = imagesArray.findIndex(item => item.wrapper === wrapper);
										if (index === 0) {
											event.preventDefault(); // Prevent dragging the cover image
										} else {
											event.dataTransfer.setData('text/plain', index);
											setTimeout(() => {
												wrapper.classList.add('invisible');
											}, 0);
										}
									});

									img.addEventListener('dragend', () => {
										wrapper.classList.remove('invisible');
										updateCoverBanner();
									});
								}

								// Swap images in the imagesArray and update the DOM
								function swapImages(index1, index2) {
									[imagesArray[index1], imagesArray[index2]] = [imagesArray[index2], imagesArray[index1]];
									reorderDOM();
								}

								// Reorder the DOM elements based on the current imagesArray
								function reorderDOM() {
									imagesArray.forEach(item => {
										container.insertBefore(item.wrapper, addPhotoIcon);
									});
									updateIndices();
								}

								// Function to update data-index attributes based on current positions
								function updateIndices() {
									imagesArray.forEach((item, i) => {
										item.wrapper.setAttribute('data-index', i);
									});
								}

								// Function to update the hidden input (for form submission)
								function updateHiddenInput() {
									const dataTransfer = new DataTransfer();
									imagesArray.forEach(item => {
										if (item.type === 'new') {
											dataTransfer.items.add(item.file); // Add only the new files
										}
									});
									hiddenInput.files = dataTransfer.files; // Update the hidden input field
								}
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




						document.addEventListener('DOMContentLoaded', function() {
						const swiper = new Swiper("#full-width-swiper", {
							centeredSlides: true,
							slidesPerView: 1, // Show one slide at a time
							grabCursor: true,
							freeMode: false,
							loop: true,
							mousewheel: false,
							keyboard: {
								enabled: true
							},
							autoplay: {
								delay: 3000, // Auto-slide interval (3 seconds)
								disableOnInteraction: false // Continue autoplay even after user interaction
							},
							pagination: {
								el: ".swiper-pagination",
								dynamicBullets: false,
								clickable: true
							},
							navigation: {
								nextEl: '.custom-swiper-button-next',
								prevEl: '.custom-swiper-button-prev',
							},
							breakpoints: {
								640: {
									slidesPerView: 1,
									spaceBetween: 0
								},
								1024: {
									slidesPerView: 1,
									spaceBetween: 0
								}
							}
						});
					});

                 </script>
                 <script>
					document.addEventListener('DOMContentLoaded', function() {
						// Handle Make Tabs
						const makeTabs = document.querySelectorAll('#nav-make-tab .nav-tab-button');
						makeTabs.forEach(tab => {
							tab.addEventListener('click', function() {
								const makeText = this.innerText.trim(); // Get the inner text of the selected make tab
								document.getElementById('make_bike_input').value = makeText; // Update hidden input field for make
								console.log('make text: ' + makeText);
							});
						});

						// Handle Model Tabs (inside each make tab content)
						const makeTabs2 = document.querySelectorAll('.nav-tab-button2');
						makeTabs2.forEach(tab => {
							tab.addEventListener('click', function() {
								const makeText2 = this.innerText.trim(); // Get the inner text of the selected make tab
								document.getElementById('make_bike_input2').value = makeText2; // Update hidden input field with the selected make
								console.log('Selected Make: ' + makeText2);
							});
						});

					});
                </script>
                <script>
						$(document).ready(function() {
							var isExpanded = false; // Track whether brands are expanded

							$('#toggleBrands').on('click', function() {
								// Toggle the visibility of the .more-brands section
								$('.more-brands').slideToggle();

								// Toggle the "View More" and "View Less" text
								if (isExpanded) {
									$('#toggleBrands').html('View More <i id="toggleIcon" class="fa-solid fa-chevron-down"></i>');
								} else {
									$('#toggleBrands').html('View Less <i id="toggleIcon" class="fa-solid fa-chevron-up"></i>');
								}

								// Flip the expanded state
								isExpanded = !isExpanded;
							});
						});
                </script>
				<script>
					$(document).ready(function() {
						var isExpanded = false; // Track whether features are expanded

						$('#toggleFeatures').on('click', function() {
							// Toggle the visibility of the .more-features section
							$('.more-features').slideToggle();

							// Toggle the "View More" and "View Less" text
							if (isExpanded) {
								$('#toggleFeatures').html('View More <i id="toggleIcon" class="fa-solid fa-chevron-down fs-6"></i>');
							} else {
								$('#toggleFeatures').html('View Less <i id="toggleIcon" class="fa-solid fa-chevron-up fs-6"></i>');
							}

							// Flip the expanded state
							isExpanded = !isExpanded;
						});
					});
				</script>
                <script>
				   document.addEventListener('DOMContentLoaded', function() {
						var toggleCarNames = document.getElementById('toggleCarNames');

						// Check if the element exists before adding the event listener
						if (toggleCarNames) {
							toggleCarNames.addEventListener('click', function() {
								var moreCarNames = document.querySelector('.more-car-names');
								var toggleIcon = document.getElementById('toggleIcon');

								if (moreCarNames.style.display === 'none' || moreCarNames.style.display === '') {
									moreCarNames.style.display = 'block';
									this.textContent = ' View Less ';
									toggleIcon.classList.remove('fa-chevron-down');
									toggleIcon.classList.add('fa-chevron-up'); // Change icon to up arrow
								} else {
									moreCarNames.style.display = 'none';
									this.textContent = ' View More ';
									toggleIcon.classList.remove('fa-chevron-up');
									toggleIcon.classList.add('fa-chevron-down'); // Change icon to down arrow
								}
							});
						} else {
							// console.error('Element with ID "toggleCarNames" not found.');
						}
					});
              </script>
              <script>
					document.addEventListener('DOMContentLoaded', function() {
						var toggleProducts = document.getElementById('toggleProducts');

						// Check if the element exists before adding the event listener
						if (toggleProducts) {
							toggleProducts.addEventListener('click', function() {
								var moreProducts = document.querySelector('.more-products');
								var toggleIcon = document.getElementById('toggleIcon');

								if (moreProducts.style.display === 'none' || moreProducts.style.display === '') {
									moreProducts.style.display = 'block';
									this.textContent = ' View Less ';
									toggleIcon.classList.remove('fa-chevron-down');
									toggleIcon.classList.add('fa-chevron-up'); // Change icon to up arrow
								} else {
									moreProducts.style.display = 'none';
									this.textContent = ' View More ';
									toggleIcon.classList.remove('fa-chevron-up');
									toggleIcon.classList.add('fa-chevron-down'); // Change icon to down arrow
								}
							});
						} else {
							// console.error('Element with ID "toggleProducts" not found.');
						}
					});
               </script>
			   <script>
				   $.ajaxSetup({
					   headers: {
						   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					   }
				   });
			   </script>
               <script>
				   $(document).ready(function () {
                // Function to handle radio button changes in the "category_name" group
                $('input[type="radio"][name="category_name"]').on('change', function () {
                    // Uncheck all other groups
                    $('input[type="radio"][name="sub_category_name"], input[type="radio"][name="sub_category_name_type"]').prop('checked', false);

                    // Reset styles for all labels in all groups
                    $('label.category_name, label.subcategory_name, label.subcategory_type_name').css('color', '').css('font-weight', '');

                    // Apply active style to the selected "category_name" radio button's label
                    $(this).next('label').css('color', 'black').css('font-weight', '600');
                });

                // Function to handle radio button changes in the "sub_category_name" group
                $('input[type="radio"][name="sub_category_name"]').on('change', function () {
                    // Uncheck all other groups
                    $('input[type="radio"][name="category_name"], input[type="radio"][name="sub_category_name_type"]').prop('checked', false);

                    // Reset styles for all labels in all groups
                    $('label.category_name, label.subcategory_name, label.subcategory_type_name').css('color', '').css('font-weight', '');

                    // Apply active style to the selected "sub_category_name" radio button's label
                    $(this).next('label').css('color', 'black').css('font-weight', '600');
                });

                // Function to handle radio button changes in the "sub_category_name_type" group
                $('input[type="radio"][name="sub_category_name_type"]').on('change', function () {
                    // Uncheck all other groups
                    $('input[type="radio"][name="category_name"], input[type="radio"][name="sub_category_name"]').prop('checked', false);

                    // Reset styles for all labels in all groups
                    $('label.category_name, label.subcategory_name, label.subcategory_type_name').css('color', '').css('font-weight', '');

                    // Apply active style to the selected "sub_category_name_type" radio button's label
                    $(this).next('label').css('color', 'black').css('font-weight', '600');
                });

                // Trigger change event to apply active styles on page load if something is checked
                $('input[type="radio"]:checked').trigger('change');
            });
				</script>
				<!--<script>
				   $(document).ready(function () {
					// Load cities from the cities.json file
					$.getJSON('/cities.json', function (cities) {
						// Populate dropdown and radio list
						populateCityDropdown(cities);
					}).fail(function (jqXHR, textStatus, errorThrown) {
						console.error("Error fetching location data:", textStatus, errorThrown);
						alert('Failed to load cities. Please try again later.');
					});

					// Show the dropdown when clicked
					$('#dropdownTrigger2').on('click', function () {
						$('#cityDropdownMenu').toggleClass('show'); // Toggle Bootstrap's dropdown class
					});

					// Search functionality
					$('#citySearch2').on('input', function () {
						let searchTerm = $(this).val().toLowerCase();
						filterCities(searchTerm);
					});

					// Function to populate the city dropdown and radio list
					function populateCityDropdown(cities) {
						let cityDropdownMenu = $('#cityDropdownMenu');

						// Empty the dropdown menu first
						cityDropdownMenu.find('li:not(:first)').remove(); // Keep the first li (search bar)

						// Populate the dropdown list
						cities.forEach(city => {
							let cityItem = `<li class="dropdown-item" style="cursor: pointer;" data-name="${city.name}">${city.name}</li>`;
							cityDropdownMenu.append(cityItem);
						});

						// Handle city selection in the dropdown
						cityDropdownMenu.on('click', 'li:not(:first)', function () {
							let selectedCityName = $(this).data('name');
							$('#selectedCity2').text(selectedCityName);
							$('#cityDropdownMenu').removeClass('show'); // Close the dropdown on selection
						});
					}

					// Filter cities based on search input
					function filterCities(searchTerm) {
						$('#cityDropdownMenu li').each(function () {
							if ($(this).index() === 0) return; // Skip the search input
							let cityName = $(this).data('name').toLowerCase();
							if (cityName.includes(searchTerm)) {
								$(this).show();
							} else {
								$(this).hide();
							}
						});
					}
				});
			</script>-->
			<script>
				document.addEventListener('DOMContentLoaded', function() {
					// Handle click events for all labels
					const labels = document.querySelectorAll('.area-unit-label');

					labels.forEach(function(label) {
						label.addEventListener('click', function() {
							// Reset all labels' styles
							labels.forEach(function(otherLabel) {
								otherLabel.style.color = '#666';
								otherLabel.style.fontWeight = 'normal';
							});

							// Apply active styles to the clicked label
							label.style.color = '#000';
							label.style.fontWeight = 'bold';
						});
					});
				});
			</script>

			<script>
			   $(document).ready(function() {

				// Function to fetch ads based on the current filters
				 function fetchAds(filters) {
					$.ajax({
						url: '/search-filter',  // Backend URL that handles filtering
						type: 'GET',
						data: filters,  // Send the filters object
							success: function(response) {
								// Update the ads container with the new ads view
								if (response.adsView) {
									$('#right_bar').html(response.adsView);
								} else {
									console.log('No adsView found in response.');
								}

								// Optionally update the filter section if needed
								if (response.filtersView) {
									$('#filter-section').html(response.filtersView);
								} else {
									console.log('No filtersView found in response.');
								}

								hideAllCards();

								// Define subCategoryName from filters if present
								var subCategoryName = filters['sub_category_name'] || ''; // Default to empty if not set
								var subCategoryType = filters['sub_category_name_type'] || ''; // Assign default empty string if not defined

								// Example: Smart_watch filter
								if (subCategoryName.includes('Smart_watch')) {
								   // console.log("Displaying deliverable card");
									$('.deliverable6_card').css('display', 'block');
									$('.brand2_card').css('display', 'block');
									$('.condition5_card').css('display', 'block');
								} else {
								   // console.log("Hiding deliverable card");
									$('.deliverable6_card').css('display', 'none');
									$('.brand2_card').css('display', 'none');
									$('.condition5_card').css('display', 'none');
								}

								if (subCategoryName === 'Smart_watch') {
								   // console.log("Displaying deliverable card");
									$('.deliverable6_card').css('display', 'block');
									$('.brand2_card').css('display', 'block');
									$('.condition5_card').css('display', 'block');
								} else {
								   // console.log("Hiding deliverable card");
									$('.deliverable6_card').css('display', 'none');
									$('.brand2_card').css('display', 'none');
									$('.condition5_card').css('display', 'none');
								}

								if (subCategoryName === 'Mobiles_phones') {
								  //  console.log("Displaying deliverable card");
									$('.deliverable7_card').css('display', 'block');
									$('.brand3_card').css('display', 'block');
								} else {
								  //  console.log("Hiding deliverable card");
									$('.deliverable7_card').css('display', 'none');
									$('.brand3_card').css('display', 'none');
								}
								// Logic for showing or hiding Condition and Brand card based on Tablets subcategory
								if (subCategoryName ==='Tablets') {
								  //  console.log("Displaying Condition && Brand card");
									$('.deliverable1_card').css('display', 'block');
									$('.brand1_card').css('display', 'block');
									$('.condition1_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Condition && Brand card");
									$('.deliverable1_card').css('display', 'none');
									$('.brand1_card').css('display', 'none');
									$('.condition1_card').css('display', 'none');
								}


								if (subCategoryName === 'Car') {
								  //  console.log("Displaying Car card");
									$('.make_car1_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Car card");
									$('.make_car1_card').css('display', 'none');
								}

								if (subCategoryName === 'Cars_on_Installments') {
								 //   console.log("Displaying Cars_on_Installments card");
									$('.make_car2_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Cars_on_Installments card");
									$('.make_car2_card').css('display', 'none');
								}

								if (subCategoryName ==='Cars_Accessories') {
								  //  console.log("Displaying Cars_Accessories card");
									$('.condition6_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Cars_Accessories card");
									$('.condition6_card').css('display', 'none');
								}
								if (subCategoryName ==='Spare_Parts') {
								  //  console.log("Displaying Spare_Parts card");
									$('.type4_card').css('display', 'block');
									$('.condition7_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Spare_Parts card");
									$('.type4_card').css('display', 'none');
									$('.condition7_card').css('display', 'none');
								}
								if (subCategoryName === 'Buses_Vans_Trucks') {
								  //  console.log("Displaying Buses_Vans_Trucks card");
									$('.year1_card').css('display', 'block');
									$('.kms_driven1_card').css('display', 'block');
									$('.condition8_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Buses_Vans_Trucks card");
									$('.year1_card').css('display', 'none');
									$('.kms_driven1_card').css('display', 'none');
									$('.condition8_card').css('display', 'none');
								}
								if (subCategoryName ==='Rickshaw_Chingchi') {
								 //   console.log("Displaying Rickshaw_Chingchi card");
									$('.year2_card').css('display', 'block');
									$('.kms_driven2_card').css('display', 'block');
									$('.condition9_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Rickshaw_Chingchi card");
									$('.year2_card').css('display', 'none');
									$('.kms_driven2_card').css('display', 'none');
									$('.condition9_card').css('display', 'none');
								}
								if (subCategoryName === 'Tractors_Trailers') {
								 //   console.log("Displaying Tractors_Trailers card");
									$('.year5_card').css('display', 'block');
									$('.kms_drive5_card').css('display', 'block');
									$('.condition36_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Tractors_Trailers card");
									$('.year5_card').css('display', 'none');
									$('.kms_drive5_card').css('display', 'none');
									$('.condition36_card').css('display', 'none');
								}
								if (subCategoryName === 'Boats') {
								 //   console.log("Displaying Boats card");
									$('.condition10_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Boats card");
									$('.condition10_card').css('display', 'none');
								}
								if (subCategoryName === 'Land_&_Plots' ) {
								  //  console.log("Displaying Boats card");
									$('.type5_card').css('display', 'block');
									$('.feature1_card').css('display', 'block');
									$('.area_unit1_card').css('display', 'block');
									$('.area1_card').css('display', 'block');

								} else {
								  //  console.log("Hiding Boats card");
									$('.type5_card').css('display', 'none');
									$('.feature1_card').css('display', 'none');
									$('.area_unit1_card').css('display', 'none');
									$('.area1_card').css('display', 'none');
								}
								if (subCategoryName ==='Houses' ) {
								  //  console.log("Displaying Houses card");
									$('.furnished1_card').css('display', 'block');
									$('.pro_sale_house_bedroom_card').css('display', 'block');
									$('.pro_sale_house_bathroom_card').css('display', 'block');
									$('.construction_state_new').css('display', 'block');
									$('.feature2_card').css('display', 'block');
									$('.area_unit2_card').css('display', 'block');
									$('.area2_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Houses card");
									$('.furnished1_card').css('display', 'none');
									$('.pro_sale_house_bedroom_card').css('display', 'none');
									$('.pro_sale_house_bathroom_card').css('display', 'none');
									$('.construction_state_new').css('display', 'none');
									$('.feature2_card').css('display', 'none');
									$('.area_unit2_card').css('display', 'none');
									$('.area2_card').css('display', 'none');
								}
								if (subCategoryName === 'Apartments_&_Flats') {
								  //  console.log("Displaying Apartments_&_Flats card");
									$('.furnished2_card').css('display', 'block');
									$('.pro_sale_appart_bedroom_card').css('display', 'block');
									$('.pro_sale_appart_bathroom_card').css('display', 'block');
									$('.construction_state_new2').css('display', 'block');
									$('.feature3_card').css('display', 'block');
									$('.area_unit3_card').css('display', 'block');
									$('.area3_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Apartments_&_Flats card");
									$('.furnished2_card').css('display', 'none');
									$('.pro_sale_appart_bedroom_card').css('display', 'none');
									$('.pro_sale_appart_bathroom_card').css('display', 'none');
									$('.construction_state_new2').css('display', 'none');
									$('.feature3_card').css('display', 'none');
									$('.area_unit3_card').css('display', 'none');
									$('.area3_card').css('display', 'none');
								}
								if (subCategoryName === 'Shops_Offices_Commercial_Space') {
								  //  console.log("Displaying Shops_Offices_Commercial_Space card");
									$('.type12_card').css('display', 'block');
									$('.pro_sale_shope_floor_level_card').css('display', 'block');
									$('.feature4_card').css('display', 'block');
									$('.area_unit4_card').css('display', 'block');
									$('.area4_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Shops_Offices_Commercial_Space card");
									$('.type12_card').css('display', 'none');
									$('.pro_sale_shope_floor_level_card').css('display', 'none');
									$('.feature4_card').css('display', 'none');
									$('.area_unit4_card').css('display', 'none');
									$('.area4_card').css('display', 'none');
								}
								if (subCategoryName === 'Portions_&_Floors' ) {
								  //  console.log("Displaying Portions_&_Floors card");
									$('.furnished3_card').css('display', 'block');
									$('.pro_sale_portion_bedroom_card').css('display', 'block');
									$('.pro_sale_portion_bathroom_card').css('display', 'block');
									$('.feature5_card').css('display', 'block');
									$('.pro_sale_portion_floor_level_card').css('display', 'block');
									$('.area_unit5_card').css('display', 'block');
									$('.area5_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Portions_&_Floors card");
									$('.furnished3_card').css('display', 'none');
									$('.pro_sale_portion_bedroom_card').css('display', 'none');
									$('.pro_sale_portion_bathroom_card').css('display', 'none');
									$('.pro_sale_portion_floor_level_card').css('display', 'none');
									$('.feature5_card').css('display', 'none');
									$('.area_unit5_card').css('display', 'none');
									$('.area5_card').css('display', 'none');
								}
								if (subCategoryName === 'Houses_for_Rent') {
								  //  console.log("Displaying Houses_for_Rent card");
									$('.furnished4_card').css('display', 'block');
									$('.pro_rent_house_bedroom_card').css('display', 'block');
									$('.pro_rent_house_bathroom_card').css('display', 'block');
									$('.no_storeys_card').css('display', 'block');
									$('.feature6_card').css('display', 'block');
									$('.construction_state_new_rent_house_card').css('display', 'block');
									$('.area_unit6_card').css('display', 'block');
									$('.area6_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Houses_for_Rent card");
									$('.furnished4_card').css('display', 'none');
									$('.pro_rent_house_bedroom_card').css('display', 'none');
									$('.pro_rent_house_bathroom_card').css('display', 'none');
									$('.no_storeys_card').css('display', 'none');
									$('.construction_state_new_rent_house_card').css('display', 'none');
									$('.feature6_card').css('display', 'none');
									$('.area_unit6_card').css('display', 'none');
									$('.area6_card').css('display', 'none');
								}
								if (subCategoryName === 'Apartments_&_Flats_Rent') {
								  //  console.log("Displaying Apartments_&_Flats_Rent card");
									$('.furnished5_card').css('display', 'block');
									$('.pro_rent_appart_bedroom_card').css('display', 'block');
									$('.pro_rent_apart_bathroom_card').css('display', 'block');
									$('.pro_rent_appart_floor_card').css('display', 'block');
									$('.feature7_card').css('display', 'block');
									$('.area_unit7_card').css('display', 'block');
									$('.area7_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Apartments_&_Flats_Rent card");
									$('.furnished5_card').css('display', 'none');
									$('.pro_rent_appart_bedroom_card').css('display', 'none');
									$('.pro_rent_apart_bathroom_card').css('display', 'none');
									$('.pro_rent_appart_floor_card').css('display', 'none');
									$('.feature7_card').css('display', 'none');
									$('.area_unit7_card').css('display', 'none');
									$('.area7_card').css('display', 'none');
								}
								if (subCategoryName ==='Portions_&_Floors_Rent') {
								  //  console.log("Displaying Portions_&_Floors_Rent card");
									$('.furnished6_card').css('display', 'block');
									$('.bedroom2_card').css('display', 'block');
									$('.bathroom2_card').css('display', 'block');
									$('.floor_level2_card').css('display', 'block');
									$('.feature8_card').css('display', 'block');
									$('.area_unit8_card').css('display', 'block');
									$('.area8_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Portions_&_Floors_Rent card");
									$('.furnished6_card').css('display', 'none');
									$('.bedroom2_card').css('display', 'none');
									$('.bathroom2_card').css('display', 'none');
									$('.floor_level2_card').css('display', 'none');
									$('.feature8_card').css('display', 'none');
									$('.area_unit8_card').css('display', 'none');
									$('.area8_card').css('display', 'none');
								}
								if (subCategoryName === 'Shops_Offices_Commercial_Space_Rent') {
								  //  console.log("Displaying Shops_Offices_Commercial_Space_Rent card");
									$('.type13_card').css('display', 'block');
									$('.rent_shope_bathroom_card').css('display', 'block');
									$('.floor_level_shope_rent_card').css('display', 'block');
									$('.feature9_card').css('display', 'block');
									$('.area_unit9_card').css('display', 'block');
									$('.area9_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Shoprent_shope_bathroom_cards_Offices_Commercial_Space_Rent card");
									$('.type13_card').css('display', 'none');
									$('.rent_shope_bathroom_card').css('display', 'none');
									$('.floor_level_shope_rent_card').css('display', 'none');
									$('.feature9_card').css('display', 'none');
									$('.area_unit9_card').css('display', 'none');
									$('.area9_card').css('display', 'none');
								}
								if (subCategoryName ==='Rooms') {
								 //   console.log("Displaying Rooms card");
									$('.type6_card').css('display', 'block');
									$('.furnished7_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Rooms card");
									$('.type6_card').css('display', 'none');
									$('.furnished7_card').css('display', 'none');
								}
								if (subCategoryName === 'Roommates_Paying_Guests') {
								  //  console.log("Displaying Roommates_Paying_Guests card");
									$('.type7_card').css('display', 'block');
									$('.furnished8_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Roommates_Paying_Guests card");
									$('.type7_card').css('display', 'none');
									$('.furnished8_card').css('display', 'none');
								}
								if (subCategoryName === 'Vacation_Rentals_Guest_Houses') {
								  //  console.log("Displaying Vacation_Rentals_Guest_Houses card");
									$('.bedroom_vacation_rent_card').css('display', 'block');
									$('.bathroom_vacation_rent_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Vacation_Rentals_Guest_Houses card");
									$('.bedroom_vacation_rent_card').css('display', 'none');
									$('.bathroom_vacation_rent_card').css('display', 'none');
								}
								if (subCategoryName === 'Land_&_Plots_Rent') {
								  //  console.log("Displaying Land_&_Plots_Rent card");
									$('.type8_card').css('display', 'block');
									$('.feature10_card').css('display', 'block');
									$('.area_unit10_card').css('display', 'block');
									$('.area10_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Land_&_Plots_Rent card");
									$('.type8_card').css('display', 'none');
									$('.feature10_card').css('display', 'none');
									$('.area_unit10_card').css('display', 'none');
									$('.area10_card').css('display', 'none');
								}
								if (subCategoryType ==='Charging_Cables') {
								 //   console.log("Displaying Charging_Cables card");
									$('.deliverable2_card').css('display', 'block');
									$('.condition2_card').css('display', 'block');
									$('.type1_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Condition card");
									$('.deliverable2_card').css('display', 'none');
									$('.condition2_card').css('display', 'none');
									$('.type1_card').css('display', 'none');
								}
								if (subCategoryType === 'Converters') {
								  //  console.log("Displaying Condition card");
									$('.deliverable4_card').css('display', 'block');
									$('.condition3_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Condition card");
								  $('.deliverable4_card').css('display', 'none');
									$('.condition3_card').css('display', 'none');
								}

								if (subCategoryType === 'Chargers') {
								 //   console.log("Displaying Chargers card");
									$('.deliverable3_card').css('display', 'block');
									$('.device1_card').css('display', 'block');
									$('.type2_card').css('display', 'block');
									$('.condition4_card').css('display', 'block');
								} else {
								   // console.log("Hiding Condition card");
									$('.deliverable3_card').css('display', 'none');
									$('.device1_card').css('display', 'none');
									$('.type2_card').css('display', 'none');
									$('.condition4_card').css('display', 'none');
								}
								if (subCategoryType === 'Screen') {
								 //   console.log("Displaying Chargers card");
									$('.deliverable5_card').css('display', 'block');

									$('.type3_card').css('display', 'block');

								} else {
								   // console.log("Hiding Condition card");
									$('.deliverable5_card').css('display', 'none');

									$('.type3_card').css('display', 'none');

								}
								if (subCategoryType === 'Electric_Bikes') {
								 //   console.log("Displaying Electric_Bikes card");
									$('.condition11_card').css('display', 'block');
									$('.year3_card').css('display', 'block');
									$('.make_bike1_card').css('display', 'block');
									$('.kms_driven3_card').css('display', 'block');
									$('.engine_type1_card').css('display', 'block');
									$('.engine_capacity1_card').css('display', 'block');
									$('.ignition_type1_card').css('display', 'block');
									$('.origin1_card').css('display', 'block');
									$('.registration1_city_card').css('display', 'block');
								} else {
								  //  console.log("Hiding Electric_Bikes card");
									$('.condition11_card').css('display', 'none');
									$('.year3_card').css('display', 'none');
									$('.make_bike1_card').css('display', 'none');
									$('.kms_driven3_card').css('display', 'none');
									$('.engine_type1_card').css('display', 'none');
									$('.engine_capacity1_card').css('display', 'none');
									$('.ignition_type1_card').css('display', 'none');
									$('.origin1_card').css('display', 'none');
									$('.registration1_city_card').css('display', 'none');
								}
								if (subCategoryType === 'Sports_Heavy_Bikes') {
								  //  console.log("Displaying Sports_Heavy_Bikes card");
									$('.condition12_card').css('display', 'block');
									$('.year4_card').css('display', 'block');
									$('.make_bike2_card').css('display', 'block');
									$('.kms_drive4_card').css('display', 'block');
									$('.engine_type2_card').css('display', 'block');
									$('.engine_capacity2_card').css('display', 'block');
									$('.ignition_type2_card').css('display', 'block');
									$('.origin2_card').css('display', 'block');
									$('.registration2_city_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Sports_Heavy_Bikes card");
									$('.condition12_card').css('display', 'none');
									$('.year4_card').css('display', 'none');
									$('.make_bike2_card').css('display', 'none');
									$('.kms_drive4_card').css('display', 'none');
									$('.engine_type2_card').css('display', 'none');
									$('.engine_capacity2_card').css('display', 'none');
									$('.ignition_type2_card').css('display', 'none');
									$('.origin2_card').css('display', 'none');
									$('.registration2_city_card').css('display', 'none');
								}
								if (subCategoryType === 'Air_Filters') {
								 //   console.log("Displaying Air_Filters card");
									$('.condition13_card').css('display', 'block');

								} else {
								 //   console.log("Hiding Air_Filters card");
									$('.condition13_card').css('display', 'none');

								}
								if (subCategoryType === 'Carburetors') {
								 //   console.log("Displaying Carburetors card");
									$('.condition14_card').css('display', 'block');

								} else {
								 //   console.log("Hiding Carburetors card");
									$('.condition14_card').css('display', 'none');

								}
								if (subCategoryType === 'Bearings') {
								 //   console.log("Displaying Bearings card");
									$('.condition15_card').css('display', 'block');

								} else {
								  //  console.log("Hiding Bearings card");
									$('.condition15_card').css('display', 'none');

								}
								if (subCategoryType === 'Side_Mirrors') {
								 //   console.log("Displaying Side_Mirrors card");
									$('.condition16_card').css('display', 'block');

								} else {
								  //  console.log("Hiding Side_Mirrors card");
									$('.condition16_card').css('display', 'none');

								}
								if (subCategoryType === 'Motorcycle_Batteries') {
								 //   console.log("Displaying Side_Mirrors card");
									$('.condition17_card').css('display', 'block');

								} else {
								 //   console.log("Hiding Motorcycle_Batteries card");
									$('.condition17_card').css('display', 'none');

								}
								if (subCategoryType === 'Switches') {
								  //  console.log("Displaying Side_Mirrors card");
									$('.condition18_card').css('display', 'block');

								} else {
								  //  console.log("Hiding Switches card");
									$('.condition18_card').css('display', 'none');

								}
								if (subCategoryType === 'Road_Bikes') {
									$('.make_bike3_card').css('display', 'block');
									$('.condition19_card').css('display', 'block');

								} else {
								 //   console.log("Hiding Road_Bikes card");
									$('.make_bike3_card').css('display', 'none');
									$('.condition19_card').css('display', 'none');

								}
								if (subCategoryType === 'Mountain_Bikes') {
									$('.condition20_card').css('display', 'block');
									$('.make_bike4_card').css('display', 'block');

								} else {
								 //   console.log("Hiding Mountain_Bikes card");
									$('.condition20_card').css('display', 'none');
									$('.make_bike4_card').css('display', 'none');

								}
								if (subCategoryType === 'Electric_Bicycles') {
								 //   console.log("Displaying Electric_Bicycles card");
									$('.condition21_card').css('display', 'block');
									$('.make_bike5_card').css('display', 'block');

								} else {
								//    console.log("Hiding Electric_Bicycles card");
									$('.condition21_card').css('display', 'none');
									$('.make_bike5_card').css('display', 'none');

								}
								if (subCategoryType === 'Sofas') {
								 //   console.log("Displaying Sofas card");
									$('.condition22_card').css('display', 'block');
									$('.type9_card').css('display', 'block');

								} else {
								 //   console.log("Hiding Sofas card");
									$('.condition22_card').css('display', 'none');
									$('.type9_card').css('display', 'none');

								}
								if (subCategoryType ==='Sofa_Beds') {
								 //   console.log("Displaying Sofa_Beds card");
									$('.condition23_card').css('display', 'block');


								} else {
								 //   console.log("Hiding Sofa_Beds card");
									$('.condition23_card').css('display', 'none');


								}
								if (subCategoryType === 'Office_Chairs') {
									// console.log("Displaying Office_Chairs card");
									$('.condition24_card').css('display', 'block');
									$('.type11_card').css('display', 'block');

								} else {
									// console.log("Hiding Office_Chairs card");
									$('.condition24_card').css('display', 'none');
									$('.type11_card').css('display', 'none');

								}
								if (subCategoryType === 'Office_Sofas') {
									// console.log("Displaying Office_Sofas card");
									$('.condition25_card').css('display', 'block');

								} else {
									// console.log("Hiding Office_Sofas card");
									$('.condition25_card').css('display', 'none');   
								}
								if (subCategoryType === 'Office_Tables') {
									// console.log("Displaying Office_Tables card");
									$('.condition26_card').css('display', 'block'); 
								} else {
									// console.log("Hiding Office_Tables card");
									$('.condition26_card').css('display', 'none');
								}
								if (subCategoryType === 'Caps') {
									// console.log("Displaying Caps card");
									$('.condition27_card').css('display', 'block');
								} else {
									// console.log("Hiding Caps card");
									$('.condition27_card').css('display', 'none');   
								}
								if (subCategoryType === 'Scarves') {
									// console.log("Displaying Scarves card");
									$('.condition28_card').css('display', 'block');
								} else {
								 //   console.log("Hiding Scarves card");
									$('.condition28_card').css('display', 'none'); 
								}
								if (subCategoryType === 'Gloves') {
									// console.log("Displaying Scarves card");
									$('.condition37_card').css('display', 'block');

								} else {
									// console.log("Hiding Gloves card");
									$('.condition37_card').css('display', 'none');
								}
								if (subCategoryType === 'Eyes') {
									// console.log("Displaying Eyes card");
									$('.condition29_card').css('display', 'block');

								} else {
								 //   console.log("Hiding Eyes card");
									$('.condition29_card').css('display', 'none');
								}
								if (subCategoryType === 'Brushes') {
									// console.log("Displaying Brushes card");
									$('.condition30_card').css('display', 'block');

								} else {
									// console.log("Hiding Brushes card");
									$('.condition30_card').css('display', 'none');
								}
								if (subCategoryType === 'Face') {
									// console.log("Displaying Face card");
									$('.condition31_card').css('display', 'block');

								} else {
									// console.log("Hiding Face card");
									$('.condition31_card').css('display', 'none');
								}
								if (subCategoryType === 'Hair_Care') {
								 //   console.log("Displaying Hair_Care card");
									$('.condition32_card').css('display', 'block');
									 $('.product1_card').css('display', 'block');

								} else {
									// console.log("Hiding Hair_Care card");
									$('.condition32_card').css('display', 'none');
									$('.product1_card').css('display', 'none');
								}
								if (subCategoryType === 'Skin_Care') {
								 //   console.log("Displaying Skin_Care card");
									$('.condition33_card').css('display', 'block');
									$('.product2_card').css('display', 'block');

								} else {
									// console.log("Hiding Skin_Care card");
									$('.condition33_card').css('display', 'none');
									$('.product2_card').css('display', 'none');
								}
								if (subCategoryType === 'Bridals') {
									// console.log("Displaying Bridals card");
									$('.condition34_card').css('display', 'block');

								} else {
									// console.log("Hiding Bridals card");
									$('.condition34_card').css('display', 'none');
								}
								if (subCategoryType === 'Grooms') {
									// console.log("Displaying Grooms card");
									$('.condition35_card').css('display', 'block');

								} else {
									// console.log("Hiding Grooms card");
									$('.condition35_card').css('display', 'none');
								}
							},
							error: function(xhr) {
								console.error('Filter error:', xhr.responseText);  // For debugging any error
							}
						});
					}

					// Function to collect filters and fetch ads
				   function collectAndFetchFilters() {
						var filters = {};

						var category = $('input[name="category_name"]:checked').val();
						if (category) filters['category_name'] = category;

						var subcategory = $('input[name="sub_category_name"]:checked').val();
						if (subcategory) filters['sub_category_name'] = subcategory;

						var subcategoryType = $('input[name="sub_category_name_type"]:checked').val();
						if (subcategoryType) filters['sub_category_name_type'] = subcategoryType;

						var location = $('#selectedCityInput').val(); // Use hidden input to get city
						if (location && location !== 'Select a City') filters['location'] = location;

						var priceMin = $('#inputMin').val();
						var priceMax = $('#inputMax').val();
						if (priceMin) filters['price_min'] = priceMin;
						if (priceMax) filters['price_max'] = priceMax;

						filters['sort'] = $('#sort-by-select').val();

						$('#filterads input:checkbox:checked').each(function () {
							var inputName = $(this).attr('name');
							if (!filters[inputName]) filters[inputName] = [];
							filters[inputName].push($(this).val());
						});

						$('#filterads input:radio:checked').each(function() {
							var inputName = $(this).attr('name');
							filters[inputName] = $(this).val();
						});

						$('#filterads select').each(function () {
							var selectedVal = $(this).val();
							if (selectedVal && !['category-select', 'subcategory-select', 'location-select'].includes($(this).attr('id'))) {
								filters[$(this).attr('name')] = selectedVal;
							}
						});

						fetchAds(filters);
					}
					$('#sort-by-select').on('change', function() {
						collectAndFetchFilters();
					});
				   
					// Ensure only one option is active at a time
					$('input[name="category_name"]').on('change', function () {
						$('input[name="sub_category_name"], input[name="sub_category_name_type"]').prop('checked', false);
						collectAndFetchFilters();
					});
				   
					$('input[name="sub_category_name"]').on('change', function () {
						$('input[name="sub_category_name_type"]').prop('checked', false);
						collectAndFetchFilters();
					});
					$('input[name="sub_category_name_type"]').on('change', function () {
						collectAndFetchFilters();
					});
					collectAndFetchFilters();
					$('#filterads :input').on('change', function () {
						collectAndFetchFilters();
					});

					// City search dropdown
					$('#citySearch2').on('input', function () {
						let searchTerm = $(this).val().toLowerCase();
						filterCities(searchTerm);
					});

					// Filter cities based on search input
					function filterCities(searchTerm) {
						$('#cityDropdownMenu li').each(function () {
							let cityName = $(this).data('name').toLowerCase();
							if (cityName.includes(searchTerm)) {
								$(this).show();
							} else {
								$(this).hide();
							}
						});
					}

					// Handle city selection
					$('#cityDropdownMenu').on('click', 'li', function () {
						let selectedCityName = $(this).text();
						$('#citySearch2').val(selectedCityName); // Update input field
						$('#selectedCityInput').val(selectedCityName); // Update hidden input
						collectAndFetchFilters(); // Fetch ads with the selected city
					});
					const urlParams = new URLSearchParams(window.location.search);
					const defaultCity = urlParams.get('location');
					if (defaultCity) {
						$('#citySearch2').val(defaultCity); // Set default city in input
						$('#selectedCityInput').val(defaultCity); // Update hidden input
						collectAndFetchFilters(); // Fetch ads with default city
					}
					// Function to hide all cards by default
					function hideAllCards() {
						// List of all cards that need to be hidden by default
						$('.deliverable1_card,.deliverable2_card,.deliverable3_card,.deliverable4_card,.deliverable5_card,.deliverable6_card,.deliverable7_card,.brand1_card, .brand2_card, .brand3_card,.device1_card, .condition1_card, .condition2_card, .condition3_card,.condition36_card,.condition37_card,.condition4_card, .condition5_card, .condition6_card, .condition7_card, .condition8_card, .condition9_card, .condition10_card, .condition11_card, .condition12_card, .condition13_card, .condition14_card, .condition15_card, .condition16_card, .condition17_card, .condition18_card, .condition19_card, .condition20_card, .condition21_card, .condition22_card, .condition23_card, .condition24_card, .condition25_card, .condition26_card, .condition27_card, .condition28_card, .condition29_card, .condition30_card, .condition31_card, .condition32_card, .condition33_card, .condition34_card, .condition35_card, .type1_card, .type2_card,.type12_card, .type3_card, .type4_card, .type5_card, .type6_card, .type7_card,.type13_card, .type8_card, .type9_card, .type10_card, .type11_card, .make_car1_card, .make_car2_card, .year1_card, .year2_card, .year3_card, .year4_card,.year5_card, .kms_driven1_card, .kms_driven2_card, .kms_driven3_card, .kms_drive4_card,.kms_drive5_card, .feature1_card, .feature2_card, .feature3_card, .feature4_card, .feature5_card, .feature6_card, .feature7_card, .feature8_card, .feature9_card, .feature10_card, .area_unit1_card, .area_unit2_card, .area_unit3_card, .area_unit4_card, .area_unit5_card, .area_unit6_card, .area_unit7_card, .area_unit8_card, .area_unit9_card, .area_unit10_card, .area1_card, .area2_card, .area3_card, .area4_card, .area5_card, .area6_card, .area7_card, .area8_card, .area9_card, .area10_card, .furnished1_card, .furnished2_card, .furnished3_card, .furnished4_card, .furnished5_card, .furnished6_card, .furnished7_card, .furnished8_card, .furnished9_card, .furnished10_card, .pro_sale_house_bedroom_card, .pro_sale_house_bathroom_card, .pro_sale_appart_bedroom_card,.pro_sale_appart_bathroom_card, .pro_sale_appart_floor_level_card, .pro_sale_shope_floor_level_card, .pro_sale_portion_bedroom_card, .pro_sale_portion_bathroom_card, .pro_sale_portion_floor_level_card, .pro_rent_house_bedroom_card, .pro_rent_house_bathroom_card, .no_storeys_card,.construction_state_new,.construction_state_new2, .construction_state_new_rent_house_card, .pro_rent_appart_bedroom_card, .pro_rent_apart_bathroom_card, .pro_rent_appart_floor_card, .bedroom2_card, .bathroom2_card, .floor_level2_card, .rent_shope_bathroom_card, .floor_level_shope_rent_card, .bedroom_vacation_rent_card, .bathroom_vacation_rent_card, .make_bike1_card, .make_bike2_card, .make_bike3_card, .make_bike4_card, .make_bike5_card, .engine_type1_card, .engine_type2_card, .engine_capacity1_card, .engine_capacity2_card, .ignition_type1_card, .ignition_type2_card, .origin1_card, .origin2_card, .registration1_city_card, .registration2_city_card, .product1_card, .product2_card').css('display', 'none');
					}
				});
			</script>
			<script src="{{ asset('js/city-dropdown.js') }}"></script>
			<script src="{{ asset('js/location-dropdown.js') }}"></script>		
			<script>
				 $(document).ready(function() {
					$('.heart-checkbox').on('change', function() {
						var form = $(this).closest('form');
						var isAuthenticated = form.data('authenticated') === 'true';
						if (!isAuthenticated) {
							// User is not logged in, show the modal
							$('#authModal').modal('show');
							// Uncheck the checkbox to prevent accidental liking
							$(this).prop('checked', false);
						} else {
							// User is logged in, proceed with form submission
							form.submit();
						}
					});
				});
			</script>
    </body>
</html>
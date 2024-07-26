<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Adsmarket') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo.svg')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/font/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('assets/font/css/all.min.css')}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
  
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <!-- Add Swiper -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

        <!-- Scripts -->
        

        <!-- Styles -->
        @livewireStyles
    </head>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

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
            slidesPerView: 3,
        },
        480: {
            slidesPerView: 4,
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
    <script src="js/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
        {
          searchEnabled: false
        });
        function previewImage() {
            const fileInput = document.getElementById('fileInput');
            const imagePreview = document.getElementById('imagePreview');

            // Clear any previous preview
            imagePreview.innerHTML = '';

            const files = fileInput.files;
            if (files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.style.maxWidth = '100%';
                        img.style.maxHeight = '100px';
                        imagePreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.innerHTML = '<p class="text-danger">Selected file is not an image.</p>';
                }
            }
        }

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


        document.addEventListener('DOMContentLoaded', function () {
            const imageContainer = document.getElementById('imageContainer');
            const fileInput = document.getElementById('fileInput');
            const addPhotoIcon = document.getElementById('addPhotoIcon');
            const maxImages = 20;
            
            addPhotoIcon.addEventListener('click', () => {
                fileInput.click();
            });

            fileInput.addEventListener('change', () => {
                if (fileInput.files.length + imageContainer.querySelectorAll('.image-wrapper').length > maxImages) {
                    alert(`You can upload a maximum of ${maxImages} images.`);
                    fileInput.value = '';
                    return;
                }
                Array.from(fileInput.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const imageWrapper = document.createElement('div');
                        imageWrapper.classList.add('image-wrapper');
                        
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        
                        const deleteIcon = document.createElement('span');
                        deleteIcon.classList.add('delete-icon');
                        deleteIcon.innerHTML = '&times;';
                        deleteIcon.addEventListener('click', () => {
                            imageContainer.removeChild(imageWrapper);
                        });

                        imageWrapper.appendChild(img);
                        imageWrapper.appendChild(deleteIcon);
                        imageContainer.insertBefore(imageWrapper, addPhotoIcon);
                    };
                    reader.readAsDataURL(file);
                });
                fileInput.value = '';
            });
        });




    </script>
     <script>
       
       document.getElementById("phoneNumberButton").addEventListener("click", function () {
    this.style.display = "none";
    const showPhoneNumberButton = document.getElementById("showPhoneNumberButton");
    showPhoneNumberButton.style.display = "inline-block";
    showPhoneNumberButton.href = "tel:" + showPhoneNumberButton.dataset.phoneNumber;
});


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
    
document.getElementById('postAdLink').addEventListener('click', function(event) {
    event.preventDefault(); 
    fetch('/check_auth')
        .then(response => response.json())
        .then(data => {
            if (data.authenticated) {
              
                window.location.href = '/post_ad';
            } else {
               
                alert('You need to be logged in to post an ad.');
            }
        })
        .catch(error => {
            console.error('Error checking authentication:', error);
        });
});
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


        document.addEventListener('DOMContentLoaded', function () {
    const imageContainer = document.getElementById('imageContainer');
    const fileInput = document.getElementById('fileInput');
    const addPhotoIcon = document.getElementById('addPhotoIcon');
    const hiddenInput = document.getElementById('hiddenInput'); // Hidden input for storing files
    const maxImages = 20;

    addPhotoIcon.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length + imageContainer.querySelectorAll('.image-wrapper').length > maxImages) {
            alert(`You can upload a maximum of ${maxImages} images.`);
            fileInput.value = '';
            return;
        }

        Array.from(fileInput.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageWrapper = document.createElement('div');
                imageWrapper.classList.add('image-wrapper');

                const img = document.createElement('img');
                img.src = e.target.result;

                const deleteIcon = document.createElement('span');
                deleteIcon.classList.add('delete-icon');
                deleteIcon.innerHTML = '&times;';
                deleteIcon.addEventListener('click', () => {
                    imageContainer.removeChild(imageWrapper);
                    // Remove the file from the hidden input when deleted from preview
                    const originalFiles = JSON.parse(imageContainer.getAttribute('data-original-files'));
                    const filteredFiles = originalFiles.filter(f => f.name !== file.name);
                    imageContainer.setAttribute('data-original-files', JSON.stringify(filteredFiles));
                    updateHiddenInput(filteredFiles);
                });

                imageWrapper.appendChild(img);
                imageWrapper.appendChild(deleteIcon);
                imageContainer.insertBefore(imageWrapper, addPhotoIcon);
            };
            reader.readAsDataURL(file);
        });

        // Append selected files to the hidden input
        if (!imageContainer.hasAttribute('data-original-files')) {
            imageContainer.setAttribute('data-original-files', JSON.stringify(Array.from(fileInput.files)));
        } else {
            let originalFiles = JSON.parse(imageContainer.getAttribute('data-original-files'));
            Array.from(fileInput.files).forEach(file => {
                originalFiles.push(file);
            });
            imageContainer.setAttribute('data-original-files', JSON.stringify(originalFiles));
        }

        updateHiddenInput(Array.from(fileInput.files));
        fileInput.value = '';
    });

    // Function to update hidden input with selected files
    function updateHiddenInput(files) {
        const formData = new FormData();
        files.forEach(file => {
            formData.append('image_path[]', file);
        });
        hiddenInput.files = formData;
    }
});




</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const params = new URLSearchParams(window.location.search);
        const sub_cat_type = params.get('sub_cat_type');
        const sub_cat = params.get('sub_cat'); 

        // Hide all components
        document.querySelectorAll('.component').forEach(component => {
            component.classList.remove('active');
        });

        // Show the selected component
        if (sub_cat_type) {
            const component = document.getElementById(`${sub_cat_type}`);
            if (component) {
                component.classList.add('active');
            }
        }
        if (sub_cat) {
            const component = document.getElementById(`${sub_cat}`);
            if (component) {
                component.classList.add('active');
            }
        }
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
    const modelTabs = document.querySelectorAll('.nav-post-model .nav-tab-button');
    modelTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const modelText = this.innerText.trim(); // Get the inner text of the selected model tab
            document.getElementById('model_input').value = modelText; // Update hidden input field for model
            console.log('model text: ' + modelText);
        });
    });
});
</script>




    </body>
</html>

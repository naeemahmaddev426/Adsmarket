// Function to get URL query parameter
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

// Function to get the user's current location and fetch the district
function getUserLocation() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Fetch district name using reverse geocoding
                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.address) {
                            let district = data.address.district || "Unknown District";
                            district = district.replace(" District", ""); // Remove "District"
                            setSelectedCity(district); // Update selected city
                            window.history.pushState({}, '', `?location=${district}`); // Update URL
                        }
                    })
                    .catch(error => console.error("Error fetching location:", error));
            },
            (error) => {
                console.error("Error getting location:", error);
            }
        );
    } else {
        console.error("Geolocation is not supported by this browser.");
    }
}

// Function to set the selected city
function setSelectedCity(city) {
    const cityInput = document.getElementById('citySearch2');
    cityInput.value = city || ''; // Update input text
    document.getElementById('selectedCityInput').value = city || ''; // Update hidden input
}

// Toggle dropdown visibility
function toggleDropdown() {
    const dropdownMenu = document.getElementById('cityDropdownMenu');
    dropdownMenu.style.display = (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') ? 'block' : 'none';
}

// Populate dropdown with city data
const cityData = ["Rawalpindi", "Karachi", "Multan", "Islamabad", "Sahiwal", "Arifwala", "Quetta", "Burewala"];
const dropdownMenu = document.getElementById('cityDropdownMenu');

// First item: "Use Current Location"
const currentLocationItem = document.createElement('span');
currentLocationItem.innerHTML = '<i class="fa-solid fa-location-dot" style="margin-right: 8px; color: #545fb8;"></i> Use Current Location';
currentLocationItem.classList.add('dropdown-item');
currentLocationItem.style.cursor = 'pointer';
currentLocationItem.addEventListener('click', () => {
    getUserLocation(); // Fetch user's current location
    dropdownMenu.style.display = 'none'; // Close dropdown
});
dropdownMenu.appendChild(currentLocationItem);

// Populate remaining cities
cityData.forEach(city => {
    const cityItem = document.createElement('li');
    cityItem.textContent = city;
    cityItem.classList.add('dropdown-item');
    cityItem.style.cursor = 'pointer';
    cityItem.addEventListener('click', () => {
        setSelectedCity(city); // Set selected city
        dropdownMenu.style.display = 'none'; // Close dropdown
        window.history.pushState({}, '', `?location=${city}`); // Update URL
    });
    dropdownMenu.appendChild(cityItem);
});

// Close dropdown if clicked outside
document.addEventListener('click', (e) => {
    if (!document.getElementById('citySearch2').contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.style.display = 'none';
    }
});

// Show dropdown on input focus
document.getElementById('citySearch2').addEventListener('focus', toggleDropdown);

// Filter cities based on search input
document.getElementById('citySearch2').addEventListener('input', function () {
    const filterText = this.value.toLowerCase();
    const cityItems = dropdownMenu.querySelectorAll('.dropdown-item:not(:first-child)'); // Exclude first item

    cityItems.forEach(item => {
        if (item.textContent.toLowerCase().includes(filterText)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
});

// Set default city from URL parameter
const defaultCity = getQueryParam('location');
if (defaultCity) {
    setSelectedCity(defaultCity); // Display default city in the input
}

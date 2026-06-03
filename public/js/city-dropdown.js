// $(document).ready(function () {
//     // Load cities from the cities.json file
//     $.getJSON("/cities.json", function (cities) {

//         populateCityDropdown('#cityList1', '#dropdownTrigger1', '#selectedCity1', cities);
//     }).fail(function (jqXHR, textStatus, errorThrown) {
//         console.error("Error fetching location data:", textStatus, errorThrown);
//         alert('Failed to load cities. Please try again later.');
//     });

//     // Common function to populate a city dropdown menu
//     function populateCityDropdown(dropdownId, triggerId, selectedId, cities) {
//         let cityDropdown = $(dropdownId);
//         cityDropdown.empty(); // Clear existing list

//         // Append each city as a list item
//         cities.forEach(city => {
//             let cityItem = `<li class="dropdown-item" style="cursor: pointer;" data-name="${city.name}">${city.name}</li>`;
//             cityDropdown.append(cityItem);
//         });

//         // Handle city selection
//         cityDropdown.on('click', 'li', function () {
//             let selectedCityName = $(this).data('name');
//             $(selectedId).text(selectedCityName);
//             $('#selectedlocation').val(selectedCityName); // Update hidden input
//             $(dropdownId).show(); // Hide the dropdown menu after selection
//         });
//     }

//     // Filter cities on search input (for each dropdown individually)

//     $('#citySearch1').on('input', function () {
//         filterCities('#cityList1', $(this).val());
//     });
//     function filterCities(dropdownId, searchTerm) {
//         searchTerm = searchTerm.toLowerCase();
//         $(dropdownId + ' li').each(function () {
//             let cityName = $(this).data('name').toLowerCase();
//             $(this).toggle(cityName.includes(searchTerm));
//         });
//     }

// });
let cities = [];

// Fetch city data from cities.json
fetch('/cities.json')
    .then(response => response.json())
    .then(data => {
        if (Array.isArray(data)) {
            cities = data;
        } else {
            console.error('Invalid city data:', data);
        }
    })
    .catch(error => console.error('Error fetching city data:', error));

// DOM elements
const citySearchInput = document.getElementById('citySearchInput');
const citySuggestions = document.getElementById('citySuggestions');
const selectedLocation = document.getElementById('selectedLocation');

// Geolocation: Get user's current location and fetch district (only when requested)
function geoUserLocation() {
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

                            // Update input and hidden fields
                            citySearchInput.value = district;
                            selectedLocation.value = district;

                            // Hide suggestions
                            citySuggestions.style.display = 'none';
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

// Populate suggestions dynamically based on user input
function populateCitySuggestions(query = '') {
    citySuggestions.innerHTML = ''; // Clear previous suggestions

    // Add "Use Current Location" suggestion
    const currentLocationSuggestion = document.createElement('div');
    currentLocationSuggestion.className = 'suggestion-item';
    currentLocationSuggestion.style.display = 'flex';
    currentLocationSuggestion.style.alignItems = 'center';
    currentLocationSuggestion.style.paddingTop = '10px';
    currentLocationSuggestion.style.paddingLeft = '8px';
    currentLocationSuggestion.style.paddingBottom = '10px';
    currentLocationSuggestion.style.cursor = 'pointer';
    currentLocationSuggestion.style.fontSize = '12px';
    currentLocationSuggestion.style.color = '#666';
    currentLocationSuggestion.style.borderBottom = '1px solid #e9e9e9';

    const locationIcon = document.createElement('i');
    locationIcon.className = 'fa-solid fa-location-dot';
    locationIcon.style.marginRight = '8px';
    locationIcon.style.fontSize = '14px';
    locationIcon.style.color = '#666';

    const locationText = document.createElement('span');
    locationText.textContent = 'Use Current Location';

    currentLocationSuggestion.appendChild(locationIcon);
    currentLocationSuggestion.appendChild(locationText);

    currentLocationSuggestion.addEventListener('click', function () {
        geoUserLocation(); // Fetch and set current location
    });

    citySuggestions.appendChild(currentLocationSuggestion);

    // Filter cities based on the query
    const filteredCities = cities.filter(city => city.name.toLowerCase().includes(query.toLowerCase()));

    // Add city suggestions
    filteredCities.forEach(city => {
        const suggestion = document.createElement('div');
        suggestion.className = 'suggestion-item';
        suggestion.textContent = city.name;
        suggestion.style.padding = '8px';
        suggestion.style.cursor = 'pointer';
        suggestion.style.fontSize = '12px';
        suggestion.style.borderBottom = '1px solid #e9e9e9';

        // Handle city selection
        suggestion.addEventListener('click', function () {
            citySearchInput.value = city.name; // Set input field
            selectedLocation.value = city.name; // Set hidden input
            citySuggestions.style.display = 'none'; // Hide suggestions
        });

        citySuggestions.appendChild(suggestion);
    });

    // Show "No results" if no cities match the query
    if (query && filteredCities.length === 0) {
        const noResult = document.createElement('div');
        noResult.textContent = 'No results found';
        noResult.style.padding = '8px';
        noResult.style.color = '#666';
        citySuggestions.appendChild(noResult);
    }
}

// Show suggestions only on input click (not on typing)
citySearchInput.addEventListener('click', function () {
    citySuggestions.style.display = 'block'; // Show suggestions when input is clicked
    populateCitySuggestions(); // Populate the suggestions list on click
});

// Hide suggestions when clicking outside
document.addEventListener('click', function (event) {
    if (!event.target.closest('#citySearchInput') && !event.target.closest('#citySuggestions')) {
        citySuggestions.style.display = 'none'; // Hide suggestions if clicked outside
    }
});


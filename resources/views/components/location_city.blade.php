@props(['label' => 'City', 'name' => 'location', 'placeholder' => 'Select City', 'cities' => [], 'value' => ''])

<div class="city-container mb-4">
    <h4 class="mt-2 choose mb-3">YOUR AD'S LOCATION</h4>
    <div class="input-container">
        <!-- Search input field for cities -->
        <input type="text" id="searchCity" class="form-control w-100" placeholder="{{ $placeholder }}" autocomplete="off" value="{{ $value }}">
        
        <!-- Hidden field to store selected city name -->
        <input type="hidden" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" {{ $attributes }}>
        
        <!-- Dropdown list for cities -->
        <ul id="cityList" class="city-list">
            <!-- City list will be dynamically filled by JavaScript -->
        </ul>
    </div>
</div>

<style>
    .city-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: none;
        position: absolute;
        background-color: #fff;
        width: 100%;
        max-height: 150px;
        overflow-y: auto;
        border: 1px solid #ccc;
        z-index: 1000;
    }

    .city-item {
        padding: 10px;
        cursor: pointer;
    }

    .city-item:hover {
        background-color: #f1f1f1;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchCityInput = document.getElementById('searchCity');
        const cityList = document.getElementById('cityList');
        const hiddenCityInput = document.getElementById('{{ $name }}'); // Use dynamic ID

        let cities = [];

        // Fetch cities from the cities.json file
        fetch('/cities.json')
            .then(response => response.json())
            .then(data => {
                cities = data;
                displayCities(cities);
            });

        // Display the cities in the dropdown list
        function displayCities(cities) {
            cityList.innerHTML = '';
            cities.forEach(city => {
                const cityItem = document.createElement('li');
                cityItem.textContent = city.name;  // Assuming the city object has a 'name' property
                cityItem.classList.add('city-item');
                cityItem.addEventListener('click', () => {
                    searchCityInput.value = city.name;  // Set the clicked city name in the input
                    hiddenCityInput.value = city.name;  // Set the hidden input value to the selected city
                    cityList.style.display = 'none';    // Hide the city list
                });
                cityList.appendChild(cityItem);
            });
        }

        // Filter cities as the user types in the search box
        searchCityInput.addEventListener('input', function () {
            const searchQuery = searchCityInput.value.toLowerCase();
            const filteredCities = cities.filter(city => city.name.toLowerCase().includes(searchQuery));  // Use city.name for filtering
            displayCities(filteredCities);
        });

        // Show the city list when the search input is focused
        searchCityInput.addEventListener('focus', function () {
            if (searchCityInput.value === '') {
                displayCities(cities);  // Show all cities if the search box is empty
            }
            cityList.style.display = 'block';
        });

        // Hide the city list if the user clicks outside of the input
        document.addEventListener('click', function (event) {
            if (!event.target.closest('.input-container')) {
                cityList.style.display = 'none';
            }
        });
    });
</script>

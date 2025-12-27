<!-- hero part -->
<div class="pb-5 hero-bg" style="background-image: url('{{ asset('assets/images/hero-sec.png') }}')">
    <div class="container position-relative z-1">
        <div class="row justify-content-center align-items-center z-1">
            <div class="col-lg-12 col-md-11 mt-5 mt-md-5 col-12 d-flex flex-column justify-content-center align-items-center">
                <div class="hero-text text-center d-flex mt-7 flex-column justify-content-center align-items-center mb-3">
                    <h1 class="text-white fw-semibold lh-160 mb-3" data-aos="fade-up" data-aos-delay="200">
                        @if(lang('en'))
                            {{ 'Find Your Perfect Ride with Al Ameed' }}
                        @elseif(lang('ar'))
                            {{ 'ابحث عن رحلتك المثالية مع العميد' }}
                        @endif
                    </h1>

                    <h5 class="text-white mt-3 lh-160 col-md-10 fw-400" data-aos="fade-up" data-aos-delay="300">
                        @if(lang('en'))
                            {{ 'Rent luxury and regular cars with ease, or join live auctions — all in one place.' }}
                        @elseif(lang('ar'))
                            {{ 'يمكنك استئجار السيارات الفاخرة والعادية بسهولة، أو الانضمام إلى المزادات المباشرة - كل ذلك في مكان واحد.' }}
                        @endif
                    </h5>
                </div>

                @php
                    $rentalDetails = session('rental_details', []);
                    $hasReturnLocation = !empty($rentalDetails['return_location']) && 
                                        ($rentalDetails['return_location'] !== $rentalDetails['pickup_location'] ||
                                         $rentalDetails['return_lat'] !== $rentalDetails['pickup_lat'] ||
                                         $rentalDetails['return_lng'] !== $rentalDetails['pickup_lng']);
                @endphp

                <div class="bg-white rounded-3 p-4 col-12">
                    <form id="rentalForm" action="{{ route('client.rental') }}" method="POST" class="row g-3 align-items-start">
                        @csrf

                        <!-- Pickup Location -->
                        <div class="col-lg-3">
                            <label class="fw-semibold mb-1 text-primary">
                                {{ lang('en') ? 'Pickup location' : 'موقع الاستلام' }}
                            </label>
                            <input type="text" 
                                   id="pickupLocation" 
                                   name="pickup_location" 
                                   class="form-control rounded-3" 
                                   placeholder="{{ lang('en') ? 'Select location' : 'اختر الموقع' }}" 
                                   value="{{ $rentalDetails['pickup_location'] ?? '' }}"
                                   readonly 
                                   required 
                                   style="cursor: pointer;">
                            <input type="hidden" id="pickupLat" name="pickup_lat" value="{{ $rentalDetails['pickup_lat'] ?? '' }}">
                            <input type="hidden" id="pickupLng" name="pickup_lng" value="{{ $rentalDetails['pickup_lng'] ?? '' }}">
                            
                            <small id="differentReturnBtn" 
                                   class="d-block btn btn-outline-primary fs-14 rounded-3 mt-2 fw-semibold" 
                                   style="cursor:pointer; {{ $hasReturnLocation ? 'display:none;' : '' }}">
                                {{ lang('en') ? '+ Different return location' : '+ موقع عودة مختلف' }}
                            </small>
                        </div>

                        <!-- Return Location (Hidden by default) -->
                        <div class="col-lg-3" id="returnLocationDiv" style="{{ $hasReturnLocation ? 'display:block;' : 'display:none;' }}">
                            <label class="fw-semibold mb-1 text-primary">
                                {{ lang('en') ? 'Return location' : 'موقع العودة' }}
                            </label>
                            <input type="text" 
                                   id="returnLocation" 
                                   name="return_location" 
                                   class="form-control rounded-3" 
                                   placeholder="{{ lang('en') ? 'Select location' : 'اختر الموقع' }}" 
                                   value="{{ $hasReturnLocation ? $rentalDetails['return_location'] : '' }}"
                                   readonly 
                                   style="cursor: pointer;">
                            <input type="hidden" id="returnLat" name="return_lat" value="{{ $hasReturnLocation ? $rentalDetails['return_lat'] : '' }}">
                            <input type="hidden" id="returnLng" name="return_lng" value="{{ $hasReturnLocation ? $rentalDetails['return_lng'] : '' }}">
                            
                            <small id="sameLocationBtn" 
                                   class="d-block btn btn-outline-danger fs-14 rounded-3 mt-2 fw-semibold" 
                                   style="cursor:pointer;">
                                {{ lang('en') ? '× Same location' : '× نفس الموقع' }}
                            </small>
                        </div>

                        <!-- Pickup date -->
                        <div class="col-lg-3">
                            <label class="fw-semibold mb-1 text-primary">
                                {{ lang('en') ? 'Pickup date' : 'يوم الاستلام' }}
                            </label>
                            <div class="d-flex flex-column gap-2">
                                <input type="date" 
                                       min="{{ now()->addDay()->format('Y-m-d') }}" 
                                       name="pickup_date" 
                                       value="{{ $rentalDetails['pickup_date'] ?? '' }}"
                                       class="form-control" 
                                       required>
                                <input type="time" 
                                       name="pickup_time" 
                                       value="{{ $rentalDetails['pickup_time'] ?? '' }}"
                                       class="form-control" 
                                       required>
                            </div>
                        </div>

                        <!-- Return date -->
                        <div class="col-lg-3">
                            <label class="fw-semibold mb-1 text-primary">
                                {{ lang('en') ? 'Return date' : 'يوم العودة' }}
                            </label>
                            <div class="d-flex flex-column gap-2">
                                <input type="date" 
                                       min="{{ now()->addDay()->format('Y-m-d') }}" 
                                       name="return_date" 
                                       value="{{ $rentalDetails['return_date'] ?? '' }}"
                                       class="form-control" 
                                       required>
                                <input type="time" 
                                       name="return_time" 
                                       value="{{ $rentalDetails['return_time'] ?? '' }}"
                                       class="form-control" 
                                       required>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="col-lg-3 d-grid">
                            <button type="submit" class="btn btn-primary rounded-3 mt-md-5">
                                {{ lang('en') ? 'Show cars' : 'عرض السيارات' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Modal -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ lang('en') ? 'Select Location' : 'اختر الموقع' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Search Input -->
                <div class="mb-3">
                    <input type="text" 
                           id="searchLocation" 
                           class="form-control" 
                           placeholder="{{ lang('en') ? 'Search for a location...' : 'ابحث عن موقع...' }}">
                </div>
                
                <!-- Map Container -->
                <div id="map" style="height: 400px; width: 100%;"></div>
                
                <!-- Selected Location Display -->
                <div class="mt-3">
                    <strong>{{ lang('en') ? 'Selected:' : 'المحدد:' }}</strong>
                    <span id="selectedLocationText">{{ lang('en') ? 'Click on map to select' : 'انقر على الخريطة للاختيار' }}</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    {{ lang('en') ? 'Cancel' : 'إلغاء' }}
                </button>
                <button type="button" class="btn btn-primary" id="confirmLocation">
                    {{ lang('en') ? 'Confirm Location' : 'تأكيد الموقع' }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
    .leaflet-container {
        border-radius: 8px;
    }
    
    #mapModal .modal-lg {
        max-width: 800px;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let map;
    let marker;
    let currentField = null;
    let selectedLocation = {
        lat: null,
        lng: null,
        address: ''
    };
    
    const isRTL = {{ lang('ar') ? 'true' : 'false' }};
    
    // Default center (Bahrain)
    const defaultCenter = [26.0667, 50.5577];
    
    // Toggle return location visibility
    document.getElementById('differentReturnBtn').addEventListener('click', function() {
        document.getElementById('returnLocationDiv').style.display = 'block';
        this.style.display = 'none';
    });
    
    document.getElementById('sameLocationBtn')?.addEventListener('click', function() {
        document.getElementById('returnLocationDiv').style.display = 'none';
        document.getElementById('differentReturnBtn').style.display = 'block';
        
        // Clear return location fields
        document.getElementById('returnLocation').value = '';
        document.getElementById('returnLat').value = '';
        document.getElementById('returnLng').value = '';
    });
    
    // Initialize map when modal opens
    const mapModal = document.getElementById('mapModal');
    mapModal.addEventListener('shown.bs.modal', function() {
        if (!map) {
            // Initialize map
            map = L.map('map').setView(defaultCenter, 12);
            
            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);
            
            // Add click event to map
            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;
                
                // Remove existing marker
                if (marker) {
                    map.removeLayer(marker);
                }
                
                // Add new marker
                marker = L.marker([lat, lng]).addTo(map);
                
                // Reverse geocode to get address
                reverseGeocode(lat, lng);
            });
        }
        
        // Refresh map size
        setTimeout(() => map.invalidateSize(), 200);
    });
    
    // Open map modal for pickup location
    document.getElementById('pickupLocation').addEventListener('click', function() {
        currentField = 'pickup';
        const modal = new bootstrap.Modal(mapModal);
        modal.show();
    });
    
    // Open map modal for return location
    document.getElementById('returnLocation').addEventListener('click', function() {
        currentField = 'return';
        const modal = new bootstrap.Modal(mapModal);
        modal.show();
    });
    
    // Search location
    document.getElementById('searchLocation').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = this.value;
            if (query) {
                searchLocation(query);
            }
        }
    });
    
    // Confirm location selection
    document.getElementById('confirmLocation').addEventListener('click', function() {
        if (selectedLocation.lat && selectedLocation.lng) {
            if (currentField === 'pickup') {
                document.getElementById('pickupLocation').value = selectedLocation.address;
                document.getElementById('pickupLat').value = selectedLocation.lat;
                document.getElementById('pickupLng').value = selectedLocation.lng;
            } else if (currentField === 'return') {
                document.getElementById('returnLocation').value = selectedLocation.address;
                document.getElementById('returnLat').value = selectedLocation.lat;
                document.getElementById('returnLng').value = selectedLocation.lng;
            }
            
            // Close modal
            bootstrap.Modal.getInstance(mapModal).hide();
            
            // Reset
            selectedLocation = { lat: null, lng: null, address: '' };
            document.getElementById('selectedLocationText').textContent = isRTL ? 'انقر على الخريطة للاختيار' : 'Click on map to select';
        } else {
            alert(isRTL ? 'الرجاء اختيار موقع على الخريطة' : 'Please select a location on the map');
        }
    });
    
    // Search location using Nominatim (OpenStreetMap)
    function searchLocation(query) {
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1`)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    const lat = parseFloat(data[0].lat);
                    const lng = parseFloat(data[0].lon);
                    
                    // Remove existing marker
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    
                    // Add marker and center map
                    marker = L.marker([lat, lng]).addTo(map);
                    map.setView([lat, lng], 15);
                    
                    // Update selected location
                    selectedLocation = {
                        lat: lat,
                        lng: lng,
                        address: data[0].display_name
                    };
                    
                    document.getElementById('selectedLocationText').textContent = data[0].display_name;
                } else {
                    alert(isRTL ? 'لم يتم العثور على الموقع' : 'Location not found');
                }
            })
            .catch(error => {
                console.error('Search error:', error);
                alert(isRTL ? 'خطأ في البحث' : 'Search error');
            });
    }
    
    // Reverse geocode to get address from coordinates
    function reverseGeocode(lat, lng) {
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
            .then(response => response.json())
            .then(data => {
                if (data && data.display_name) {
                    selectedLocation = {
                        lat: lat,
                        lng: lng,
                        address: data.display_name
                    };
                    
                    document.getElementById('selectedLocationText').textContent = data.display_name;
                } else {
                    selectedLocation = {
                        lat: lat,
                        lng: lng,
                        address: `${lat.toFixed(6)}, ${lng.toFixed(6)}`
                    };
                    
                    document.getElementById('selectedLocationText').textContent = selectedLocation.address;
                }
            })
            .catch(error => {
                console.error('Reverse geocode error:', error);
                selectedLocation = {
                    lat: lat,
                    lng: lng,
                    address: `${lat.toFixed(6)}, ${lng.toFixed(6)}`
                };
                
                document.getElementById('selectedLocationText').textContent = selectedLocation.address;
            });
    }
    
    // Form validation
    document.getElementById('rentalForm').addEventListener('submit', function(e) {
        const pickupLocation = document.getElementById('pickupLocation').value;
        const returnLocationDiv = document.getElementById('returnLocationDiv');
        
        if (!pickupLocation) {
            e.preventDefault();
            alert(isRTL ? 'الرجاء اختيار موقع الاستلام' : 'Please select pickup location');
            return false;
        }
        
        // If return location div is visible, validate it
        if (returnLocationDiv.style.display === 'block') {
            const returnLocation = document.getElementById('returnLocation').value;
            if (!returnLocation) {
                e.preventDefault();
                alert(isRTL ? 'الرجاء اختيار موقع العودة' : 'Please select return location');
                return false;
            }
        } else {
            // Copy pickup location to return location if same
            document.getElementById('returnLocation').value = document.getElementById('pickupLocation').value;
            document.getElementById('returnLat').value = document.getElementById('pickupLat').value;
            document.getElementById('returnLng').value = document.getElementById('pickupLng').value;
        }
    });
});
</script>

<!-- hero part end -->
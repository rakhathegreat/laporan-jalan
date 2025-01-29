<x-layout class="overflow-hidden">
    <x-slot:header>
    </x-slot>

    <div class="w-full h-screen" id="map"></div>
    
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
        const map = L.map('map').setView([-7.369957629936546, 468.54131698608404], 13); // Koordinat Banjar

        // Tambahkan tile layer (peta dasar)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            minZoom: 14,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan interaksi: klik untuk mendapatkan koordinat
        map.on('click', function (e) {
            alert(`Koordinat: ${e.latlng.lat}, ${e.latlng.lng}`);
        });

        // Batas peta
        var bounds = [[-7.347825460761589, 468.60131263732916], [-7.393791036980667, 468.4857845306397]];
        map.setMaxBounds(bounds);
        
        // Garis Jalan
        var latlngs = [[-7.363631985641892, 468.50786983966833], [-7.370480329473203, 468.5220734775067]]
        // Tambahkan polyline ke peta dengan ukuran awal
        var polyline = L.polyline(latlngs, { 
            color: 'blue', 
            weight: 1,
            opacity: 0.5
        }).addTo(map);

        // Fungsi untuk menghitung ketebalan berdasarkan zoom
        function updateWeight() {
            var zoom = map.getZoom();
            var metersPerPixel = 40075016.686 / (256 * Math.pow(2, zoom)); // Konversi ke meter/piksel
            var roadWidthInMeters = 6; // Lebar jalan, misalnya 10 meter
            var weightInPixels = roadWidthInMeters / metersPerPixel; // Konversi ke piksel
            polyline.setStyle({ weight: weightInPixels });
        }5

        // Update saat zoom atau diinisialisasi
        map.on('zoom', updateWeight);
        updateWeight(); // Panggil langsung saat awal

        // Event untuk mengubah ukuran polyline saat diklik
        polyline.on('click', function (e) { 
            alert('Polyline clicked!');
        });
    </script>
</x-layout>


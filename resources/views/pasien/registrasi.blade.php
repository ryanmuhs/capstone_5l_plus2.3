<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Pasien</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#4A9DA6]">
    <div class="container mx-auto mt-10 p-5 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Registrasi Pasien</h1>
        <form id="form" action="{{ route('pasien.registrasi.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Tab Navigation -->
            <div class="flex border-b mb-4">
                <button id="tab-data-diri" type="button" class="tab-button active-tab">
                    Data Diri
                </button>
                <button id="tab-alamat" type="button" class="tab-button">
                    Alamat
                </button>
                <button id="tab-reservasi" type="button" class="tab-button">
                    Reservasi
                </button>
            </div>

            <!-- Tab Content -->
            <div id="content-data-diri" class="tab-content active-content">
                <!-- Data Diri -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="ktp" class="block font-medium">No KTP</label>
                        <input type="text" id="ktp" name="ktp" class="input-field" placeholder="Isi No KTP Pasien" required>
                        <span id="nik-error" class="text-red-500 text-sm hidden"></span>
                    </div>
                    
                    <div>
                        <label for="nama" class="block font-medium">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="input-field" placeholder="Isi Nama Lengkap Pasien" required>
                    </div>
                    <div>
                        <label for="lahir_tempat" class="block font-medium">Tempat Lahir</label>
                        <input type="text" id="lahir_tempat" name="lahir_tempat" class="input-field" placeholder="Isi Tempat Lahir Pasien" required>
                    </div>
                    <div>
                        <label for="lahir_tanggal" class="block font-medium">Tanggal Lahir</label>
                        <input type="date" id="lahir_tanggal" name="lahir_tanggal" class="input-field" required>
                    </div>
                    <div>
                        <label for="jenis_kelamin" class="block font-medium">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="input-field" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label for="no_kontak" class="block font-medium">No Kontak</label>
                        <input type="date" id="no_kontak" name="no_kontak" class="input-field" required>
                    </div>
                </div>
                <button type="button" id="to-alamat" class="mt-4 btn-primary">Lanjut</button>
            </div>

            <div id="content-alamat" class="tab-content hidden">
                <!-- Alamat -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="provinsi" class="block font-medium">Provinsi</label>
                        <select id="provinsi" name="provinsi" class="input-field" required>
                            <option value="" disabled selected>Pilih Provinsi</option>
                            @foreach ($provinces as $prov)
                                <option value="{{ $prov->name }}">{{ $prov->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="kab_kota" class="block font-medium">Kabupaten/Kota</label>
                        <select id="kab_kota" name="kab_kota" class="input-field" required>
                            <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                            @foreach ($regencies as $reg)
                                <option value="{{ $reg->name }}">{{ $reg->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="kecamatan" class="block font-medium text-sm text-gray-600">Kecamatan *</label>
                        <input type="text" id="kecamatan" name="kecamatan" class="input-field" placeholder="Masukkan kecamatan" required>
                    </div>
                    <div>
                        <label for="rt_rw" class="block font-medium text-sm text-gray-600">RT/RW *</label>
                        <input type="text" id="rt_rw" name="rt_rw" class="input-field" placeholder="000/000" required>
                    </div>
                    <div class="md:col-span-2">
                        <label for="alamat_ktp" class="block font-medium">Alamat Sesuai KTP</label>
                        <input type="text" id="alamat_ktp" name="alamat_ktp" class="input-field" placeholder="Isi Alamat Sesuai KTP" required>
                    </div>
                </div>
                <button type="button" id="to-reservasi" class="mt-4 btn-primary">Lanjut</button>
            </div>

            <div id="content-reservasi" class="tab-content hidden">
                <!-- Reservasi -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="pilih_poli" class="block font-medium">Pilih Metode Pembayaran</label>
                        <select id="pilih_poli" name="pilih_poli" class="input-field" required>
                            <option value="" disabled selected>Pilih Poli</option>
                            <option value="umum">Umum</option>
                            <option value="gigi">Gigi</option>
                        </select>
                    </div>
                    <div>
                        <label for="pilih_poli" class="block font-medium">Pilih Jadwal Kunjungan</label>
                        <select id="pilih_poli" name="pilih_poli" class="input-field" required>
                            <option value="" disabled selected>Pilih Jadwal</option>
                            <option value="umum">Umum</option>
                            <option value="gigi">Gigi</option>
                        </select>
                    </div>
                    <div>
                        <label for="metode_pembayaran" class="block font-medium">Pilih Metode Pembayaran</label>
                        <select id="metode_pembayaran" name="metode_pembayaran" class="input-field" required>
                            <option value="" disabled selected>Pilih Metode Pembayaran</option>
                            <option value="bpjs">BPJS</option>
                            <option value="umum">Umum</option>
                        </select>
                    </div>
                    
                    <div id="no-bpjs-container" class="hidden">
                        <label for="no_bpjs" class="block font-medium text-sm text-gray-600">No BPJS</label>
                        <input type="text" id="no_bpjs" name="no_bpjs" class="input-field" placeholder="Masukkan Nomor BPJS" required>
                    </div>
                    <div>
                        <label for="tanggal_reservasi" class="block font-medium">Pilih Tanggal Reservasi</label>
                        <input type="date" id="tanggal_reservasi" name="tanggal_reservasi" class="input-field" required>
                    </div>
                </div>
                <button type="submit" class="mt-4 btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        // Navigasi antar tab
        const tabs = document.querySelectorAll('.tab-button');
        const contents = document.querySelectorAll('.tab-content');

        function activateTab(tabIndex) {
            tabs.forEach((tab, index) => {
                tab.classList.toggle('active-tab', index === tabIndex);
                contents[index].classList.toggle('hidden', index !== tabIndex);
                contents[index].classList.toggle('active-content', index === tabIndex);
            });
        }

        document.getElementById('to-alamat').addEventListener('click', () => activateTab(1));
        document.getElementById('to-reservasi').addEventListener('click', () => activateTab(2));

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => activateTab(index));
        });

        // Elemen dropdown dan container No BPJS
        const metodePembayaran = document.getElementById('metode_pembayaran');
        const noBpjsContainer = document.getElementById('no-bpjs-container');

        // Event listener untuk perubahan nilai pada dropdown
        metodePembayaran.addEventListener('change', function() {
            const noBpjs = document.getElementById('no_bpjs');
            if (this.value === 'bpjs') {
                noBpjsContainer.classList.remove('hidden');
                noBpjs.setAttribute('name', 'no_bpjs'); // Tambahkan name
                noBpjs.setAttribute('required', 'true'); // Tambahkan required
            } else {
                noBpjsContainer.classList.add('hidden');
                noBpjs.removeAttribute('name'); // Hapus name
                noBpjs.removeAttribute('required'); // Hapus required
            }
        });

        // Validasi No KTP
        document.getElementById('ktp').addEventListener('input', function () {
            const nik = this.value;
            const errorElement = document.getElementById('nik-error');

            // Clear any previous errors
            errorElement.textContent = '';
            errorElement.classList.add('hidden');

            // Perform AJAX request if NIK is not empty
            if (nik.trim() !== '') {
                fetch('{{ route('pasien.validate.nik') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ ktp: nik })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.valid) {
                            errorElement.textContent = data.message;
                            errorElement.classList.remove('hidden');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });

        // tanggal reservasi
        document.addEventListener('DOMContentLoaded', function () {
            const reservasiInput = document.getElementById('tanggal_reservasi');

            // Fungsi untuk menghitung tanggal 2 hari setelah hari ini
            function getMinReservasiDate() {
                const today = new Date();
                today.setDate(today.getDate() + 2); // Tambahkan 2 hari
                return today.toISOString().split('T')[0]; // Format ke YYYY-MM-DD
            }

            // Set atribut "min" pada input tanggal reservasi
            reservasiInput.min = getMinReservasiDate();
        });



    </script>

    <style>
        .tab-button {
            flex: 1;
            padding: 10px 0;
            text-align: center;
            font-medium;
            border-b-2;
            border-gray-300;
            cursor-pointer;
            transition: all 0.3s ease;
        }
        .tab-button:hover {
            color: #12A2BD;
        }
        .active-tab {
            color: white;
            background-color: #12A2BD;
            border-color: #12A2BD;
        }
        .input-field {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.3s ease;
        }
        .input-field:focus {
            border-color: #12A2BD;
        }
        .btn-primary {
            background-color: #12A2BD;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-medium;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0f8aa0;
        }
        .tab-content {
            display: none;
        }
        .active-content {
            display: block;
        }
    </style>
</body>
</html>

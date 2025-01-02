<x-app-layout>
    <div class="w-full mt-8 p-10 rounded-full bg-white">
        <div class="flex flex-col">
            <div class="w-1/2">
                <h1 class="text-2xl font-semibold">Data Antrian</h1>
            </div>
            <div class="w-full flex justify-between">
                <a href="/pasien/create" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded h-fit self-center">Tampilkan Antrian</a>
                <a href="/pasien/create" class="mt-4">Histori</a>
                <div>
                    <label for="">Tanggal Antrian</label>
                    <input type="date" name="" id="">
                </div>
            </div>

            <div class="tabel_pasien mt-4">
                <table class="table-auto w-full">
                    <thead class="text-black border-b border-slate-400">
                        
                            <tr>
                                <th scope="col" class="px-6 py-3 w-[10px]">
                                    Rekam Medis
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Pasien
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Poli
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Antrian
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status Antrian
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ACTIONS
                                </th>
                            </tr>
                    </thead>
                    @foreach ($antrian as $a)
                        <tbody class="text-center align-middle justify-center">
                            <td class="px-6 py-4">
                                {{$a->id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$a->pasien->nama}}
                            </td>
                            <td class="px-6 py-4">
                                {{$a->poli}}
                            </td>
                            <td class="px-6 py-4">
                                {{$a->tanggal_antrian}}
                            </td>
                            <td class="px-6 py-4 flex justify-center">
                                @if($a->status == "menunggu")
                                    <div class="px-2 w-fit rounded-full bg-blue-700">
                                        <p class="text-white">Menunggu</p>
                                    </div>
                                @elseif($a->status == "dilayani")
                                    <div class="px-2 w-fit rounded-full bg-yellow-500">
                                        <p class="text-white">Dilayani</p>
                                    </div>
                                @elseif($a->status == "selesai")
                                    <div class="px-2 w-fit rounded-full bg-green-700">
                                        <p class="text-white">Selesai</p>
                                    </div>
                                @elseif($a->status == "batal")
                                    <div class="px-2 w-fit rounded-full bg-red-700">
                                        <p class="text-white">Batal</p>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <button 
                                    class="bg-blue-700 text-white p-2 rounded-lg"
                                    onclick="openModal('{{$a->id}}', '{{$a->status}}')">
                                    Ubah
                                </button>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div id="editModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-semibold mb-4">Ubah Status Antrian</h2>
            <form id="editForm" action="{{ route('antrian.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <!-- Input hidden untuk ID antrian -->
                <input type="hidden" id="antrianId" name="antrianId">
    
                <!-- Dropdown untuk status -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium">Pilih Status Baru</label>
                    <select id="status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="menunggu">Menunggu</option>
                        <option value="dilayani">Dilayani</option>
                        <option value="selesai">Selesai</option>
                        <option value="batal">Batal</option>
                    </select>
                </div>
    
                <!-- Tombol Aksi -->
                <div class="flex justify-end">
                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded mr-2" onclick="closeModal()">Batal</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    

    <script>
        function openModal(id, status) {
            document.getElementById('antrianId').value = id; // Set ID antrian
            document.getElementById('status').value = status; // Set status saat ini
            document.getElementById('editModal').classList.remove('hidden'); // Tampilkan modal
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden'); // Sembunyikan modal
        }

    </script>
</x-app-layout>
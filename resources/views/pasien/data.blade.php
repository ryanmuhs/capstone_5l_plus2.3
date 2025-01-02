<x-app-layout>
    <div class="w-full mt-8 p-10 rounded-full bg-white">
        <div class="flex flex-col">
            <div class="w-1/2">
                <h1 class="text-2xl font-semibold">Data Pasien</h1>
            </div>
            <div class="w-full flex justify-between">
                <div class="input-form flex flex-col">
                    <label for="rekam_medis">Kode Rekam Medis</label>
                    <input type="text" name="rekam_medis">
                </div>
                <a href="/pasien/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded h-fit self-center">Tambah Pasien</a>
            </div>

            <div class="tabel_pasien mt-4">
                <table class="table-auto w-full">
                    <thead class="text-black border-b border-slate-400 text-start">
                        
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Rekam Medis
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Pasien
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No KTP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Metode Pembayaran
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    ACTIONS
                                </th>
                            </tr>
                    </thead>
                    @foreach ($pasien as $p)
                        <tbody class="text-center">
                            <td class="px-6 py-4">
                                {{$p->id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$p->nama}}
                            </td>
                            <td class="px-6 py-4">
                                {{$p->ktp}}
                            </td>
                            <td class="px-6 py-4">
                                {{$p->metode_pembayaran}}
                            </td>
                            <td class="px-6 py-4">
                                <a 
                                    href="/pasien/{{$p->id}}"
                                    class="font-bold bg-blue-800 text-white p-2 rounded-lg text-decoration-none">Edit</a>
                                <button class="bg-red-700 text-white p-2 rounded-lg">
                                    Hapus
                                </button>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
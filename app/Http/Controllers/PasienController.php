<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Antrian;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


// Indonesia
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    public function index(){
        $pasien = Pasien::all();
        return view('pasien.data', compact(['pasien']));
    }

    public function create(){
        // Get semua data
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        return view('pasien.registrasi', compact(['provinces', 'regencies', 'districts', 'villages']));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'ktp' => 'required|string|max:16|unique:pasien,ktp',
            'lahir_tempat' => 'required|string|max:255',
            'lahir_tanggal' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'provinsi' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'rt_rw' => 'required|string|max:255',
            'metode_pembayaran' => 'required|in:umum,bpjs',
            'no_bpjs' => 'nullable|numeric|required_if:metode_pembayaran,bpjs',
            'tanggal_reservasi' => 'required|date',
            function ($attribute, $value, $fail) {
                $minDate = now()->addDays(2)->startOfDay(); // Minimal 2 hari setelah hari ini
                if (now()->parse($value)->startOfDay()->lt($minDate)) {
                    $fail('Tanggal reservasi tidak boleh kurang dari 2 hari setelah hari ini.');
                }
            },
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Simpan data pasien
            $pasien = Pasien::create($validated);

            // Simpan data antrian
            $antrian = Antrian::create([
                'pasien_id' => $pasien->id,
                'poli' => 'Umum', // Anda bisa mengganti ini dengan input dari user jika diperlukan
                'tanggal_antrian' => $validated['tanggal_reservasi'],
                'nomor_antrian' => Antrian::whereDate('tanggal_antrian', $validated['tanggal_reservasi'])->count() + 1,
                'status' => 'Menunggu',
            ]);

            // Commit transaksi jika semua berhasil
            DB::commit();

            return redirect('/antrian')->with('success', 'Pasien dan antrian berhasil didaftarkan!');
        } catch (\Exception $e) {
            // Rollback jika ada kesalahan
            DB::rollback();
            Log::error('Error storing pasien and antrian: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan, silakan coba lagi.']);
        }
    }

    public function validateNik(Request $request)
    {
        $request->validate([
            'ktp' => 'required|string|max:16',
        ]);

        $exists = Pasien::where('ktp', $request->ktp)->exists();

        if ($exists) {
            return response()->json(['valid' => false, 'message' => 'NIK sudah pernah dipakai.'], 200);
        }

        return response()->json(['valid' => true], 200);
    }

    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.detail', compact(['pasien']));
    }

    public function login(Request $request){
        $request->validate([
            'ktp_or_hp' => 'required',
            'password' => 'required',
        ]);
    
        $user = Pasien::where('ktp', $request->ktp_or_hp)
                      ->orWhere('no_kontak', $request->ktp_or_hp)
                      ->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            // Redirect ke halaman antrian
            return redirect()->route('antrian.index');
        }
    
        return back()->withErrors(['login' => 'NIK/No HP atau Password salah.']);
    }
}

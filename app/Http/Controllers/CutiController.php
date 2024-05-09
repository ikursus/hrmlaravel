<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $senaraiCuti = DB::table('cuti')
        // ->join('users', 'cuti.user_id', '=', 'users.id')
        // ->latest() // orderBy ('id', 'desc')
        // ->select('cuti.*', 'users.first_name', 'users.last_name as nama_akhir')
        // ->get();

        $senaraiCuti = Cuti::with('detailUser')
        ->latest() // orderBy ('id', 'desc')
        ->get();

        return view('cuti.template-senarai-cuti', ['senaraiCuti' => $senaraiCuti]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $senaraiUsers = DB::table('users')
        // ->where('status', '=', 'active') // whereStatus('active')
        // ->orderBy('first_name', 'asc')
        // ->select('id', 'first_name', 'last_name')
        // ->get();
        $senaraiUsers = User::whereStatus('active')
        ->orderBy('first_name', 'asc')
        ->select('id', 'first_name', 'last_name')
        ->get();

        return view('cuti/template-add-cuti')->with('senaraiUsers', $senaraiUsers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'tarikh_mula' => 'required|date',
            'tarikh_akhir' => 'required|date',
            'type' => 'required',
            'status' => 'required',
            'reason' => 'nullable|sometimes'
        ]);

        $data = $request->all();

        // Tukar format tarikh kepada format yang disupport oleh Laravel menerusi Carbon
        $tarikhMula = Carbon::parse($data['tarikh_mula']);
        $tarikhAkhir = Carbon::parse($data['tarikh_akhir']);

        // Dapatkan jumlah hari cuti dan passkan kepada $data
        $jumlahPerbezaanHari = $tarikhMula->diffInDays($tarikhAkhir);
        $data['jumlah_hari'] = $jumlahPerbezaanHari + 1; // Campur 1 untuk jumlah hari cuti yang betul

        // DB::table('cuti')->insert($data);

        // Cara 1 Simpan Data Menggunakan Model
        //Cuti::insert($data);

        // Cara 2 Simpan Data Menggunakan Model
        // $cuti = new Cuti;
        // $cuti->user_id = $data['user_id'];
        // $cuti->type = $data['type'];
        // $cuti->tarikh_mula = $data['tarikh_mula'];
        // $cuti->tarikh_akhir = $data['tarikh_akhir'];
        // $cuti->jumlah_hari = $data['jumlah_hari'];
        // $cuti->reason = $data['reason'];
        // $cuti->status = $data['status'];
        // $cuti->save();

        // Cara 3 Simpan Data Menggunakan Model
        Cuti::create($data);

        return redirect()->route('cuti.index')->with('response-berjaya', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuti $cuti)
    {

        // $cuti = DB::table('cuti')->where('id', '=', $id)->first();
        // $cuti = Cuti::where('id', '=', $id)->first();
        // $cuti = Cuti::whereId($id)->first();
        // $cuti = Cuti::whereId($id)->firstOrCreate(['id' => $id]);
        // $cuti = Cuti::find($id);
        // $cuti = Cuti::findOrFail($id);

        return view('cuti.template-edit-cuti', compact('cuti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'tarikh_mula' => 'required|date',
            'tarikh_akhir' => 'required|date',
            'type' => 'required',
            'status' => 'required',
            'reason' => 'nullable|sometimes'
        ]);

        $cuti = Cuti::findOrFail($id);
        $cuti->update($data);

        return redirect()->route('cuti.index')->with('response-berjaya', 'Rekod berjaya dikemakini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        // $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('cuti.index')->with('response-berjaya', 'Rekod berjaya dihapuskan');
    }
}

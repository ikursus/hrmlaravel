<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiCuti = DB::table('cuti')->get();

        return view('cuti.template-senarai-cuti', ['senaraiCuti' => $senaraiCuti]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $senaraiUsers = DB::table('users')
        ->where('status', '=', 'active') // whereStatus('active')
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
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'tarikh_mula' => 'required|date',
            'tarikh_akhir' => 'required|date',
            'type' => 'required',
            'status' => 'required',
            'reason' => 'nullable|sometimes'
        ]);

        // Tukar format tarikh kepada format yang disupport oleh Laravel menerusi Carbon
        $tarikhMula = Carbon::parse($data['tarikh_mula']);
        $tarikhAkhir = Carbon::parse($data['tarikh_akhir']);

        // Dapatkan jumlah hari cuti dan passkan kepada $data
        $jumlahPerbezaanHari = $tarikhMula->diffInDays($tarikhAkhir);
        $data['jumlah_hari'] = $jumlahPerbezaanHari + 1; // Campur 1 untuk jumlah hari cuti yang betul

        DB::table('cuti')->insert($data);

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

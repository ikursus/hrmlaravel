<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dapatkan senarai users daripada table users
        $senaraiUsers = DB::table('users')->get();
        // $senaraiUsers = DB::select('SELECT * FROM users');

        return view('users.template-senarai-users', compact('senaraiUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.template-add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email:filter'],
            'phone' => ['nullable', 'sometimes'],
            'role' => ['required', 'in:admin,user'],
            'status' => ['required'],
            'password' => ['required', 'min:3', 'confirmed']
        ]);

        // $data = $request->only('first_name', 'last_name');
        // $data = $request->except('_token');
        // $data = $request->all();
        //$data = $request->input('first_name'); // $request->first_name

        // Encrypt password kerana menggunakan query builder tiada auto encrypt
        if (!is_null($data['password']))
        {
            $data['password'] = bcrypt($data['password']);
        }
        // Simpan data ke dalam database user
        DB::table('users')->insert($data);

        // Bagi response redirect ke senarai users & rekod berjaya disimpan
        return redirect()->route('users.index')->with('response-berjaya', 'Rekod berjaya disimpan!');

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
    public function edit($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first(); // select * FROM users where id = $id LIMIT 1

        return view('users.template-edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email:filter'],
            'phone' => ['nullable', 'sometimes'],
            'role' => ['required', 'in:admin,user'],
            'status' => ['required']
        ]);

        // Jika ruangan password diisi yakni password ingin ditukar
        if ($request->filled('password'))
        {
            // Maka, validate dahulu password
            $request->validate([
                'password' => ['min:3', 'confirmed']
            ]);
            // Jika tiada masalah, attachkan password yang diencrypt kepada array $data
            $data['password'] = bcrypt($request->input('password'));
        }

        // return $data;
        // dd($data); // Dump & Die
        // Simpan data ke dalam table users
        DB::table('users')->where('id', '=', $id)->update($data); // where('id', $id) // whereId($id)

        // Bagi response redirect ke senarai users & rekod berjaya disimpan
        // return redirect()->back();
        return redirect()->route('users.index')->with('response-berjaya', 'Rekod berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('id', '=', $id)->delete();

        return redirect()->route('users.index')->with('response-berjaya', 'Rekod berjaya dihapuskan!');
    }
}

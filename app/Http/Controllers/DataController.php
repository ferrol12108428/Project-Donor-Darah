<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;
use App\Exports\DonorExport;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Data::get();
        return view('index')->with('datas', $datas);
    }

    public function dataPetugas(Request $request)
    {
        $search = $request->search;
        $datas = Data::with('donor')->where('nama', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
        $datas = Data::with('donor')->orderBy('created_at', 'DESC')->get();
        return view('petugas', compact('datas'));
    }

    public function auth(Request $request) {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        //ambil data dan simpan di variable
        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/data');
            } 
            elseif (Auth::user()->role == 'petugas') {
                return redirect()->route('data.petugas');
            }
        } else {
            return redirect()->back()->with('failed', 'Gagal login, coba lagi!');
        }
        //simen data ke auth dengan Auth::attempt
        //cek progres penyimpanan ke auth berhasil ato tidak lewat if else
        // nesting if, if bersarang if didalam if
        // kalau data login uda masuk ke fitur Auth, dicek lagi pake if-else
        // kalau data Auth tersebut role nya petugas maka masuk ke route data
        // kalau data Auth role nya petugas maka masuk ke route data.petugas
    }

    public function createPDF() {
        $datas = Data::all()->toArray();
        view()->share('datas', $datas);
        $pdf = PDF::loadView('print', $datas)->setPaper('a4', 'landscape');
        return $pdf->download('data_pendonor_keseluruhan.pdf');
    }

    public function createExcel()
    {
        $file_name = 'data_pendonor_keseluruhan.xlsx';
        return Excel::download(new DonorExport, $file_name);
    }


    public function data () {
        $datas = Data::get();
        return view('data')
        ->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'no_telp' => 'required|max:13',
            'age' => 'required',
            'BB' => 'required',
            'pesan' => 'required|min:5',
            'foto' => 'required|image|mimes:jpg,jpeg,png,svg',
            'goldar' => 'required',
        ]);

        $path = public_path('assets/img/');
        $image = $request->file('foto');
        $imgName = rand() . '.' . $image->extension();
        $image->move($path, $imgName);

        Data::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'age' => $request->age,
            'BB' => $request->BB,
            'pesan' => $request->pesan,
            'foto' => $imgName,
            'goldar' => $request->goldar,
        ]);
        return redirect()->route('index');
        with('success', 'Berhasil menambahkan pengaduan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // cari data yang dimaksud
        $datas = Data::where('id', $id)->firstOrFail();
        // $data isinya -> nik sampe foto dr pengaduan
        // hapus data foto dr folder public : path . nama foto nya
        // nama foto nya diambil dari $datas yg diatas trs ngambil dr column 'foto'
        $image = public_path('assets/img/' . $datas['foto']);
        // uda nemu posisi fotonya, tinggal di hapus fotonya pake unlink
        unlink($image);
        // hapus $data yg isinya data nik-foto tadi , hapusnya di database
        $datas->delete();
        // setelahnya dikembalikan lg ke halaman awal
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('login')
        ->with('success', 'Berhasil logout');
    }
}

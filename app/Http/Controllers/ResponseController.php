<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($data_id)
    {
        // ambil data response yang bakal dimunculin, data yang diambil data response yang data_id nya sama kaya $data_id dari path dinamis {data_is}
        // kalau ada, datanya diambil satau /first()
        // kenapa ga pake firstOrFail() karena nnti bakal munculin not found view, kalau pake first() view ttp bakal ditampilin
        $data = Donor::where('data_id', $data_id)->first();
        // karean mau kirim data {data_id} buat di route updatenya, jadi biar bisa dipake di blade kita simpen data path dinamis $data_id nya ke variable baru yg bakal d icompact di blade nya
        $dataId = $data_id;
        return view('response', compact('data', 'dataId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data_id)
    {
        // dd($request->all());
        $request->validate([
            'status' => 'required',
            'response' => 'required',
        ]);
        // updateOrCreate() fungsinya untuk melakun update data kalo emng di db erponsenya uda ada data yg punya report_id sama dengan $report_id dari pathdinamis, kalau daga data itu maka di create
        // array pertama, acuan cari datanya
        // array ke dua, data yg dikirim 
        // kenapa pake updateOrCreate? keran response ini kan klo tdnya gada mau ditambahin tp klo ada mau diupdate aja
        Donor::updateOrCreate(
            [
                'data_id' => $data_id,
            ],
            [
                'status' => $request->status,
                'response' => $request->response,
            ]
        );

        return redirect()->route('data.petugas')->with('reponseSuccess', 'Berhasil mengubah response!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

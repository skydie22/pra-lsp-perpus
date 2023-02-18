<?php

namespace App\Http\Controllers\admin;

use App\Models\Identitas;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identitas = Identitas::first();
        // dd($identitas);
        return view('admin.identitas' , compact('identitas'));
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
     * @param  \App\Models\Identitas  $identitas
     * @return \Illuminate\Http\Response
     */
    public function show(Identitas $identitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Identitas  $identitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Identitas $identitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Identitas  $identitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if ($request->foto != null) {
            $imageName = time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('img/identitas/'), $imageName);

            $user = Identitas::find(1)->update($request->all());

            $user2 = Identitas::find(1)->update([
                "foto" => $imageName
            ]);

            if ($user && $user2) {
                return redirect()->back();
            }
        } else {
            $user = Identitas::find(1)->update($request->all());

            return redirect()->back();
        }




        // return redirect()->back()->with("status", "danger")->with('message', 'Gagal mengubah profile');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Identitas  $identitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Identitas $identitas)
    {
        //
    }


}

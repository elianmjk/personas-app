<?php

namespace App\Http\Controllers;

use App\Models\comuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class comunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $comunas= DB::table('tb_comuna')
     -> join('tb_municipio','tb_comuna.muni_codi','=','tb_municipio.muni_codi')
     ->select('tb_comuna.*','tb_municipio.muni_nomb')
     ->get();
     return view('comuna.index',['comunas'=>$comunas]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $municipio=DB::table('tb_municipio')
       ->orderBy('muni_nomb')
       ->get();
       return view('comuna.new',['municipios'=>$municipio]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comuna =new comuna();
        $comuna->comu_nomb=$request->name;
        $comuna->muni_code=$request->code;
        $comuna->save();

        $comunas=DB::table('tb_comuna')
        -> join('tb_municipio','tb_comuna.muni_codi','=','tb_municipio.muni_codi')
        ->select('tb_comuna.*','tb_municipio.muni_nomb')
        ->get();
        return view('comuna.index',['comunas'=>$comunas]);
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
    public function destroy($id)
    {
         // Eliminar el registro de la tabla 'tb_comuna' usando 'comu_codi' como condición
    $deleted = DB::table('tb_comuna')->where('comu_codi', $id)->delete();

    // Verificar si se eliminó correctamente
    if ($deleted) {
        // Si se eliminó correctamente, obtener las comunas actualizadas
        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
            ->get();

        // Retornar la vista con las comunas actualizadas
        return view('comuna.index', ['comunas' => $comunas]);
    } else {
        // Si no se pudo eliminar, redireccionar de vuelta con un mensaje de error
        return redirect()->back()->with('error', 'No se pudo eliminar la comuna.');
    }

    }
}

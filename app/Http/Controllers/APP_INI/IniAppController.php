<?php

namespace App\Http\Controllers\APP_INI;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IniAppController extends Controller
{
    public function inserirPaciente(Request $request) 
    {
        $responseJson = json_decode($request->getContent(), true);
        $pacienteInfo = $responseJson['pacienteInfo'];
        $pacienteResultado =  $responseJson['pacienteResultado'];
        $today = date("Y-m-d");  

       // return response()-> json([ $pacienteInfo,200);
        /*
        ['0000-00-00',$data['token'],$data['triglicerideos'],$data['peso'],$data['altura'],
        $data['ggt'],$data['plaquetas'],$data['circuferenciaAbdominal'],$data['tgp'],$data['tgo'],$data['diabetes'],$data['vtgo'],$data['sexo'], 
        $data['insulina'],$data['sindromeMetabolica'],$data['glicemia'],$data['albumina']
         fli_soma, fli_resultado, hsi_soma, hsi_resultado, nafld_soma,nafld_resultado,
        elsacom_soma,elsasem_resultado, apri_soma,apri_resultado, fib_soma,fib_resultado, nfs_soma,nfs_resultado

        ,$data['triglicerideos'],$data['peso'],$data['altura'],
        $data['ggt'],$data['plaquetas'],$data['circuferenciaAbdominal'],$data['tgp'],$data['tgo'],$data['diabetes'],$data['vtgo'],$data['sexo'], 
        $data['insulina'],$data['sindromeMetabolica'],$data['glicemia'],$data['albumina']

        ,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?

        triglicerideos,peso,altura,ggt,plaquetas,cir_abdominal,tgp,tgo,diabetes,vtgo,
        sexo,insula, sin_metabolica,glicemia, albumina
       */ 
        
        DB::insert('INSERT INTO ini_app_dados (
            data,token,
            triglicerideos,peso,
            altura,ggt,
            plaquetas,cir_abdominal,
            tgp,tgo,diabetes,
            vtgo,sexo,insulina, 
            sin_metabolica,glicemia, 
            albumina, 
            fli_soma, fli_resultado, 
            hsi_soma, hsi_resultado, 
            nafld_soma, nafld_resultado,
            elsacom_soma, elsacom_resultado, 
            elsasem_soma, elsasem_resultado, 

            fib4_soma, fib4_resultado, 
            nfs_soma, nfs_resultado
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        [
            $today,$pacienteInfo['token'],
            $pacienteInfo['triglicerideos'],$pacienteInfo['peso'],
            $pacienteInfo['altura'],$pacienteInfo['ggt'],
            $pacienteInfo['plaquetas'],$pacienteInfo['circuferenciaAbdominal'],
            $pacienteInfo['tgp'],$pacienteInfo['tgo'],
            $pacienteInfo['diabetes'],$pacienteInfo['vtgo'],
            $pacienteInfo['sexo'],$pacienteInfo['insulina'],
            $pacienteInfo['sindromeMetabolica'],$pacienteInfo['glicemia'],
            $pacienteInfo['albumina'],
            $pacienteResultado['fli_soma'], $pacienteResultado['fli_resultado'],
            $pacienteResultado['hsi_soma'], $pacienteResultado['hsi_resultado'],
            $pacienteResultado['nafld_soma'], $pacienteResultado['nafld_resultado'],
            $pacienteResultado['elsacom_soma'], $pacienteResultado['elsacom_resultado'],
            $pacienteResultado['elsasem_soma'], $pacienteResultado['elsasem_resultado'],
            $pacienteResultado['fib4_soma'], $pacienteResultado['fib4_resultado'],
            $pacienteResultado['nfs_soma'], $pacienteResultado['nfs_resultado'],
        ]);

    }

    public function teste(Request $request) 
    {
         //$data = json_decode($request->getContent(), true);
         //$data = $data['paciente'];

   
        /*
        DB::insert(`INSERT INTO ini_app_dados 
        (
            data, token, 
            triglicerideos, peso, 
            altura, ggt, 
            plaquetas, cir_abdominal, 
            tgp, tgo, 
            diabetes, vtgo, 
            sexo, insula, 
            sin_metabolica, glicemia, 
            albumina, fli_soma, 
            fli_resultado, hsi_soma, 
            hsi_resultado, nafld_soma, 
            nafld_resultado, elsacom_soma, 
            elascom_resultado, elsasem_soma, 
            elsasem_resultado, apri_soma, 
            apri_resultado, fib-4_soma, 
            fib-4_resultado, nfs_soma, 
            nfs_resultado
        ) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,)`,
        ['12345']);

        DB::insert('INSERT INTO ini_app_dados (data,token,triglicerideos,peso,altura,ggt,plaquetas,cir_abdominal,tgp,tgo,diabetes,vtgo,
        sexo,insula, sin_metabolica,glicemia, albumina, fli_soma, fli_resultado, hsi_soma, hsi_resultado, nafld_soma,nafld_resultado,
        elsacom_soma,elsasem_resultado, apri_soma,apri_resultado, fib-4_soma,fib-4_resultado, nfs_soma,nfs_resultado
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$data]);
        */

        DB::insert('INSERT INTO ini_app_dados (data) VALUES (?)',['2020-02-10']);
        DB::insert('INSERT INTO testando_table (testandoToken) VALUES (?)',['123456']);
        // $dados = DB::select('select * from ini_app_dados');
         
        // return response()-> json([ $dados],200);
       // return response()->json(compact('data'),200);
    }
}

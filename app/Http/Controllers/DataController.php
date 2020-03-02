<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
        public function open() 
        {
            //$data = "Usuarios nao autenticados podem visualizar este conteudo";


           return  response()-> json([ 
               Array(
            'name' => 'João Pedro',
            'github_username' =>  'itsjhonny',
            'contact' => [
                'phone'=>'xxxxx-xxxx',
                'instagram'=>'jowhhn',
                'email'=>'email@gmail.com'
        ],
            'avatar_url' => 'https://media-exp2.licdn.com/dms/image/C4D03AQGirBIMfsCBvw/profile-displayphoto-shrink_200_200/0?e=1585180800&v=beta&t=ckJQOjTz9H7TU22AWW5kC0-lDjL4-HxwMRnIOEL_5YY',
            'techs' => ['Hipoglos','coristina D','Hipoglos','coristina D','Hipoglos','coristina D','Hipoglos','coristina D'],
            'location' => [               
                'coordinates' => [-43.17212139056889,-22.96232651196502],                  
            
                'index' => '2dsphere'
            ]
            ),
            Array(
                'name' => 'Leo',
                'github_username' =>  'itsjhonny',
                'contact' => [
                    'phone'=>'xxxxx-xxxx',
                    'instagram'=>'jowhhn',
                    'email'=>'email@gmail.com'
            ],
                'avatar_url' => 'https://i.ibb.co/s1djvG7/pp.jpg',
                'techs' => ['Hipoglos','coristina D','Hipoglos','coristina D','Hipoglos','coristina D','Hipoglos','coristina D'],
                'location' => [               
                    'coordinates' => [-43.1847469,-22.970898],                  
                
                    'index' => '2dsphere'
                ]
                ),

           
         ],201); 
            //return response()->json(compact('data'),200);

        }

        public function closed() 
        {
            $data = "Usuario autenticado esta visualizando corretamente";
            return response()->json(compact('data'),200);
        }
}
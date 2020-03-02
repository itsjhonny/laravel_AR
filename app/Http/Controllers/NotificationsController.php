<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\firebasetokens;
use Illuminate\Support\Facades\Input;

$GLOBALS  = array(
    'MyNumber' => 1,
    'keyFirebase' => 'AAAAB2JKaTw:APA91bEeFLBtPYGzJG_69KYVUrxCa_4nXKoTdRk0VaTbBYte31XWAcZRduKX8gORpbam0FOMxIJoZ1NYua74HMyNBW1rCLqGeT0N-eBRwVrP2yWDuUMy66fMrnEzYqKAE7tzSQmRMPbR',
);

class NotificationsController extends Controller
{    
    protected $configs;

        public function __construct() {
            global $GLOBALS;
            $this->configs =& $GLOBALS ;
        }
       
        public function saveToken(Request $request){  
            $user = firebasetokens::where('firebasetoken',Input::get('firebasetoken'))->first();
            if (!is_null($user)) {
               
                $data = json_decode($request->getContent(), true);
                    
                
                $novo = new firebasetokens;
                $novo->token = $data['firebasetoken'];
                $novo->save();

                return 200;
            }
            

            //$credentials = $request->only('firebase_token');

            //return  $this->configs['MyNumber'] = 3;
        }

        public function sendNotification(Request $request){
            $data = json_decode($request->getContent(), true);

            $url = 'https://fcm.googleapis.com/fcm/send';

            $fields = array (
                    'registration_ids' => array (
                            $id
                    ),
                    'data' => array (
                            "message" => '$message'
                    )
            );
            $fields = json_encode ( $fields );
        
            $headers = array (
                    'Authorization: key=' . $this->configs['keyFirebase'],
                    'Content-Type: application/json'
            );
        
            $ch = curl_init ();
            curl_setopt ( $ch, CURLOPT_URL, $url );
            curl_setopt ( $ch, CURLOPT_POST, true );
            curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        
            $result = curl_exec ( $ch );
            echo $result;
            curl_close ( $ch );

            return 200;
        }


        public function open() 
        {
            //$data = "Usuarios nao autenticados podem visualizar este conteudo";

            return 'notifications ok';

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
            'techs' => ['Hipoglos','coristina D'],
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
                'techs' => [],
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
<?php

namespace App\Helper;

use GuzzleHttp\Client;
use App\Name;

class nameApi {
    private $names;

    public function __construct($names = null) {
        $this->names = $names;
    }

    public function names() {
        $client = new Client();
        $url = 'http://rc50-api.nameapi.org/rest/v5.0/parser/personnameparser?apiKey=43883e18f8bc747a98da48ca4db32786-user1';
        
        $json = [
            'inputPerson'=>[
                'type'=>'NaturalInputPerson',
                'personName'=>[
                    'nameFields'=>[[
                        'string'=> $this->names,
                        'fieldType'=>'FULLNAME'
                    ]]
                ]
            ]
        ];
        
        try {
            $res = $client->request('POST', $url, ['json'=>$json]);
            $data = json_decode($res->getBody());
            $terms = $data->matches[0]->parsedPerson->outputPersonName->terms;
            
            $first_names = [];
            $last_names = [];
            foreach ($terms as $term) {
                if($term->termType == 'GIVENNAME'){
                    $first_names[] = $term->string;
                }else{
                    $last_names[] = $term->string;
                }
            }
            
            $name = Name::create([
                'names' => $this->names,
                'first_name' => implode(" ", $first_names),
                'last_name' => implode(" ", $last_names)
            ]);
            
            $message = ['type' => 'success', 'text' => 'Nombre agregado correctamente'];
        } catch (\Throwable $th) {
            $message = ['type' => 'danger', 'text' => 'Error al agregar nombre'];
        }

        return compact('name', 'message');
    }
}
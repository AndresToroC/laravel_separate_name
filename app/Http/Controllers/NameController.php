<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\NameFormRequest;
use GuzzleHttp\Client;
use Session;

use App\Name;

class NameController extends Controller
{
    public function index(Request $request)
    {
        $names = Name::searchAndPaginate();

        return view('names.index', compact('names'));
    }

    public function create()
    {
        return view('names.create');
    }

    public function store(NameFormRequest $request)
    {
        $client = new Client();
        $url = 'http://rc50-api.nameapi.org/rest/v5.0/parser/personnameparser?apiKey=43883e18f8bc747a98da48ca4db32786-user1';

        $json = [
            'inputPerson'=>[
                'type'=>'NaturalInputPerson',
                'personName'=>[
                    'nameFields'=>[[
                        'string'=> $request->names,
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
            
            Name::create([
                'names' => $request->names,
                'first_name' => implode(" ", $first_names),
                'last_name' => implode(" ", $last_names)
            ]);

            $message = ['type' => 'success', 'text' => 'Nombre agregado correctamente'];
        } catch (\Throwable $th) {
            $message = ['type' => 'danger', 'text' => 'Error al agregar nombre'];
        }

        Session::flash('message', $message);
        return redirect()->back();
    }
    
    public function show($id)
    {
        //
    }

    public function edit(Name $name)
    {
        return view('names.edit', compact('name'));
    }

    public function update(NameFormRequest $request, Name $name)
    {
        $name->update($request->all());

        $message = ['type' => 'success', 'text' => 'Nombre actualizado correctamente'];
        Session::flash('message', $message);

        return redirect()->back();
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

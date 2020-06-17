<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use Session;

use App\Imports\NamesImport;
use App\Exports\NamesExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Requests\NameFormRequest;
use App\Helper\NameApi;

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
        $names = $request->names;
        $apiName = new NameApi($names);
        $response = $apiName->names();

        Session::flash('message', $response['message']);
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

    public function destroy($id)
    {
        //
    }

    public function file(Request $request) {
        $rules = [
            'file' => 'required'
        ];

        $request->validate($rules);

        $rows = Excel::toArray(null, request()->file('file'))[0];
        
        return Excel::download(new NamesExport($rows), 'names.xlsx');
    }
}

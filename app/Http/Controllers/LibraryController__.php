<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\facades\Input;
use Illuminate\Support\Facades\DB;


class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        //
        return view('home')->with('libraries', Library::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $actionForm = 'library';
        return view('create-library')->with([
                    'action' => 'Create library', 
                    'submitValueName' => 'create', 
                    'actionForm' => $actionForm,
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       $validator = Validator::make($request->all(), [
            'name' => 'required',
            'owner' => 'required',
            'phoneNumber' => 'required',
            'city' => 'required',
            'quarter' => 'required'
        ]);

        $fieldValue = [
            'name' => $request->input('name'),
            'owner' => $request->input('owner'),
            'phoneNumber' => $request->input('phoneNumber'),
            'city' => $request->input('city'),
            'quarter' => $request->input('quarter')
        ];

        if($request->input('name') == null || !$request->input('name'))
            $errorMessage['name'] = 'Le champ nom est obligatoire';
        if($request->input('owner') == null || !$request->input('owner'))
            $errorMessage['owner'] = 'Le champ propriétaire est obligatoire';
        if($request->input('phoneNumber') == null || !$request->input('phoneNumber'))
            $errorMessage['phoneNumber'] = 'Le champ téléphone est obligatoire';
        if($request->input('city') == null || !$request->input('city'))
            $errorMessage['city'] = 'Le champ ville est obligatoire';
        if($request->input('quarter') == null || !$request->input('quarter'))
            $errorMessage['quarter'] = 'Le champ quartier est obligatoire';

        if($validator->fails()){
            $actionForm = 'library';
            return view('create-library')->with([
                'errorMessage' => $errorMessage,
                'fieldValue' => $fieldValue,
                'actionForm' => $actionForm,
                'action' => 'Create library', 
                'submitValueName' => 'create',
            ]);
        }else {
            $library = new Library;
            $library->name = $request->input('name');
            $library->owner = $request->input('owner');
            $library->phoneNumber = $request->input('phoneNumber');
            $library->city = $request->input('city');
            $library->quarter = $request->input('quarter');
            $library->save();

            return redirect('/library')->with([
                'messageConfirmation' => 'Library had been created successfully!',
            ]);
        }
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
        return 'display a specific library';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $library = Library::where('id', $id)->get();

        $fieldValue = [
            'name' => $library[0]->name,
            'owner' => $library[0]->owner,
            'phoneNumber' => $library[0]->phoneNumber,
            'city' => $library[0]->city,
            'quarter' => $library[0]->quarter
        ];

        $actionForm = 'library/'.$id;
        return view('create-library')
                ->with(['fieldValue' => $fieldValue, 
                        'action' => 'Edit '. $library[0]->name . ' library',
                        'submitValueName' => 'update',
                        'actionForm' => $actionForm
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $library = Library::where('id', $id)->get();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'owner' => 'required',
            'phoneNumber' => 'required',
            'city' => 'required',
            'quarter' => 'required'
        ]);

        $fieldValue = [
            'name' => $request->input('name'),
            'owner' => $request->input('owner'),
            'phoneNumber' => $request->input('phoneNumber'),
            'city' => $request->input('city'),
            'quarter' => $request->input('quarter')
        ];

        if($request->input('name') == null || !$request->input('name'))
            $errorMessage['name'] = 'Le champ nom est obligatoire';
        if($request->input('owner') == null || !$request->input('owner'))
            $errorMessage['owner'] = 'Le champ propriétaire est obligatoire';
        if($request->input('phoneNumber') == null || !$request->input('phoneNumber'))
            $errorMessage['phoneNumber'] = 'Le champ téléphone est obligatoire';
        if($request->input('city') == null || !$request->input('city'))
            $errorMessage['city'] = 'Le champ ville est obligatoire';
        if($request->input('quarter') == null || !$request->input('quarter'))
            $errorMessage['quarter'] = 'Le champ quartier est obligatoire';

        if($validator->fails()){
            $actionForm = 'library';
            return view('create-library')->with([
                'errorMessage' => $errorMessage,
                'fieldValue' => $fieldValue,
                'actionForm' => $actionForm,
                'action' => 'Create library', 
                'submitValueName' => 'create',
            ]);
        }else{
            $library[0]->name = $request->input('name');
            $library[0]->owner = $request->input('owner');
            $library[0]->phoneNumber = $request->input('phoneNumber');
            $library[0]->city = $request->input('city');
            $library[0]->quarter = $request->input('quarter');
            $library[0]->save();

            return redirect('/library')->with('messageConfirmation', 'Library had been updated successfully');
        }
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
        Library::destroy($id);
        if(Library::destroy($id)) {
             return redirect('/library')->with('messageConfirmation', 'Library had been deleted successfully');
        }
        return redirect('/library')->with('messageConfirmation', 'Library deleting failed');
       
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSubmitRequest;
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
    public function store(UserSubmitRequest $request)
    {
        $validate = $request->validated();
        $library = new Library;
        $library->name = $validate['name'];   
        $library->owner = $validate['owner'];   
        $library->phoneNumber = $validate['phoneNumber'];   
        $library->city = $validate['city'];   
        $library->quarter = $validate['quarter'];   

        $library->save();
        return redirect('/library')->with('messageConfirmation', 'The library had been created successfully');
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
    public function edit($id)
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
                ->with([
                    'fieldValue' => $fieldValue, 
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
    public function update(UserSubmitRequest $request, $id)
    {
        //
        $validate = $request->validated();

        $library = Library::where('id', $id)->get();
        $library[0]->name = $validate['name'];   
        $library[0]->owner = $validate['owner'];   
        $library[0]->phoneNumber = $validate['phoneNumber'];   
        $library[0]->city = $validate['city'];   
        $library[0]->quarter = $validate['quarter'];   

        $library[0]->save();
        return redirect('/library')->with('messageConfirmation', 'The library had been updated successfully');
       
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

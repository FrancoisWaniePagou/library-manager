<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalDocument;
use App\Models\Dictionnary;
use App\Models\Library;
use App\Http\Requests\DocumentSubmitRequest;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return 'hello world';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDocument($idLibrary)
    {
        $months = [];
        $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        return view('create-document')->with([
            'submitValueName' => 'create',
            'idLibrary' => $idLibrary,
            'months' => $months,
            'actionForm' => 'document'
        ]);
    }

    public function create(){

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentSubmitRequest $request)
    {
        $dictionnary = Dictionnary::create($request->validated());
        // $validate = $dictionnary->add($request);
        $dictionnary->save();
        return redirect()->route('document.show', ['id' => $dictionnary->idLibrary])
                        ->with(['messageConfirmation', 'The library had been created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idLibrary)
    {
        $documents = new GlobalDocument;
        $documents = $documents->getAll($idLibrary);
        $libraryName = $this->getLibraryName($idLibrary);

        if(empty($documents->first())){
            return view('document-list')->with([
                'noRecordMessage' => 'No document recorded!',
                'idLibrary' => $idLibrary,
                'libraryName' => $libraryName,
            ]);
        }else{
            return view('document-list')->with([
                'documents' => $documents,
                'idLibrary' => $idLibrary,
                'libraryName' => $libraryName,
            ]);
        }
    }

    public function getLibraryName($id){
        $library = Library::where('id', $id)->get();
        $libraryName = $library[0]->name;

        return $libraryName;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $globalDocument = GlobalDocument::where('id', $id)->get();

        $fieldValue = [
            'title' => $globalDocument[0]->title,
            'price' => $globalDocument[0]->price,
            'image' => $globalDocument[0]->image,
            'numberOfPage' => $globalDocument[0]->numberOfPage,
            'language' => $globalDocument[0]->language
        ];

        $actionForm = 'document/'.$id;
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
    public function update(DocumentSubmitRequest $request, $id, $documentType)
    {
        
        $globalDocument = new GlobalDocument;
        $globalDocument = $globalDocument->getAll($id);

        $globalDocument[0]->title = $globalDocument['title'];   
        $globalDocument[0]->owner = $globalDocument['owner'];   
        $globalDocument[0]->phoneNumber = $globalDocument['phoneNumber'];   
        $globalDocument[0]->city = $globalDocument['city'];   
        $globalDocument[0]->quarter = $globalDocument['quarter'];   

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
        $globalDocument = GlobalDocument::find($id);
        $idLibrary = $globalDocument->idLibrary;
        // var_dump($id); die();
        if($globalDocument){
            $globalDocument->delete();
            return redirect()->route('document.show', ['id' => $idLibrary])->with('messageConfirmation', 'Document had been deleted successfully');
        }
        return redirect()->route('document.show', ['id' => $idLibrary])->with('messageConfirmation', 'Document deleting failed');
    }
}

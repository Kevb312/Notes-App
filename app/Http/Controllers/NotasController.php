<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    //
    public function get(){

        $notas = Note::orderBy('created_at', 'desc')->take(3)->get();
        return view('formulario', compact('notas'));
    }
    

    public function store(Request $request){
        
        request()->validate([
            'Titulo' => 'required',
            'Nota' => 'required'
        ]);

        Note::create([
            'name' => $request->Titulo,
            'note' => $request->Nota
        ]);

        return redirect()->route('Notas');
       
    }

    public function delete($id){
        $del = Note::where('id',$id)->delete();
        return redirect('/');
    }

    public function view($id){
        return view('nota', [
            'nota' => Note::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id){
        request()->validate([
            'Titulo' => 'required',
            'Nota' => 'required'
        ]);

        $notas = 
                Note::where('id', $id)
                ->update(['name' => $request->Titulo, 'note' => $request->Nota]);
        return redirect()->route('Notas');
    }

    public function allNotes(){
        $notas = Note::orderBy('created_at', 'desc')->get();
        return view('allNotes', compact('notas'));
    }
}

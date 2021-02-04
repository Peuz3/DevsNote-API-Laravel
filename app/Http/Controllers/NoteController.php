<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    private $arrayReturn = ['error' => '', 'result' => []];

    public function all()
    {

        $notes = Note::all();

        foreach ($notes as $note) {
            $this->arrayReturn['result'][] = [
                'id' => $note->id,
                'title' => $note->title
            ];
        }

        return $this->arrayReturn;
    }

    public function one($id)
    {

        $note = Note::find($id);

        if ($note) {
            $this->arrayReturn['result'] = $note;
        } else {
            $this->arrayReturn['error'] = "ID não encontrado!";
        }

        return $this->arrayReturn;
    }

    public function new(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');

        if ($title && $body) {
            $note = new Note();
            $note->title = $title;
            $note->body = $body;
            $note->save();

            //Retorno o objeto dentro do Result
            $this->arrayReturn['result'] = [
                'id' => $note->id,
                'title' => $title,
                'body' => $body
            ];
        } else {
            $this->arrayReturn['error'] = "Campos não enviados!";
        }

        return $this->arrayReturn;
    }
}

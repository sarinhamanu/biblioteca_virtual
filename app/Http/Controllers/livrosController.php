<?php

namespace App\Http\Controllers;

use App\Http\Requests\livroFormRequest;
use App\Models\livros;
use Illuminate\Http\Request;

class livrosController extends Controller
{
    public function store(livroFormRequest $request){
        $livro = livros::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'data_de_lancamento'=>$request->data_de_lancamento,
            'editora'=>$request->editora,
            'sinopse'=>$request->sinopse,
            'genero'=>$request->genero,
            'avaliacao'=>$request->avaliacao,
          
            
        ]);
        return response()->json([
            "succes" => true,
            "message" =>"Livro Cadastrado com sucesso",
            "data" => $livro
        ],200);
    }
public function retornarTodos()
{
    $livro= livros::all();
    return response()->json([
        'status'=> true,
        'data'=>$livro
    ]);
}
public function pesquisaPorId($id){
    $livro= livros::find($id);


    if($livro ==  null){
        return response()->json([
            'status'=>  false,
            'message'=>"Livro  não encontrado"
        ]);
    }
    return response()->json([
        'status'=>true,
        'data'=>$livro
    ]);
}

public function pesquisarporTitulo(Request $request){
    $livro = livros::where('titulo','like' ,'%'.$request->nome. '%')->get();

    if(count($livro)>0){
        return response()->json([
            'status'=>true,
            'data'=>$livro
        ]);
    }
    return response()->json([
        'status'=>false,
        'data'=>'Não há resultado para pesquisar'
    ]);
}

public function update(Request $request){
    $livro = livros::find($request->id);

    if(!isset($livro)){
        return response()->json([
            'status' => false,
            'message' => "Cadastro não encontrado"
        ]);
    }

    if(isset($request->titulo)){
        $livro->titulo = $request->titulo;
    }
    if(isset($request->autor)){
        $livro->autor= $request->autor;
    }
    if(isset($request->data_de_lancamento)){
        $livro->data_de_lancamento = $request->data_de_lancamento;
    }
    if(isset($request->editora)){
        $livro->editora = $request->editora;
    }
    if(isset($request->sinopse)){
        $livro->sinopse = $request->sinopse;
    }
    if(isset($request->genero)){
        $livro->genero = $request->genero;
    }
    if(isset($request->avaliacao)){
        $livro->avaliacao = $request->avaliacao;
    }
    
    
    $livro-> update();

    return response()->json([
        'status' => true,
        'message' => "Cadastro atualizado"
    ]);
}
public function excluir($id){
    $livro = livros::find($id);


    if(!isset($livro)){
        return response()->json([
            'status'=> false,
            'message'=>"Cadastro não encontrado"
        ]);

    }
    $livro->delete();

    return response()->json([
        'status'=>true,
        'message'=>"Cadastro excluido com sucesso"
    ]);
}
}
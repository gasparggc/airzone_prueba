<?php

namespace App\Services;

use App\Models\Category;


class CategoryService
{
    protected $category;

    public function __construct(){
        
        $this->category = new Category;
    }

    public function results($error,$data){
        $response = array(
            'error' => $error,
            'data' => $data
        );

        return $response;
    }

    public function index(){
        try{
            $data = $this->category->search();
            if(!empty($data)){
                $response = $this->results(0, $data);
            }else{
                $response = $this->results(1, 'No se ha encontrado ninguna categoría');
            }
        }catch(\Exception $error){
            $response = $this->results(1, $error);

        }
        return $response;
    }

    public function store($request){

        try{
            $request = $request->validate([
                'name' => ['required','string','max:255'],
                'slug' => ['required','string','max:255']
            ]);

            $data = $this->category->store($request);
            $response = $this->results(0, 'Categoría añadida correctamente');

        }catch(\Exception $error){
            $response = $this->results(1, $error);
        }
        return $response;
    }

    public function show($id){
        try{
            $data = $this->category->searchById($id);
            if(!empty($data)){
                $response = $this->results(0, $data);
            }else{
                $response = $this->results(1, 'No se ha encontrado ninguna categoría');
            }

        }catch(\Exception $error){
            $response = $this->results(1, $error);
        }
        return $response;
    }

    public function update($request, $id){
        try{
            $request = $request->validate([
                'name' => ['required','string','max:255'],
                'slug' => ['required','string','max:255'],
                'visible' => ['in:0,1']
            ]);
            $data = $this->category->updateById($request, $id);
            $response = $this->results(0, 'Categoria actualizada correctamente');
        }catch(\Exception $error){
            $response = $this->results(1,$error);
        }
        return $response;
    }

    public function destroy($id){
        try{
            $data = $this->category->deleteById($id);
            $response = $this->results(0, 'Categoria eliminada correctamente');
            if(!$data){
                $response = $this->results(1, 'Categoria no existe');
            }
        }catch(\Exception $error){
            $response = $this->results(1,$error);
        }
        return $response;
                
    }
}
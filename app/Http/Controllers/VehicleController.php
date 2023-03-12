<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //..recuperando os veículos do banco de dados
         $vehicles = Vehicle::all();
        //..retorna a view index passando a variável $vehicles
         return view('vehicles.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //..mostrando o formulário de cadastro
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //..instancia um novo model Vehicle
        $vehicle = new Vehicle();
        //..pega os dados vindos do form e seta no model
        $vehicle->marca = $request->input('marca');
        $vehicle->model = $request->input('model');
        $vehicle->year = $request->input('year');
        $vehicle->color = $request->input('color'); 
        $vehicle->km = $request->input('km'); 
        $vehicle->fuel = $request->input('fuel'); 
        

        //..persiste o model na base de dados
        $vehicle->save();
        //..retorna a view com uma variável msg que será tratada na própria view
        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles)
        ->with('msg', 'Veículo cadastrado com sucesso!');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //..recupera o veículo da base de dados
        $vehicle = Vehicle::find($id);

        //..se encontrar o veículo, retorna a view com o objeto correspondente
        if ($vehicle) {
        return view('vehicles.show')->with('vehicle', $vehicle);
    } else {
        //..senão, retorna a view com uma mensagem que será exibida.
        return view('vehicles.show')->with('msg', 'Veículo não encontrado!');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //..recupera o veículo da base de dados
        $vehicle = Vehicle::find($id);
        //..se encontrar o veículo, retorna a view de ediçãcom com o objeto correspondente
        if ($vehicle) {
            return view('vehicles.edit')->with('vehicle', $vehicle);
        } else {
        //..senão, retorna a view de edição com uma mensagem que será exibida.
            $vehicles = Vehicle::all();            
            return view('vehicles.index')->with('vehicles', $vehicles)
            ->with('msg', 'Veículo não encontrado!');
         }
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
        //..recupera o veículo mediante o id
        $vehicle = Vehicle::find($id);
        //..atualiza os atributos do objeto recuperado com os dados do objeto Request
        $vehicle->marca = $request->input('marca');
        $vehicle->model = $request->input('model');
        $vehicle->year = $request->input('year');
        $vehicle->color = $request->input('color'); 
        $vehicle->km = $request->input('km'); 
        $vehicle->fuel = $request->input('fuel'); 
       
        //..persite as alterações na base de dados
        $vehicle->save();
        //..retorna a view index com uma mensagem
        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles)
            ->with('msg', 'Veículo atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //..recupeara o recurso a ser excluído
        $vehicle = Vehicle::find($id);
        //..exclui o recurso
        $vehicle->delete();
        //..retorna à view index.
        $vehicles = Vehicle::all();
            return view('vehicles.index')->with('vehicles', $vehicles)
            ->with('msg', "Veículo excluído com sucesso!");
    }
}

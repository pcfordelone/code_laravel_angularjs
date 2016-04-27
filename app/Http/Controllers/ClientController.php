<?php

namespace FRD\Http\Controllers;

use FRD\Repositories\ClientRepositoryInterface;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    private $clientRepository;

    public function __construct(ClientRepositoryInterface $client)
    {
        $this->clientRepository = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->clientRepository->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->clientRepository->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->clientRepository->find($id);
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
        $client = $this->clientRepository->find($id);
        $client->update($request->all());

        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = $this->clientRepository->find($id);
        $this->clientRepository->delete($id);

        return response()->json(["msg" => "O cliente {$client->name} foi deletado com sucesso"]);
    }
}

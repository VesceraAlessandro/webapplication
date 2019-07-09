<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presenze;
use App\User;

class PresenceController extends Controller
{
    //ritorna tutte le presenze 
	public function getPresences()
    {
        return Presenze::all();
    }


	//ritorna le presenze di un singolo utente
	public function getSpecificUserPresences(Request $request)
	{
		$idUtente = $request->input('idUtente');

		return  Presenze::where('idUtenti', $idUtente)->get();
	}

	
	//inserisce una presenza relativa all'utente 
	public function insertPresence(Request $request)
	{
		$presenza = new Presenze;

        $presenza->Stato = $request->input('stato');
		$presenza->idUtenti = $request->input('idUtente');

        $presenza->save();
		
		return response()->json(['message' => 'Successfully presence insertion'], 201);
	}
	

	//aggiorna lo stato di una singola presenza
	public function updatePresence(Request $request)
	{	
		$idPresenza = $request->input('idPresenza');
		$stato = $request->input('stato');
		
		$presenza = Presenze::find($idPresenza);
		
		$presenza->Stato = $stato;
		
		$presenza->save();
				
		return response()->json(['message' => 'Successfully presence update'], 200);
	}
	

	//elimina una singola presenza 
	public function deletePresence(Request $request)
	{
		$idPresenza = $request->input('idPresenza');
		
		$presenza = Presenze::find($idPresenza);
		
		$presenza->delete();
		
		return response()->json(['message' => 'Successfully presence deleting'], 200);
		
	}
}

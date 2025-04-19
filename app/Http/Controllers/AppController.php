<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reservaciones;

class AppController extends Controller
{
    public function getReservations(Request $request)
    {
        $user = Auth::user();

        $roles      = unserialize($user->roles);
        $id_cliente = $user->id_cliente;

        if (in_array("administrador",$roles)) {
            $reservas = Reservaciones::where('id_cliente', $id_cliente)->orderBy('fecha_reserva', 'asc')->get();
    
            return response()->json($reservas);
        } else {
            return response()->json(['error' => 'No tienes rol de administrador'], 401);
        }

    }

    public function getReservationsProfesional(Request $request,string $id)
    {
        $user = Auth::user();
        return response()->json($user);
        
    }
}

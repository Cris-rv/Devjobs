<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Vacante $vacante)
    {
        $notificaciones = auth()->user()->unreadNotifications;

        // Limpiar notificaciones
        auth()->user()->unreadNotifications->markAsRead();

        return view('notficaciones.index', [
            'notificaciones' => $notificaciones,
            'vacante' => $vacante
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\Models\TABLE;
use App\Models\CLIENT;
use App\Models\SERVICE;
use App\Models\RESERVER;
use App\Models\EMPLACEMENT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReserverController extends Controller
{
    public function reserver(Request $request)
    {
        $services = SERVICE::all();
        $emplacements = EMPLACEMENT::all();
        $tables = TABLE::all();
        $reservations = RESERVER::whereDate('DATE_RESERVATION', Carbon::today())->get();
        
        return view('reserver', compact('services', 'emplacements', 'tables', 'reservations'));
    }

    public function create()
    {
        return view('reserver');
    }

    public function getAvailableTables(Request $request)
    {
        $serviceId = $request->input('service');
        $locationId = $request->input('location');
        $nbPlaces = $request->input('covers');
        $date = $request->input('date');

        // Vérification de la date
        if (Carbon::parse($date)->isBefore(Carbon::today())) {
            return response()->json([]);
        }

        $availableTables = TABLE::where('ID_EMPLACEMENT', $locationId)
            ->where('NBPLACE', '>=', $nbPlaces)
            ->whereNotIn('ID_TABLE', function($query) use ($serviceId, $date) {
                $query->select('ID_TABLE')
                    ->from('RESERVER')
                    ->where('ID_SERVICE', $serviceId)
                    ->whereDate('DATE_RESERVATION', $date);
            })
            ->get();

        return response()->json($availableTables);
    }

    public function createReservation(Request $request)
    {
        try {
            // Vérification de la date
            $reservationDate = Carbon::parse($request->date);
            if ($reservationDate->isBefore(Carbon::today())) {
                return redirect()->route('reserver')
                    ->with('error', 'Impossible de réserver une table dans le passé.');
            }

            $reservation = new RESERVER();
            $reservation->ID_TABLE = $request->table;
            $reservation->DATE_RESERVATION = $request->date;
            $reservation->ID_SERVICE = $request->service;
            $reservation->ID_CLIENT = Auth::id();
            $reservation->save();
     
            \Log::info('Nouvelle réservation créée:', [
                'table' => $reservation->ID_TABLE,
                'date' => $reservation->DATE_RESERVATION,
                'service' => $reservation->ID_SERVICE,
                'client' => $reservation->ID_CLIENT
            ]);

            return redirect()->route('reserver')
                ->with('success', 'Votre table a bien été réservée pour le ' . 
                    Carbon::parse($request->date)->format('d/m/Y') . 
                    '. Merci de votre confiance !');

        } catch (\Exception $e) {
            \Log::error('Erreur lors de la réservation:', ['error' => $e->getMessage()]);
            return redirect()->route('reserver')
                ->with('error', 'Une erreur est survenue lors de la réservation. Veuillez réessayer.');
        }
    }
}
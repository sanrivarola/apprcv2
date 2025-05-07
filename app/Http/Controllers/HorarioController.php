<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\User;
use Carbon\Carbon;
use PDF; 

class HorarioController extends Controller
{
    public function index()
    {
        $now   = Carbon::now()->setTimezone('America/Argentina/Buenos_Aires');
        $today = $now->toDateString();

        $row = Horario::with('user')
                      ->where('dia', $today)
                      ->where('user_id', auth()->id())
                      ->latest('created_at')
                      ->first();

        return view('horarios.index', compact('row'));
    }

    public function entrada(Request $request)
    {
        $data = $request->validate([
            'horarioentrada' => 'required|string',
        ]);

        $now = Carbon::now()->setTimezone('America/Argentina/Buenos_Aires');

        Horario::create([
            'dia'            => $now->toDateString(),
            'horarioentrada' => $data['horarioentrada'],
            'horariosalida'  => null,
            'ausente'        => null,
            'user_id'        => auth()->id(),
        ]);

        return redirect()->route('horarios.index')
                         ->with('success', 'Entrada registrada.');
    }

    public function salida(Request $request)
    {
        $data = $request->validate([
            'id_horario'    => 'required|integer|exists:horarios,id_horario',
            'horariosalida' => 'required|string',
        ]);

        $horario = Horario::where('id_horario', $data['id_horario'])
                          ->where('user_id', auth()->id())
                          ->firstOrFail();

        $horario->update([
            'horariosalida' => $data['horariosalida'],
        ]);

        return redirect()->route('horarios.index')
                         ->with('success', 'Salida registrada.');
    }

    public function ausente(Request $request)
    {
        $now   = Carbon::now()->setTimezone('America/Argentina/Buenos_Aires');
        $today = $now->toDateString();

        Horario::create([
            'dia'            => $today,
            'horarioentrada' => null,
            'horariosalida'  => null,
            'ausente'        => 'SI',
            'user_id'        => auth()->id(),
        ]);

        return redirect()->route('horarios.index')
                         ->with('success', 'Has marcado como ausente para hoy.');
    }

    public function edit($id)
    {
        $horario = Horario::where('id_horario', $id)
                          ->where('user_id', auth()->id())
                          ->firstOrFail();

        return view('horarios.edit', compact('horario'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'horarioentrada' => 'required|string',
            'horariosalida'  => 'nullable|string',
        ]);

        $horario = Horario::where('id_horario', $id)
                          ->where('user_id', auth()->id())
                          ->firstOrFail();

        $horario->update($data);

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario actualizado.');
    }

    public function history()
    {
        $registros = Horario::where('user_id', auth()->id())
                             ->orderBy('dia', 'desc')
                             ->paginate(10);

        return view('horarios.history', compact('registros'));
    }
    public function jornales(Request $request)
    {
        $users = User::orderBy('name')->get();

        // Tomar filtros de la request
        $from   = $request->input('from');
        $to     = $request->input('to');
        $userId = $request->input('user_id');

        // Query base
        $query = Horario::with('user')->orderBy('dia', 'desc');

        if ($from) {
            $query->where('dia', '>=', $from);
        }
        if ($to) {
            $query->where('dia', '<=', $to);
        }
        if ($userId) {
            $query->where('user_id', $userId);
        }

        $registros = $query->paginate(15)->withQueryString();

        return view('horarios.jornales', compact('registros', 'users', 'from', 'to', 'userId'));
    }
    public function exportJornales(Request $request)
    {
        // Mismos filtros que en jornales()
        $from   = $request->input('from');
        $to     = $request->input('to');
        $userId = $request->input('user_id');

        $query = Horario::with('user')->orderBy('dia', 'desc');

        if ($from)   $query->where('dia', '>=', $from);
        if ($to)     $query->where('dia', '<=', $to);
        if ($userId) $query->where('user_id', $userId);

        $registros = $query->get();

        // Vista específica para PDF (sin paginación)
        $pdf = PDF::loadView('horarios.jornales_pdf', compact('registros', 'from', 'to', 'userId'));
        $filename = 'jornales_'. now()->format('Ymd_His') .'.pdf';

        return $pdf->download($filename);
    }
}

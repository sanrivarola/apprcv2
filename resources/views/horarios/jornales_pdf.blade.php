<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: sans-serif; }
    table { width: 100%; border-collapse: collapse; margin-top: 1em; }
    th, td { border: 1px solid #ddd; padding: 8px; font-size: 12px; }
    th { background: #f3f4f6; }
  </style>
</head>
<body>
  <h2>Jornales desde {{ $from ?: 'Inicio' }} hasta {{ $to ?: 'Hoy' }}</h2>
  <p>Usuario: {{ $userId ? App\Models\User::find($userId)->name : 'Todos' }}</p>
  <table>
    <thead>
      <tr>
        <th>Fecha</th><th>Usuario</th><th>Entrada</th><th>Salida</th><th>Ausente</th>
      </tr>
    </thead>
    <tbody>
      @foreach($registros as $h)
      <tr>
        <td>{{ $h->dia->format('d-m-Y') }}</td>
        <td>{{ $h->user->name }}</td>
        <td>{{ $h->horarioentrada ?? '—' }}</td>
        <td>{{ $h->horariosalida ?? '—' }}</td>
        <td>{{ $h->ausente === 'SI' ? 'Sí' : 'No' }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>

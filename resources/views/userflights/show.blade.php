@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xs-12 col-md-4">
      <div class="card">
        <div class="card-header flex items-center">
            <div class="flex gap-1">
                {{ __('Detalle de la reserva') }}
            </div>
        </div>

        <div class="card-body flex flex-column items-center gap-1">
          <div class="flex flex-column gap-1">
            <div class="flex justify-content-start gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-exit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M13 12v.01"></path>
                <path d="M3 21h18"></path>
                <path d="M5 21v-16a2 2 0 0 1 2 -2h7.5m2.5 10.5v7.5"></path>
                <path d="M14 7h7m-3 -3l3 3l-3 3"></path>
              </svg>
              {{ __('Ciudad origen: ' . $flight->country_origin) }}
            </div>
            <div class="flex justify-content-start gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-enter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M13 12v.01"></path>
                <path d="M3 21h18"></path>
                <path d="M5 21v-16a2 2 0 0 1 2 -2h6m4 10.5v7.5"></path>
                <path d="M21 7h-7m3 -3l-3 3l3 3"></path>
              </svg>
              {{ __('Ciudad destino: ' . $flight->country_destiny) }}
            </div>
            <div class="flex justify-content-start gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                <path d="M12 7v5l3 3"></path>
              </svg>
              {{ __('Hora de salida: ' . $flight->departure_time) }}
            </div>
            <div class="flex justify-content-start gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                <path d="M12 7v5l3 3"></path>
              </svg>
              {{ __('Hora de llegada: ' . $flight->eta) }}
            </div>
            <div class="flex justify-content-start gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M15 5l0 2"></path>
                <path d="M15 11l0 2"></path>
                <path d="M15 17l0 2"></path>
                <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"></path>
              </svg>
              {{ __('Tickets disponibles: ' . $flight->tickets_available) }}
            </div>
          </div>

          <form class="flex mt-4 gap-1" name="update-user-booking" id="update-user-booking" action="{{ route('vuelos-usuario.update', $flight->pivot->id) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="tickets">Tickets reservados</label>
              <input class="input form-control border border-success" type="number" id="tickets" name="tickets" placeholder="# de tickets" value="{{ $flight->pivot->amount }}">
              {{ $errors->first('tickets') }}
            </div>
            <button class="btn btn-success btn-sm" type="submit">Actualizar</button>
          </form>

          <form class="mt-1" name="delete-user-booking" id="delete-user-booking" action="{{ route('vuelos-usuario.delete', $flight->pivot->id) }}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

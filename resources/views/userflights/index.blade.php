@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($flights) == 0)
        <div class="text-light flex justify-content-center items-center">
            <h1>No tienes reserva. <a href="/vuelos">¡Reserva tu vuelo!</a></h1>
        </div>
    @else
        <div class="row justify-content-center">
            @foreach ($flights as $flight)
                <div class="col-xs-12 col-lg-4 p-1">
                    <div class="card">
                        <div class="card-header flex justify-content-between items-center">
                            <div class="flex gap-1">
                                {{ __($flight->country_origin) }}
                                →
                                {{ __($flight->country_destiny) }}
                            </div>
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 5l0 2"></path>
                                    <path d="M15 11l0 2"></path>
                                    <path d="M15 17l0 2"></path>
                                    <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"></path>
                                </svg>

                                {{ __($flight->pivot->amount) }}
                            </div>
                        </div>

                        <div class="card-body flex flex-column items-center gap-1">
                            <div class="flex justify-content-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plane-departure" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14.639 10.258l4.83 -1.294a2 2 0 1 1 1.035 3.863l-14.489 3.883l-4.45 -5.02l2.897 -.776l2.45 1.414l2.897 -.776l-3.743 -6.244l2.898 -.777l5.675 5.727z"></path>
                                    <path d="M3 21h18"></path>
                                </svg>
                                {{ __($flight->departure_time) }}
                                →
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plane-arrival" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15.157 11.81l4.83 1.295a2 2 0 1 1 -1.036 3.863l-14.489 -3.882l-1.345 -6.572l2.898 .776l1.414 2.45l2.898 .776l-.12 -7.279l2.898 .777l2.052 7.797z"></path>
                                    <path d="M3 21h18"></path>
                                </svg>
                                {{ __($flight->eta) }}
                            </div>
                            <a href="{{ route('vuelos-usuario.show', $flight->pivot->id) }}">Ver detalle</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')
@section('content')
    <section id="about" class="about">
        <div class="container">
            @livewire('update-appointment', ['appointment_id' => $appointment_id])
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-5">
                <livewire:tickets/>
            </div>
            <div class="col-7">
                <livewire:comment/>
            </div>
        </div>
@endsection

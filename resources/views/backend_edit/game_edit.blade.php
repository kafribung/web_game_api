@extends('layouts.master_dash', ['title' => 'Dashboard - Game Edit'])
@section('content')
<div class="app-main__inner" id="app">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>Game edit
                    <div class="page-title-subheading">Edit data game.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Lengkapi data game</h5>
                    <form action="{{ route('game.update', $game->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <x-backend.game_form :game="$game"></x-backend.game_form>
                        <button class="float-right mt-1 btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script_ckeditor')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>
@endpush
@stop
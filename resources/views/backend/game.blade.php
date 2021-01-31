@extends('layouts.master_dash', ['title' => 'Dashboard - Game'])
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Game
                    <div class="page-title-subheading">Menampilkan semua data game.</div>
                </div>
            </div>
        </div>
    </div>
    @if (session('msg'))
    <div class="row">
        <p class="alert alert-success">{{  session('msg') }}</p>
    </div>
    @endif
    <div class="row" id="app">
        @forelse ($games as $game)
        <div class="col-md-6 col-xl-4">
            <div class="mb-3 card card-body">
                <h5 class="card-title">{{ $game->name }}</h5>
                <small>{{ $game->user->name }}</small>
                <img src="{{ $game->takeImg }}" class="card-img-top" alt="Error" height="300"> 
                <p>{!!  Str::limit($game->description, 200)  !!}</p>
                <a href="/game-img/{{ $game->slug }}" class="btn btn-outline-dark mb-1 mt-2"><i class="fa fa-image"></i></a>
                <a href="/qr-code/{{ $game->slug }}" class="btn btn-outline-light mb-1 mt-2"><i class="fa fa-qrcode"></i></a>
                @can('isOwner', $game)
                <a href="{{ route('game.edit', $game->slug) }}" class="btn btn-outline-warning mb-1"><i class="fa fa-edit"></i></a>
                <button ref="delete" v-on:click='deleteGame({{ $game->id }})' class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                @endcan
            </div>
        </div>
        @empty
            <small class="text-info">Data game belum ditambahkan</small>
        @endforelse
    </div>
</div>
@push('script_vue_js_axios_sweet')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            methods: {
                deleteGame(id) {
                    swal({
                        title: "Apakah kamu yakin?",
                            text: "Setelah dihapus, Anda tidak akan dapat memulihkan file  ini!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                                swal("File berhasil dihapus!", {
                                    icon: "success",
                                });
                                axios
                                    .delete(`/game/${id}`)
                                    .then((response) => {
                                    this.$refs.deleteAdmin.parentNode.parentNode.remove();
                                    location.reload();
                                    });
                            } else {
                                swal("File gagal dihapus!");
                            }
                        });
                }
            },
        })
    </script>
@endpush
@endsection
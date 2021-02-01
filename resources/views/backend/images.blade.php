@extends('layouts.master_dash', ['title' => 'Dashboard - Karya Peserta'])
@section('content')
<div class="app-main__inner" id="app">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-add-user icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>Karya Peserta
                    <div class="page-title-subheading">Kelola data karya peserta.</div>
                </div>
            </div>
        </div>
    </div>
    @if (session('msg'))
    <div class="row">
        <p class="alert alert-success">{{  session('msg') }}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Karya Peserta {{ $participant->name }}</h5>
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $angkaAwal = 1
                        @endphp
                        @forelse ($participant->images as $image)
                        <tr>
                            <th scope="row">{{ $angkaAwal++ }}</th>
                            <td><img src="{{  $image->takeImg }}" alt="Error" height="200" width="200"> </td>
                            <td>
                                @if (Auth::user()->king())
                                <button ref="deleteImage" v-on:click="deleteImage({{ $image->id }})" class="btn btn-danger btn-sm d-inline-block"><i class="fa fa-trash"></i></button>
                                @endif
                            </td>
                        </tr>    
                        @empty
                        <tr>
                            <td colspan="12"><h5>Data karya peserta belum ada</h5></td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Delete belu diataur --}}
@push('script_vue_js_axios_sweet')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            methods: {
                deleteImage(id) {
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
                                    .delete('/image/' + id)
                                    .then((response) => {
                                    this.$refs.deleteImage.parentNode.parentNode.remove()
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
@stop
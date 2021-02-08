@extends('layouts.master_dash', ['title' => 'Dashboard - Peserta'])
@section('content')
<div class="app-main__inner" id="app">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-add-user icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>Peserta
                    <div class="page-title-subheading">Kelola data peserta.</div>
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
                    <h5 class="card-title">Data peserta (Yang Telah Regis: {{ $participantFix }} Orang)</h5>
                    @if (Auth::user()->king())
                    <a href="/participant/export" class="btn btn-success btn-sm float-right"><i class="fa fa-file-excel">Export Excel</i></a>
                    @endif
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Hp</th>
                            <th>Fungsi</th>
                            <th class="bg-success">Lucky Spin</th>
                            <th class="bg-success">Time1</th>
                            <th class="bg-heavy-rain">I Found</th>
                            <th class="bg-heavy-rain">Time2</th>
                            <th class="bg-success">Jigsaw Pzl</th>
                            <th class="bg-success">Time3</th>
                            <th class="bg-heavy-rain">Teka Teki</th>
                            <th class="bg-heavy-rain">Time4</th>
                            <th class="bg-success">CLSR</th>
                            <th class="bg-success">Time5</th>
                            <th class="bg-heavy-rain">Scrrabbel Me</th>
                            <th class="bg-heavy-rain">Time6</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $angkaAwal = 1
                        @endphp
                        @forelse ($participants as $participant)
                        <tr>
                            <th scope="row">{{ $angkaAwal++ }}</th>
                            <td>{{ empty($participant->name) ? '-' :  $participant->name  }}</td>
                            <td>{{ empty($participant->hp) ? '-' : $participant->hp  }}</td>
                            <td>{{ \App\Models\Position::where('id', $participant->position_id)->first()->name }}</td>
                            <td class="bg-light">{{ $stage1 = $participant->stage1 }}</td>
                            <td class="bg-light">{{ round($participant->time1 / 60) }} menit</td>
                            <td>{{ $stage2 = $participant->stage2 }}</td>
                            <td>{{ round($participant->time2 / 60) }} menit</td>
                            <td class="bg-light">{{ $stage3 = $participant->stage3 }}</td>
                            <td class="bg-light">{{ round($participant->time3 / 60 ) }} menit</td>
                            <td>{{ $stage4 = $participant->stage4 }}</td>
                            <td>{{ round($participant->time4 / 60) }} menit</td>
                            <td class="bg-light">{{ $stage5 = $participant->stage5 }}</td>
                            <td class="bg-light">{{ round($participant->time5 / 60) }} menit</td>
                            <td>{{ $stage6 = $participant->stage6 }}</td>
                            <td>{{ round($participant->time6 / 60) }} menit</td>
                            <td>{{ $participant->total  }}</td>
                            <td>
                                <a href="/image/{{ $participant->id }}" class="btn btn-info btn-sm"><i class="fa fa-images"></i></a>
                                @if (Auth::user()->king())
                                <a href="/qr-code/{{ $participant->id }}" class="btn btn-dark btn-sm"><i class="fa fa-qrcode"></i></a>
                                <button ref="deleteParticipant" v-on:click="deleteParticipant({{ $participant->id }})" class="btn btn-danger btn-sm d-inline-block"><i class="fa fa-trash"></i></button>
                                @endif
                            </td>
                        </tr>    
                        @empty
                        <tr>
                            <td colspan="24"><h5>Data peserta belum ditambahkan</h5></td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $participants->links() }}
                    </div>
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
                deleteParticipant(id) {
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
                                    .delete('/participant/' + id)
                                    .then((response) => {
                                    this.$refs.deleteParticipant.parentNode.parentNode.remove();
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
@stop
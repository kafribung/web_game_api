@extends('layouts.master_dash')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>My Dashboard
                    <div class="page-title-subheading">Berisi informasi mengenai games</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Admin</div>
                        <div class="widget-subheading">jumlah admin</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $admin }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Game</div>
                        <div class="widget-subheading">jumlah wisata</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $game }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-4">
            <div class="card mb-3 widget-content bg-asteroid">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Peserta</div>
                        <div class="widget-subheading">jumlah peserta</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $participant }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-12">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer justify-content-center">
                    <div class="widget-content-wrapper justify-content-center">
                        <h3>Selamat datang {{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body justify-content-center text-center">
                        <p>Selalu jujur dan berbuat baik kepada sesama</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
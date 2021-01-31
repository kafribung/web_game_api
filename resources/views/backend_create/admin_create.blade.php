@extends('layouts.master_dash', ['title' => 'Dashboard - Admin Create'])
@section('content')
<div class="app-main__inner" id="app">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>Admin Create
                    <div class="page-title-subheading">Tambah data admin.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Lengkapi data admin</h5>
                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-backend.admin_form :admin="new App\Models\User"></x-backend.admin_form>
                        <button class="float-right mt-1 btn btn-primary">Store</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @can('admin-only')
                            <div class="alert alert-dark" role="alert">
                                管理者のみに表示
                            </div>
                        @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

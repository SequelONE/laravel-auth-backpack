@extends('layouts.app')
@section('content')

    <script src="{{ asset('js/custom.js') }}" defer></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Users</div>
                    <div class="card-body">
                        <div class="row pl-5">
                            @include('userList', ['users' => $users])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

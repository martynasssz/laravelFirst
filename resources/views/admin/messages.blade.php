@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Messages</div>

                    <div class="card-body">
                        Messages.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

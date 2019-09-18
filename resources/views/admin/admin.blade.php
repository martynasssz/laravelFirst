@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Adverts</div>

                    <div class="card-body">
                        Admin's dashboard.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}

{{--                @role('admin')--}}
{{--                {{'adminas'}}--}}
{{--                @endrole--}}

{{--                @role('user')--}}
{{--                {{'user'}}--}}
{{--                @endrole--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategorijos</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">SubCategory</th>

                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            @foreach($categories as $cat)
                            <tr>
                                    <td> {{$cat->title}}</td>

                            </tr>
                            @endforeach

                            @foreach($subcategories as $subcat)
                                <tr>
                                    <td> {{$subcat->title}}</td>
                                </tr>
                            @endforeach
                                <


                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
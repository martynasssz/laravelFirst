@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategorijos</div>
                    <div class="card">
                        <div class="card-header">Kategorijų kūrimas</div>

                        <div class="card-body">

                            <form method="POST" action="{{route('categories.store')}}">
                                @csrf
                                <div class="form-group">
                                <input class="form-control mt-2" type="text" name="title" placeholder="Pavadinimas">
                                </div>

                                <div class="form-group">
                                <select class="form-control" name="parent_id">

                                    <option value="0">-------</option>
                                    @foreach($categories_create as $cat_create)
                                        <option value="{{$cat_create->id}}">{{$cat_create->title}}</option>
                                    @endforeach

                                </select>
                                </div>
                                <button class="btn alert-success mt-2"> Create</button>
                            </form>

                        </div>
                    </div>
{{--                --- Kategorijos kurimo pabaiga------}}
                    <div class="card-body">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th><input type="checkbox" id="checkall"></th>
                            <th>Category/SubCategory</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </thead>
                            <tbody>
                            @foreach($categories as $cat)
                                <tr>
                                    <td><input type="checkbox" class="checkthis"></td>
                                    <td>{{$cat->title}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{route('categories.edit',$cat->id)}}"> Edit </a>
                                    </td>
                                    <td>
{{--                                        <form method="post" action="{{route('cities.destroy', $city->id)}}">--}}
{{--                                            @method('DELETE')--}}
{{--                                            @csrf--}}
{{--                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>--}}
{{--                                        </form>--}}

                                    </td>
                                </tr>
                            @endforeach
                            @foreach($subcategories as $SubCategory)
                                <tr>
                                    <td><input type="checkbox" class="checkthis"></td>
                                    <td style="padding-left: 30px" >/{{$SubCategory->title}}</td>
                                    <td>
{{--                                        <a class="btn btn-primary btn-sm" href="{{route('cities.edit',$city->id)}}"> Edit </a>--}}
                                    </td>
                                    <td>
{{--                                        <form method="post" action="{{route('cities.destroy', $city->id)}}">--}}
{{--                                            @method('DELETE')--}}
{{--                                            @csrf--}}
{{--                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>--}}
{{--                                        </form>--}}

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>


{{--                        <table class="table">--}}
{{--                            <tr>--}}
{{--                                <th scope="col">Category/SubCategory</th>--}}
{{--                                <th scope="col">Edit</th>--}}
{{--                                <th scope="col">Delete</th>--}}
{{--                            </tr>--}}
{{--                            @foreach($categories as $cat)--}}
{{--                                <tr>--}}
{{--                                    <td> {{$cat->title}}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            @foreach($subcategories as $subcat)--}}
{{--                                <tr>--}}
{{--                                    <td style="padding-left: 30px"> /{{$subcat->title}}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            <--}}


{{--                        </table>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
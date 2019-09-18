@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Skelbimai</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('advert.update', $advert->id)}}">
                            @method('PUT')
                            @csrf
                                 <div class="form-group">
                                     <input class="form-control" type="text" name="title" placeholder="Pavadinimas"
                                            value="{{$advert->title}}">
                                 </div>
                                 <div class="form-group">
                                     <textarea class="form-control" name="content_text" rows="5"
                                      placeholder="Skelbimas"> {{$advert->content}}</textarea>
                                 </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="image" placeholder="Paveiksliukas"
                                           value="{{$advert->image}}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="price" placeholder="Kaina"
                                           value="{{$advert->price}}">
                                </div>
                                <div class="form-group">
                                    <select name="category_id">
                                        <option disabled> Pasirinkti kategorija</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}"> {{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="attribute_set">
                                        @foreach($attribute_sets as $attributeSet)
                                            <option @if($attributeSet->id ==$advert->attribute_set_id)
                                                    selected
                                                    @endif
                                                    value="{{$attributeSet->id}}">{{$attributeSet->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group">
                                @foreach ($attributes as $attribute)

{{--                                    <label for="exampleFormControlSelect1">{{ucfirst($attribute->attributes->name)}}</label>--}}
{{--                                    <input type="text" name="{{$attribute->attributes->name}}">--}}
{{--                                           placeholder="{{strtoupper($attribute->attributes->name)}}">--}}
                                   <input type="{{$attribute->attributes->type->name}}"
                                    name="super_attributes_{{$attribute->attributes->name}}"
                                    placeholder="{{$attribute->attributes->label}}">
                                @endforeach
                            </div>

                            <button class="btn btn-info"> Redaguoti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
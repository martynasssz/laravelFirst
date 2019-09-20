@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$advert->title}}</div>

                    <div class="card-body">
                        <div class="alert"> Kategorija: {{$advert->category->title}}    </div>
                        <img class="img-fluid" src="{{$advert->image}}" alt="Italian Trulli">
                        {{$advert->content}}
                        <div class="card-columns mt-4">Kaina: {{ $advert->price}} €</div>

                    </div>
                    <div class="card-body">
                    Atribute Set: {{$advert->attributeSet->name}}


                        @foreach ($attributeValues as $attributeValue)
                            <div class="font-weight-bold"> {{$attributeValue->values->label}}</div>
                            <div class="tm-2">  {{$attributeValue->value}}  </div>

                        @endforeach
                    </div>
                    <div>
                    <form method="post" action="{{route('advert.destroy', ['id' => $advert->id])}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-dark float-right btn-sm">Delete</button>
                    </form>

                    <form>
                        <button class="btn btn-dark float-right btn-sm"
                                formaction="{{route('advert.edit', $advert->id)}}">Edit
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                @foreach($comments as $comment)
                    <div class="card mt-2">
                        <div class="d-flex justify-content-between p-2 card-header">
                            <h6>{{$comment->user->name}} </h6>
                            <h6>
                                <small>{{$comment->created_at}}</small>
                            </h6>

                            <form method="post" action="{{route('comment.destroy', $comment->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-dark float-right btn-sm">Delete</button>
                            </form>
                        </div>


                        <div class="p-2">{{ $comment->content}}</div>
                    </div>
                @endforeach
            </div>

            <div class="card-body col-md-8">
                <form method="post" action="{{route('comment.store')}}">
                    @csrf
                    @role('admin|user')
                    <textarea name="content_text" type="text" class="form-control mt-2"
                              placeholder="Palikite komentarą"></textarea>

                    <input type="hidden" value="{{$advert->id}}" name="advertId">
                    {{--                    <input type="hidden" value="{{$advert->user_id}}" name="userId">--}}

                    <button class="btn btn-outline-secondary mt-2">Komentuoti</button>
                    @else <b>{{'Norėdami komentuoti turite prisijungti'}} </b>
                    @endrole
                </form>
            </div>
        </div>

    </div>
@endsection

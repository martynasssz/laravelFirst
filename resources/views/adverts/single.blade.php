@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold h5">{{$advert->title}}</div>
                    <div class="card-body">
                        <div class="alert h5 pl-0 pb-0 pt-0 font-weight-bold"> {{$advert->category->title}}    </div>
                        <img class="img-fluid h5" src="{{$advert->image}}" alt="Italian Trulli">
                        <div class="h5">{{$advert->content}}</div>
                        <div class="card-columns mt-5 h5">
                            <span class="font-weight-bold"> Kaina:</span> {{ $advert->price}} €
                        </div>
                    </div>
                    <div class="text-center font-weight-bold h5 "> Papildoma informacija</div>
                    <div class="card-body">
                        <table>
                            <tbody>
                            <tr>
                                <th class=" font-weight-bold border-bottom h6">Vieta:</th>
                                <td class="pl-3 border-bottom h6">{{$advert->city->name}}</td>
                            </tr>
{{--                            <tr>--}}
{{--                                <th class="font1 border-bottom"> Nekilnojamojo turto parametrai:</th>--}}
{{--                                <td class="pl-3 font-weight-bold  border-bottom">{{$advert->attributeSet->name}}</td>--}}
{{--                            </tr>--}}
{{--                            @foreach ($attributeValues as $attributeValue)--}}
{{--                                <div class="font-weight-bold"> {{$attributeValue->values->label}}</div>--}}
{{--                                <div class="tm-2">  {{$attributeValue->value}}  </div>--}}
{{--                            @endforeach--}}
                            </tbody>
                        </table>
                    </div>

                    @role('user|admin')
                    @if ($advert->user_id == Auth::user()->id || Auth::user()->id == $advert->user_id)
                        <div>
                            <form method="post" action="{{route('advert.destroy', ['id' => $advert->id])}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary float-right btn-sm">Trinti</button>
                            </form>
                            <form>
                                <button class="btn btn-outline-secondary float-right btn-sm"
                                        formaction="{{route('advert.edit', $advert->id)}}">Redaguoti
                                </button>
                            </form>
                        </div>
                    @endif
                    @endrole
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
                            @role('admin|user')
                            @if (($advert->user_id == Auth::user()->id|| Auth::user()->id == $comment->user_id))
                                <form method="post" action="{{route('comment.destroy', $comment->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary float-right btn-sm">Delete</button>
                                </form>
                            @endif
                            @endrole
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

                    <button class="btn btn-secondary mt-2">Komentuoti</button>
                    @else <b>{{'Norėdami komentuoti turite prisijungti'}} </b>
                    @endrole
                </form>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Patvirtinkite savo el. pašto adresą') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Nauja patvirtinimo nuoroda bus atsiųsta jūsų nurodytu el. pašto adresu.') }}
                        </div>
                    @endif

                    {{ __('Prieš pradedant, patikrinkite ar teisingas el. adresas į kurį bus siunčiama priminimo nuoroda.') }}
                    {{ __('Jei negaunate el. laiško') }}, <a href="{{ route('verification.resend') }}">{{ __('paspauskite čia pakartotiniam gavimui') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

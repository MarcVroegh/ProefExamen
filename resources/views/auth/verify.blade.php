@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifeer jou email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Er is een nieuwe verifeer link naar jou email gestuurd, controleer ook je spam box') }}
                        </div>
                    @endif

                    {{ __('Voordat je verder gaat, controleer je mail voor een verificatie link') }}
                    {{ __('Als je de mail niet hebt gehad') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Druk je hier om een andere aan te vragen') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

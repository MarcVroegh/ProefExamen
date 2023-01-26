@extends('layouts.app')
@section('content')
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                    </div>
                @endif
                <body>
                <div style="margin-top: -25px;" class="text-center container-fullwidth border shadow-sm bg-white pt-5 pb-5 pl-5 pr-5">
                  <h1 style="font-size: 20px;">Reserveringen</h1>
                  <div style="width: 90%; margin-left: 5%; margin-right: 5%;" class="text-center container-inner border shadow-sm bg-white pt-4 pb-4 pl-1 pr-1">
                    <a>Recente openstaande reserveringen</a><br>
                    <div class="row justify-content-center">
                      <div class="col-auto">
                        <table class="table table-responsive">
                        <tr>
                          <td>Wie</td>
                          <td>Wanneer</td>
                          <td>Hoeveel</td>
                          <td> </td>
                        </tr>
                        @foreach ($AllReserveringenOpenstaand as $res)
                        <tr>
                          <td>{{ $res->gast }}</td>
                          <td>{{ $res->wanneer }}</td>
                          <td>{{ $res->hoeveel }}</td>
                          <td><form method="post" action="{{ route('opstel') }}" accept-charset="UTF-8">{{ csrf_field() }}<input type="hidden" name="id" value="{{$res->id}}"><button type="submit" class="btn btn-primary btn-lg px-2 gap-2">Rekening opstellen</button></form></td>
                        </tr>
                        @endforeach
                        </table>
                    </div>
                    </div>
                    <a>Recente afgerekende reserveringen</a>
                    <div class="row justify-content-center">
                      <div class="col-auto">
                        <table class="table table-responsive">
                        <tr>
                          <td>Wie</td>
                          <td>Wanneer</td>
                          <td>Hoeveel</td>
                          <td> </td>
                        </tr>
                        @foreach ($AllReserveringenAfgerekend as $res)
                        <tr>
                          <td>{{ $res->gast }}</td>
                          <td>{{ $res->wanneer }}</td>
                          <td>{{ $res->hoeveel }}</td>
                          <td><form method="post" action="{{ route('opstel.show') }}" accept-charset="UTF-8">{{ csrf_field() }}<input type="hidden" name="id" value="{{$res->id}}"><button type="submit" class="btn btn-primary btn-lg px-2 gap-2">Rekening inzien</button></form></td>
                        </tr>
                        @endforeach
                        </table>
                    </div>
                    </div>
                    </div>
                  </div>
            </div>
@endsection

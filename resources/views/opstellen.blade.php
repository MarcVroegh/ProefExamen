@extends('layouts.app')
@section('content')
  @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
        <body>
          <div style="margin-top: -25px;" class="text-center container-fullwidth border shadow-sm bg-white pt-5 pb-5 pl-5 pr-5">
            <h1 style="font-size: 20px;">Rekening opstellen</h1>
               <div style="width: 90%; margin-left: 5%; margin-right: 5%;" class="text-center container-inner border shadow-sm bg-white pt-4 pb-4 pl-1 pr-1">
                <div class=" text-center">
                  <div class="col-lg-6 mx-auto">
                  <?php  if (isset($succes)) { echo $succes; } $new = $id; ?>
                   <form method="post" action="{{ route('opstel.opstellen') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <input type="text" name="naam" placeholder="Welk gerecht?"><br>
                    <input type="text" name="hoeveel" placeholder="Hoeveel is er besteld?"><br>
                    <input type="text" name="prijs" placeholder="Prijs van recept?"><br>
                    <input type="hidden" name="id" value="{{ $new }}"><br>
                     <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg px-4 gap-3">Toevoegen aan rekening</button>
                     </div>
                     </div>
                     </div>
                   </form>
                   <form method="post" action="{{ route('opstel.afrekenen') }}" accept-charset="UTF-8">
                   {{ csrf_field() }}
                   <input type="hidden" name="id" value="{{ $new }}"><br>
                   <button type="submit" name="submit" class="btn btn-primary btn-lg px-4 gap-3">Printen rekening</button>
                   </form>
                   </div>
          </div>
@endsection
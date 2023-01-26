@extends('layouts.app')
@section('content')
  @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
        <body>
          <div style="margin-top: -25px;" class="text-center container-fullwidth border shadow-sm bg-white pt-5 pb-5 pl-5 pr-5">
            <h1 style="font-size: 20px;">Printen rekening</h1>
               <div style="width: 90%; margin-left: 5%; margin-right: 5%;" class="text-center container-inner border shadow-sm bg-white pt-4 pb-4 pl-1 pr-1">
               <?php if(empty($opstellen[0]->hoeveel)) {
                echo 'Voor de veiligheid kan je deze rekening niet (meer) inzien';
               } ?>
               <?php
                $TotaalPrijsArray = array();
                foreach ($opstellen as $new) {
                  $hoeveel = intval( $new->hoeveel );
                  $prijs = floatval( $new->prijs );
                  $total = $prijs * $hoeveel;
                  array_push($TotaalPrijsArray, $total);
               }
               $TotaalPrijs = array_sum($TotaalPrijsArray);
               ?>
                    <div class="row justify-content-center">
                      <div class="col-auto">
                        <table class="table table-responsive">
                        <tr>
                          <td>Naam recept</td>
                          <td>Hoeveel</td>
                          <td>prijs</td>
                        </tr>
                        @foreach ($opstellen as $res)
                        <tr>
                          <td>{{ $res->naam }}</td>
                          <td>{{ $res->hoeveel }}</td>
                          <td>{{ $res->prijs }}</td>
                        </tr>
                        @endforeach
                        </table>
                        <a> Totaalprijs: <?php echo $TotaalPrijs  ?> euro </a>
                    </div>
                    </div>
          </div>
@endsection
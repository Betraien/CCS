@extends('layouts.app')
@extends('layouts.nav')
@section('content')

<div class="text-center" >
@if(request()['success'] != null && request()['success'] == false)
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Something went wrong, </strong> {{ strtolower(request()['message']) }}
  </div>
@elseif(request()['success'] != null && request()['success'] == true)
<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Well done!</strong> {{ strtolower(request()['message']) }}
  </div>
@endif
</div>

<div class="card text-center" >
    <div class="card-header" >
        <h2>Search Results:</h2>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Logo</th>
                <th scope="col">Title</th>
                <th scope="col">Identification Token</th>
                <th scope="col">Status</th>
                <th scope="col">Website</th>
                
              </tr>
            </thead>
            <tbody>
            <?php
             for($i = 0 ; $i < sizeof($data) ; $i++){

                if ($i % 2 == 0 ){?>

                        <tr>
                                <td><img src="{{ asset($data[$i]['logo']) }}" width="50px" height="50px"></td>
                                <th scope="row"><a href={{ route('viewThirdParty', $data[$i]['id']) }}>{{ $data[$i]['title'] }}</a></th>
                                <td>{{ $data[$i]['id_token'] }}</td>
                                <td>{{ $data[$i]->status['status'] }}</td>
                                <td>{{ $data[$i]['website'] }}</td>

                            </tr>

                    <?php  } else{ ?>

                        <tr class="table-active">
                                <td><img src="{{ asset($data[$i]['logo']) }}" width="50px" height="50px"></td>
                                <th scope="row"><a href={{ route('viewThirdParty', $data[$i]['id']) }}>{{ $data[$i]['title'] }}</a></th>
                                <td>{{ $data[$i]['id_token'] }}</td>
                                <td>{{ $data[$i]->status['status'] }}</td>
                                <td>{{ $data[$i]['website'] }}</td>
                            </tr>


                    <?php  } ?>
                </tbody>



         <?php } ?>
        </table>

    </div>
  </div>

@endsection

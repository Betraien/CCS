@extends('layouts.app')

@section('content')

<div></div>

<div class="card text-center" >
    <div class="card-header" >
        <h2>Third Parties</h2>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Identification Token</th>
                <th scope="col">Status</th>
                <th scope="col">Website</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
             for($i = 0 ; $i < sizeof($data) ; $i++){ 
               
                if ($i % 2 == 0 ){?>
    
                        <tr>
                                <th scope="row"><a href={{ route('viewThirdParty', $data[$i]['id']) }}>{{ $data[$i]['title'] }}</a></th>
                                <td>{{ $data[$i]['id_token'] }}</td>
                                <td>{{ $data[$i]->status['status'] }}</td>
                                <td>{{ $data[$i]['website'] }}</td>
                                <td><a style = "border-radius: 5px;" href={{ route('update_interface', $data[$i]['id']) }} type="button" class="btn btn-primary">Edit</a></td>
                                <td><a style = "border-radius: 5px;" href={{ route('delete', $data[$i]['id']) }} type="button" class="btn btn-danger">Delete</a></td>
                            
                            </tr>
                    
                    <?php  } else{ ?>

                        <tr class="table-active">
                                <th scope="row"><a href={{ route('viewThirdParty', $data[$i]['id']) }}>{{ $data[$i]['title'] }}</a></th>
                                <td>{{ $data[$i]['id_token'] }}</td>
                                <td>{{ $data[$i]->status['status'] }}</td>
                                <td>{{ $data[$i]['website'] }}</td>
                                <td><a href={{ route('update_interface', $data[$i]['id']) }} type="button" class="btn btn-primary">Edit</a></td>
                                <td><a href={{ route('delete', $data[$i]['id']) }} type="button" class="btn btn-danger">Delete</a></td>
                            </tr>
                    
 
                    <?php  } ?>
                </tbody>

          
          
         <?php } ?> 
        </table>  

    </div>
  </div>

@endsection
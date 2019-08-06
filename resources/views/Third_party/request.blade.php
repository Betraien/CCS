@extends('layouts.app')

@section('content')

<div></div>

<div class="card text-center" >
    <div class="card-header" >
        <h2>Third Parties Requests</h2>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Website</th>
                <th scope="col">Contact Person</th>
                <th scope="col">Contact Phone</th>
                <th scope="col">contact_email</th>
              </tr>
            </thead>
            <tbody>
            <?php
             for($i = 0 ; $i < sizeof($data) ; $i++){

                if ($i % 2 == 0 ){?>

                        <tr>
                                <td>{{ $data[$i]['third_party_title'] }}</td>
                                <td>{{ $data[$i]['description'] }}</td>
                                <td>{{ $data[$i]['website'] }}</td>
                                <td>{{ $data[$i]['contact_person'] }}</td>
                                <td>{{ $data[$i]['contact_phone'] }}</td>
                                <td>{{ $data[$i]['contact_email'] }}</td>
                                <td><a style = "border-radius: 5px;" href={{ route('update_interface', $data[$i]['id']) }} type="button" class="btn btn-primary">Accept</a></td>
                                <td><a style = "border-radius: 5px;" href={{ route('reject', $data[$i]['id']) }} type="button" class="btn btn-danger">Reject</a></td>

                            </tr>

                    <?php  } else{ ?>

                        <tr class="table-active">
                          <td>{{ $data[$i]['third_party_title'] }}</td>
                          <td>{{ $data[$i]['description'] }}</td>
                          <td>{{ $data[$i]['website'] }}</td>
                          <td>{{ $data[$i]['contact_person'] }}</td>
                          <td>{{ $data[$i]['contact_phone'] }}</td>
                          <td>{{ $data[$i]['contact_email'] }}</td>
                                <td><a href={{ route('update_interface', $data[$i]['id']) }} type="button" class="btn btn-primary">Edit</a></td>
                                <td><a href={{ route('reject', $data[$i]['id']) }} type="button" class="btn btn-danger">Delete</a></td>
                            </tr>


                    <?php  } ?>
                </tbody>



         <?php } ?>
        </table>

    </div>
  </div>

@endsection

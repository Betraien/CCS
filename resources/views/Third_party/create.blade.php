@extends('layouts.app')

@section('content')

<div class="card" >
    <div class="card-header text-center" >
        <h2> Create Third Parties</h2>
    </div>
    <div class="card-body">

<form method="post" action={{ route('create') }} enctype="multipart/form-data">
        <fieldset>
          <div class="form-group">
            <label >Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label >description</label>
            <input type="text" name="description" class="form-control" placeholder="Enter description">
          </div>
          <div class="form-group">
            <label >position</label>
            <input type="text" name="position" class="form-control" placeholder="Enter position">
          </div>
          <div class="form-group">
            <label>public</label>
            <select class="form-control" id="public" name="public">

               
                <option name="public" value="0">No</option>
                <option name="public" value="1">Yes</option>
                

            </select>
          </div>
          <div class="form-group">
                <label >Identification Token</label>
                <input type="text" name="id_token" class="form-control" placeholder="Enter Identification Token">
              </div>
        <div class="form-group">
                <label >order</label>
                <input type="text" name="view_order" class="form-control" placeholder="Enter view order">
                </div>
        <div class="form-group">
                <label >contact person name</label>
                <input type="text" name="contact_person" class="form-control" placeholder="Enter name">
                </div>
        <div class="form-group">
                <label>contact person number</label>
                <input type="text" name="contact_phone" class="form-control" placeholder="Enter number">
                </div>
        <div class="form-group">
                <label >contact person email</label>
                <input type="text" name="contact_email" class="form-control" placeholder="Enter email">
                </div>
        <div class="form-group">
                <label >website</label>
                <input type="text" name="website" class="form-control" placeholder="Enter email">
                </div>


                <div class="form-group">
                    <label>status</label>
                    <select class="form-control" id="status" name="status_id">

                        @foreach ($status as $row)
                        <option name={{ $row->status }} value={{ $row->id }}>{{ $row->status }}</option>
                        @endforeach

                    </select>
                  </div>
                  <div class="form-group">
                    <label>type</label>
                    <select class="form-control" id="status" name="third_party_type_id">

                        @foreach ($third_party_types as $row)
                        <option name={{ $row->type }} value={{ $row->id }}>{{ $row->type }}</option>
                        @endforeach

                     </select>
                  </div>

          <div class="form-group">
            <label >Configration info</label>
            <textarea class="form-control" id="config" rows="10" name="config"></textarea>
          </div>
          <div class="form-group">
            <label>Logo</label>
            <input type="file" id="Logo" name="logo">
           </div>
          <fieldset class="form-group">
              <button type="submit" class="btn btn-primary" style="float: right ; margin-right:4%; width:120px">Submit</button>
            </fieldset>
      </form>
    </div>
  </div>
@endsection

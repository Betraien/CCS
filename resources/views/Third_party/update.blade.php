@extends('layouts.app')
 
@section('content')
<form method="post" action={{ route('update', $tp[0]['id']) }} enctype="multipart/form-data">
        <fieldset>
          <legend>Edit Third Party</legend>
          <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value={{ $tp[0]['title'] }} >
            </div>
            <div class="form-group">
                <label>description</label>
                <input type="text" name="description" class="form-control" value={{ $tp[0]['description'] }} >
            </div>
            <div class="form-group">
                <label>position</label>
                <input type="text" name="position" class="form-control" value={{ $tp[0]['position'] }} >
            </div>
            <div class="form-group">
                <label>public</label>
                <input type="text" name="public" class="form-control" value={{ $tp[0]['public'] }} >
            </div>
            <div class="form-group">
                <label>Identification Token</label>
                <input type="text" name="id_token" class="form-control" value={{ $tp[0]['id_token'] }} >
            </div>
            <div class="form-group">
                <label>order</label>
                <input type="text" name="view_order" class="form-control" value={{ $tp[0]['view_order'] }}  >
            </div>
            <div class="form-group">
                <label>contact person name</label>
                <input type="text" name="contact_person" class="form-control" value={{ $tp[0]['contact_person'] }} >
            </div>
            <div class="form-group">
                <label>contact person number</label>
                <input type="text" name="contact_phone" class="form-control" value={{ $tp[0]['contact_phone'] }} >
            </div>
            <div class="form-group">
                <label>contact person email</label>
                <input type="text" name="contact_email" class="form-control" value={{ $tp[0]['contact_email'] }} >
            </div>
            <div class="form-group">
                <label>website</label>
                <input type="text" name="website" class="form-control" value={{ $tp[0]['contact_person'] }} >
            </div>

          <div class="form-group">
                <label>status</label>
                <select class="form-control" id="status" name="status_id">

                    @foreach ($status as $row)
                    @if($row['id'] == $tp[0]['status_id'])
                    <option name={{ $row->status }} value={{ $row->id }} selected="selected">{{ $row->status }}</option>
                    @else
                    <option name={{ $row->status }} value={{ $row->id }}>{{ $row->status }}</option>
                    @endif
                    @endforeach

                </select>
              </div>
              <div class="form-group">
                <label>type</label>
                <select class="form-control" id="status" name="third_party_type_id">

                    @foreach ($third_party_types as $row)
                    @if($row['id'] == $tp[0]['third_party_type_id'])
                    <option name={{ $row->type }} value={{ $row->id }} selected="selected">{{ $row->type }}</option>
                    @else
                    <option name={{ $row->type }} value={{ $row->id }}>{{ $row->type }}</option>
                    @endif
                    @endforeach
                 </select>
              </div>
              <div class="form-group">
                    <label>Configration info</label>
                    <textarea class="form-control" id="config" rows="10" name="config" >{{ $tp[0]['config'] }}</textarea>
                </div>
          <div class="form-group">
            <label>Logo</label>
            <input type="file" class="form-control-file" id="Logo" aria-describedby="fileHelp" name="logo">
            <small id="fileHelp" class="form-text text-muted"></small>
          </div>
          <fieldset class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
      </form>
@endsection
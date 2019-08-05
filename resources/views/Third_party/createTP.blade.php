@extends('layouts.app')

@section('content')
<form method="POST" action="/GitHub/CCS/public/ThirdParty/create">
        <fieldset>
          <legend>Create Third Party</legend>
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
            <label >public</label>
            <input type="text" name="public" class="form-control" placeholder="is the third party public?">
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
                <label >status</label>
                <select class="form-control" id="status" name="status_id">
                  <option name="Active" value=1>Active</option>
                  <option name="Pending" value=2>Pending</option>
                </select>
              </div>
              <div class="form-group">
                <label >type</label>
                <select class="form-control" id="status" name="type_id">
                  <option name="type1" value=1>type1</option>
                  <option name="type2" value=2>type2</option>
                  <option>...</option>
                </select>
              </div>
          <div class="form-group">
            <label >Configration info</label>
            <textarea class="form-control" id="config" rows="10" name="config"></textarea>
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
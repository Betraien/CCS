@extends('layouts.app')

@section('content')
<fieldset>
    <legend>View Third Party</legend>
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="{{ $tp[0]['title'] }}" disabled>
    </div>
    <div class="form-group">
        <label>description</label>
        <textarea type="textarea" rows="4" name="description" class="form-control"  placeholder="{{ $tp[0]['description'] }}" disabled></textarea>
    </div>
    <div class="form-group">
        <label>position</label>
        <input type="text" name="position" class="form-control" placeholder="{{ $tp[0]['position'] }}" disabled>
    </div>
    <div class="form-group">
        <label>public</label>
        <input type="text" name="public" class="form-control" placeholder="{{ $tp[0]['public'] }}" disabled>
    </div>
    <div class="form-group">
        <label>Identification Token</label>
        <input type="text" name="id_token" class="form-control" placeholder="{{ $tp[0]['id_token'] }}" disabled>
    </div>
    <div class="form-group">
        <label>order</label>
        <input type="text" name="view_order" class="form-control" placeholder="{{ $tp[0]['view_order'] }}"  disabled>
    </div>
    <div class="form-group">
        <label>contact person name</label>
        <input type="text" name="contact_person" class="form-control" placeholder="{{ $tp[0]['contact_person'] }}" disabled>
    </div>
    <div class="form-group">
        <label>contact person number</label>
        <input type="text" name="contact_phone" class="form-control" placeholder="{{ $tp[0]['contact_phone'] }}" disabled>
    </div>
    <div class="form-group">
        <label>contact person email</label>
        <input type="text" name="contact_email" class="form-control" placeholder="{{ $tp[0]['contact_email'] }}" disabled>
    </div>
    <div class="form-group">
        <label>website</label>
        <input type="text" name="website" class="form-control" placeholder="{{ $tp[0]['contact_person'] }}" disabled>
    </div>

    <div class="form-group">
        <label>status</label>
        <select class="form-control" id="status" name="status_id" disabled>
            <option name="status_id" value=1>{{ $tp[0]->status['status'] }}</option>
         </select>
    </div>
    <div class="form-group">
        <label>type</label>
        <select class="form-control" id="status" name="third_party_type_id" disabled>
            <option name="type_id" value=1>{{ $tp[0]->Third_party_type['type'] }}</option>
         </select>
    </div>

  <!--  <div class="form-group">
        <label>Configration info</label>
        <textarea class="form-control" id="config" rows="10" name="config" disabled>{{ $tp[0]['config'] }}</textarea>
    </div>
-->
        
     

    @endsection

@extends('layouts.app')

@section('content')
<form>
        <fieldset>
          <legend>Add New Admin</legend>
          <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" placeholder="Enter the Name">
          </div>
          <div class="form-group">
            <label >User Name</label>
            <input type="text" class="form-control" placeholder="Enter the User Name">
          </div>
          <div class="form-group">
            <label >Password</label>
            <input type="password" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label >Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password">
          </div>
          <div class="form-group">
                <label >E-mail</label>
                <input type="email" class="form-control" placeholder="Enter the Email">
              </div>
        
          <fieldset class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
      </form>
@endsection
@extends('layouts.app')

@section('content')
 
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('connect') }}</div>

              <div class="card-body">
                  <form method="POST" action="/GitHub/CCS/public/ThirdParty/connect_third_party">
                        
                      <div class="form-group row">
                          <label for="user_id" class="col-md-4 col-form-label text-md-right">user id:</label>

                          <div class="col-md-6">
                              <input id="user_id" type="text" class="form-control" name="user_id">
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="client_id" class="col-md-4 col-form-label text-md-right">client id:</label>

                        <div class="col-md-6">
                            <input id="client_id" type="text" class="form-control" name="client_id">
                        </div>
                    </div>


                    
                  <div class="form-group row">
                    <label for="platform_id" class="col-md-4 col-form-label text-md-right">platform_id:</label>

                    <div class="col-md-6">
                        <input id="platform_id" type="text" class="form-control" name="platform_id">
                    </div>
                </div>


                    <div class="form-group row">
                      <label for="third_party_id" class="col-md-4 col-form-label text-md-right">third_party_id</label>

                      <div class="col-md-6">
                          <input id="third_party_id" type="text" class="form-control" name="third_party_id">
                      </div>
                  </div>
 
                  <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
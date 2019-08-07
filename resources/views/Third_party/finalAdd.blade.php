@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center" >
        <h2>Create Third Party</h2>
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
            <div class="form-group">
                <label for="seeAnotherFieldGroup">API Type</label>
                <select class="form-control" id="seeAnotherFieldGroup" name = "config[type]">
                      <option value="non">please select a type</option>
                      <option value="rest">Rest API</option>
                      <option value="oauth">Oauth</option>
                      <option value="saml">SAML</option>
                </select>
              </div>
            </div>
              
              <!-- input fields for Oauth-->
              <div class="form-group" id="oauth">

                  <div class="form-group">
                      <label for="Rtype">Request Type</label>
                      <select class="form-control" name = "config[Connection-standard]" id="Rtype" >
                            <option value="post">Post</option>
                            <option value="get">Get</option>
                      </select>
                  </div>
    
                  <div class="form-group">
                        <label for="URL">URL</label>
                        <input type="text" class="form-control" id="URL" name="config[URL]">
                  </div>
                 
                  <div class="form-group">
                      <label for="Tag">Header </label>
                      <textarea  type="text" name = "config[Header]" rows = "4" class="form-control" id="Header"></textarea>
                </div>

                <div class="form-group">
                    <label for="URL">Body</label>
                    <textarea  type="text" rows = "4" name = "config[Body]" class="form-control" id="Body"></textarea>
                    </div>
  
                </div>

                              <!-- input fields for Oauth-->
              <div class="form-group" id="saml">

                  <div class="form-group">
                      <label for="Rtype">Request Type</label>
                      <select class="form-control" name = "config[Connection-standard]" id="Rtype" >
                            <option value="post">Post</option>
                            <option value="get">Get</option>
                      </select>
                  </div>
    
                  <div class="form-group">
                        <label for="URL">URL</label>
                        <input type="text" class="form-control" id="URL" name="config[URL]">
                  </div>

                <div class="form-group">
                    <label for="URL">XML</label>
                    <textarea  type="text" rows = "8" name = "config[XML]" class="form-control" id="XML"></textarea>
                    </div>
  
                </div>


                              <!-- input fields for Oauth-->
              <div class="form-group" id="rest">

                  <div class="form-group">
                      <label for="Rtype">Request Type</label>
                      <select class="form-control" name = "config[Connection-standard]" id="Rtype" >
                            <option value="post">Post</option>
                            <option value="get">Get</option>
                      </select>
                  </div>
    
                  <div class="form-group">
                        <label for="URL">URL</label>
                        <input type="text" class="form-control" id="URL" name="config[URL]">
                  </div>
                 
                  <div class="form-group">
                      <label for="Tag">Header </label>
                      <textarea  type="text" name = "config[Header]" rows = "4" class="form-control" id="Header"></textarea>
                </div>

                <div class="form-group">
                    <label for="URL">Body</label>
                    <textarea  type="text" rows = "4" name = "config[Body]" class="form-control" id="Body"></textarea>
                    </div>
  
                </div>


          </div>
          <div class="form-group">
            <label style="margin-left:2%;">Logo</label>
            <br>
            <input style="margin-left:2%;" type="file" id="Logo" name="logo">
           </div>
          <fieldset class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right ; margin-right:4%; width:120px">Submit</button>
        </fieldset>
          
          <script>

              $("#seeAnotherFieldGroup").change(function() {
              if ($(this).val() == "oauth") {
                  $('#rest').hide();
                  $('#oauth').show();
                  $('#saml').hide();
                
                  $('#otherField1').attr('required', '');
                  $('#otherField1').attr('data-error', 'This field is required.');
                  $('#otherField2').attr('required', '');
                  $('#otherField2').attr('data-error', 'This field is required.');

              }  else if($(this).val() == "saml") {
                  $('#rest').hide();
                  $('#oauth').hide();
                  $('#saml').show();
                
                  $('#otherField1').attr('required', '');
                  $('#otherField1').attr('data-error', 'This field is required.');
                  $('#otherField2').attr('required', '');
                  $('#otherField2').attr('data-error', 'This field is required.');

              } else if($(this).val() == "rest") {
                  $('#rest').show();
                  $('#oauth').hide();
                  $('#saml').hide();
                  $("#saml").attr('disabled',true);
                  $("#XML").attr('disabled',true);
                  $('#otherField1').attr('required', '');
                  $('#otherField1').attr('data-error', 'This field is required.');
                  $('#otherField2').attr('required', '');
                  $('#otherField2').attr('data-error', 'This field is required.');

              }else {
                  $('#oauth').hide();
                  $('#saml').hide();
                  $('#rest').hide();
                  $('#otherField1').removeAttr('required');
                  $('#otherField1').removeAttr('data-error');
                  $('#otherField2').removeAttr('required');
                  $('#otherField2').removeAttr('data-error');
              }
              });
              $("#seeAnotherFieldGroup").trigger("change");
          </script>
          
   <!--       <div class="form-group">
            <label for="comments">Comments/Questions</label>
            <textarea class="form-control" id="comments" rows="3"<textarea><button class="btn btn-primary" type="submit">Submit</button>
        
        <h2>CSS</h2>
        
        <p>The CSS here makes the form centered and look nice on desktop in case you wish to download.</p>
        
        <textarea class="codemirror-monokai">
          form {
          max-width: 900px;
          display: block;
          margin: 0 auto;
        }
      -->
      </form>
    </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')


<html>

<body>

    <div class="container">
        <h3 class="register-heading">Create Third Party</h3>

        <form method="post"  action="{{ route('ThirdParty.store') }}" enctype="multipart/form-data">

               {{ csrf_field() }}    <!-- This is necessary to avoid getting 419 Error: Sorry your session has expired  -->
 

            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="title" />
            </div>
            <div class="form-group">
                <input type="text" name="id_token" class="form-control" value="id_token903840" placeholder="id_token" />
            </div>

            <div class="form-group">
                <input type="text" name="description" class="form-control" placeholder="description" />
            </div>

            <div class="form-group">
                <input type="file" name="logo" class="form-control" placeholder="logo" />
            </div>

            <div class="form-group">
                <input type="type" name="type" class="form-control" placeholder="type" />
            </div>

            <div class="form-group">
                <input type="text" name="view_order" class="form-control" value="31" placeholder="view_order" />
            </div>

            <div class="form-group">
                <input type="text" name="status" class="form-control" placeholder="status" />
            </div>

            <div class="form-group">
                <input type="text" name="position" class="form-control" placeholder="position" />
            </div>

            <div class="form-group">
                <input type="type" name="website" class="form-control" placeholder="website" />
            </div>

            <div class="form-group">
                <input type="text" name="contact_person" class="form-control" placeholder="contact_person" />
            </div>
            <div class="form-group">
                <input type="text" name="contact_phone" class="form-control" placeholder="contact_phone" />
            </div>

            <div class="form-group">
                <input type="text" name="contact_email" class="form-control" placeholder="contact_email" />
            </div>

            <div class="form-group">
                <input type="type" name="config" class="form-control" placeholder="config[Serialized]" />
            </div>


            <div class="form-group">
                <input type="submit"  class="btn btn-primary" value="Submit" />
            </div>
        </form>

    </div>
</body>

</html>

@endsection
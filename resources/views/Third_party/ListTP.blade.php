@extends('layouts.app')

@section('content')


<html>
    
<body> 

    <div class="container">
        <h3 class="register-heading">List Third Party: </h3>

    <div class="form-group">
        <div>
            {{  Form::radio('SelectType', 'School', true, ['id' => 'opt1'])  }} <!--  Form::radio('name', 'value', isCheckd? , ['attribute' => 'value']) -->
            {{  Form::label('opt1', 'School') }}  <!--  Form::label('name', 'value') -->
        </div>
        <div>
            {{  Form::radio('SelectType', 'User', false , ['id' => 'opt2'])  }}
            {{  Form::label('opt2', 'User') }}
        </div>
        <div>
            {{  Form::radio('SelectType', 'Platform', false , ['id' => 'opt3'])  }}
            {{  Form::label('opt3', 'Platform') }}
        </div>
        <div>
            {{  Form::radio('SelectType', 'Order', false , ['id' => 'opt4'])}}
            {{  Form::label('opt4', 'Order') }}
        </div>
    </div>

  

    </div>
  
</body>



</html>

@endsection
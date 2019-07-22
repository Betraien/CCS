@extends('layouts.app')

@section('content')

 
<div class="m-dropdown">
    <div class="e-button open">
        <a href="#"> </a>
        <div class="e-burger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    
    <ul class="e-list">
   @for($i = 0; $i < count($MyArray['Services']); $i++)

    @if( count($MyArray['Services']) <= 0)
    
    @break;

    @else
     <li><a href="#">{{ $MyArray['Services'][$i] }}</a></li>
    @endif
@endfor
    </ul>
</div>
 
@endsection

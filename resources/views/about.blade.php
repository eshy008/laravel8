{{-- @include('partials.top_header')  this is used to point to a view/webpage in a folder --}}

@extends("layouts.app")



{{-- {{ $email }}

{{ $name }} // to display a variable or value in the blade template

// this is how to make logical calculations or state ment in the blade templating file .

$names = ["jay", "ray", "say"];

@if (count($name) > 0)
Number of elements inside this array  > 0
@endif

@empty($name)
This variable is empty  
@endempty

@isset($name)
$name
@endisset


// this is another example
<?php
// $1 = 0;

// if($i = 0){
//   echo "i=0";
// }elseif($i = 1){
//   echo "i = 1";
// }el
?>
// instead we do this in the blade templating system

@if($i == 0)
  This is the if block  
@elseif
  this is the else if 
@else
    This is else block
@endif

//this the blade template for the FOR LOOP

@for($i = 0; $i > 5; i++)

@endfor --}}
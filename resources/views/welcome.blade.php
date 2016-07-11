@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Personal details

                </div>

                @if(Auth::check())
               <div> <h1 > {{Auth::user()->username}} </h1> </div>
                <img  src="{{Auth::user()->avatar}}"/> 

                
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

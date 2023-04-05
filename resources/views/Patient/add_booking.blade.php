@extends('master')
@section('title', 'Booking')
@section('content')


<div class="row">
    <div class="col-sm-4 col-3">
        <h3 class="page-title font-weight-bold">Department Lists</h3>
    </div>
</div>
<div class="row">
    @foreach($departments as $dept)
        <div class="col-md-6 col-sm-4">

            <div class="profile-widget">
                <a href="{{route('book_doc_list', $dept->id)}}">                     
                    <img src="{{'/image/'. $dept->photo}}" width="200" height="200">
                       
                    <h4 class="text-ellipsis">{{$dept->name}}</h4>
                </a>  
            </div>
        </div>
    @endforeach
   
</div>
@endsection


@section('js')



@endsection
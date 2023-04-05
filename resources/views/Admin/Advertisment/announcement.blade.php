@extends('master')
@section('title', 'Announcements')
@section('content')
<div class="col-12 col-md-8 offset-md-2">
    <div class="card" >
        <div class="card-header">
            <h4 class="card-title d-inline-block">Announcement Lists</h4>

            <a href="" class="btn bpinkcolor text-white btn-rounded float-right" data-target="#add_annou" data-toggle="modal">
                <i class="fa fa-plus"></i> Add Announcement
            </a>

            <div id="add_annou" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <h3>Add Announcement!</h3>
                            <form action="{{route('announcement_store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Announcement Title</label>
                                        <input class="form-control" type="text"  name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <input class="form-control" type="text"  name="short_description">
                                    </div>

                                    <div class="form-group">
                                        <label>Long Description</label>
                                        <input class="form-control" type="text"  name="description">
                                    </div>

                                    <div class="form-group">
                                        <label>Announcement Photo</label>
                                        <input class="form-control" type="file"  name="photo">
                                    </div>
                                     
                                    <div class="form-group">
                                        <label class="gen-label">Announcement Range:</label>
                                        <input class="form-control" type="number" name="range">

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="weekormonth" value="week" checked class="form-check-input">Week
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="weekormonth" value="month"  checked class="form-check-input">Month
                                            </label>
                                        </div>
                                    </div>
                                    <div class="m-t-20"> 
                                        <a href="#" class="btn btn-danger ml-3" data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </form>             
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Announcement Title</th>                                    
                            <th>Expire Date</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($announcements as $ann)
                        <tr>
                            <td>{{$ann->title}}</td>
                            <td>{{date('Y-m-d', strtotime($ann->expired_at))}}</td>
                            <td>
                                <a href="#" class="btn bbluecolor text-white" data-toggle="modal" data-target="#edit_item{{$ann->id}}">
                                Check Details</a>
                            </td>

                            <div id="edit_item{{$ann->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="text-center">Announcement Details!</h3>

                                            <hr>

                                            <h4>Announcement Title - <span class="font-weight-bold"> {{$ann->title}} </span></h4>

                                            <h4>Announcement Description - <span class="font-weight-bold"> {{$ann->description}}</span></h4>

                                            <img src="">

                                            <div class="m-t-20"> 
                                                <a href="#" class="btn btn-danger ml-3" data-dismiss="modal">Close</a>
                                            </div>
                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @empty 
                        <tr>
                            <td>No Announcement!</td>
                        </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
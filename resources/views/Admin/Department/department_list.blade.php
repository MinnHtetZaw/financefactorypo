@extends('master')
@section('title', 'Department List')
@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title font-weight-bold">Departments</h4>
    </div>
    <div class="col-sm-7 col-7 text-right m-b-30">
        <a href="{{route('create_department')}}" class="btn bpinkcolor text-white btn-rounded"><i class="fa fa-plus"></i> Add Department</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Department Code</th>
                        <th>Department Name</th>
                        <th>Department Logo</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <?php
                    $i = 1;
                ?>
                <tbody>
                    @if(count($department_lists) == 0)
                    <tr>
                        <td>There is Empty Department Data!</td>
                    </tr>
                    @else
                        @foreach($department_lists as $department)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$department->department_code}}</td>
                            <td>{{$department->name}}</td>
                            <td><img src="{{ asset('/image/Department_Image/'. $department->photo_path) }}" width="70" height="70"></td>
        					
                            @if($department->status == 1)
                            <td>
                                <span class="custom-badge status-green">Active</span>
                            </td>
                            @else
                            <td>
                                <span class="custom-badge status-red">Inactive</span>
                            </td>
                            @endif
                            
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('edit_department', $department->id)}}">
                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection
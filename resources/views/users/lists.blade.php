@extends('master')

@section('content')
 <div class="row">
     <h1>User List</h1>
     <div class="col-md-12">

         <div class="table-responsive">
             <table class="table table-striped table-bordered">
                 <p class="text-right">
                     <a href="{!! URL::route('auth.signup') !!}" class="btn btn-primary">
                         <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New User
                     </a>
                 </p>

                 <thead>
                 <tr>
                     <th>Username</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Role</th>
                     <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td style="vertical-align: middle;">{!! $user->username !!}</td>
                                <td style="vertical-align: middle;">{!! $user->firstname !!}</td>
                                <td style="vertical-align: middle;">{!! $user->lastname !!}</td>
                                <td style="vertical-align: middle;">{!! $user->email !!}</td>
                                <td style="vertical-align: middle;">{!! $user->phone !!}</td>
                                <td style="vertical-align: middle;">{!! $user->role->name !!}</td>
                                <td>
                                    <a href="{!! route('user.edit',[$user->id]) !!}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">No Users Found!</td>
                        </tr>
                    @endif

                 </tbody>
             </table>
             {!! $users->render() !!}
         </div>

     </div>
 </div>
@stop

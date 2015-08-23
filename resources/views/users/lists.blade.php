@extends('master')

@section('content')
 <div class="row">
     <h1>User List</h1>
     <div class="col-md-12">

         <div class="table-responsive">
             <table class="table table-striped table-bordered">
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
                                <td>{!! $user->username !!}</td>
                                <td>{!! $user->firstname !!}</td>
                                <td>{!! $user->lastname !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->phone !!}</td>
                                <td>{!! $user->role->role_name !!}</td>
                                <td>{!! link_to_route('user.edit','Edit',$user->id) !!}</td>
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

@extends('master')

@section('content')
 <div class="row">
     <h1>{!! $customerdetail->firstname . ' ' . $customerdetail->lastname !!}</h1>
     <hr>
     <div class="col-md-6">
         <table class="table table-bordered">
             <tbody>
             <tr>
                 <td nowrap>THC</td>
                 <td>{!! $customerdetail->thc !!}</td>
             </tr>
             <tr>
                 <td nowrap>First Name:</td>
                 <td>{!! $customerdetail->firstname !!}</td>
             </tr>
             <tr>
                 <td nowrap>Last Name:</td>
                 <td>{!! $customerdetail->lastname !!}</td>
             </tr>
             <tr>
                 <td nowrap>Date of Birth:</td>
                 <td>{!! $customerdetail->profile->dob !!}</td>
             </tr>
             <tr>
                 <td nowrap>Gender</td>
                 <td>{!! expandGender($customerdetail->profile->gender_id) !!}</td>
             </tr>
             <tr>
                 <td nowrap>State of Origin:</td>
                 <td>{!! expandState($customerdetail->profile->state_id) !!}</td>
             </tr>
             <tr>
                 <td nowrap>Email:</td>
                 <td>{!! $customerdetail->email !!}</td>
             </tr>
             <tr>
                 <td nowrap>Phone:</td>
                 <td>{!! $customerdetail->phone !!}</td>
             </tr>
             <tr>
                 <td nowrap>Hostel Address:</td>
                 <td>{!! $customerdetail->profile->hostel_address !!}</td>
             </tr>
             <tr>
                 <td nowrap>Guardian Full Name:</td>
                 <td>{!! $customerdetail->profile->guardian_name !!}</td>
             </tr>
             <tr>
                 <td nowrap>Guardian Phone:</td>
                 <td>{!! $customerdetail->profile->guardian_phone !!}</td>
             </tr>
             <tr>
                 <td nowrap>Guardian Address:</td>
                 <td>{!! $customerdetail->profile->guardian_address !!}</td>
             </tr>
             </tbody>
         </table>
         <p>
             {!! link_to_route('customer.edit','Edit',$customerdetail->id,['class' => 'btn btn-primary']) !!}
             {!! link_to_route('customer.list','Back',[],['class' => 'btn btn-danger']) !!}
         </p>

     </div>
     <div class="col-md-6">
         <table class="table">
             <tbody>
                 <tr>
                     <td><img src="/images/profile_placeholder.png" alt="Profile Photo"></td>
                 </tr>
             </tbody>
         </table>
     </div>
 </div>
@stop

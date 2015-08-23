@extends('master')

@section('content')
 <div class="row">
     <h1>Customer List</h1>
     <div class="col-md-12">

         <div class="table-responsive">
             <table class="table table-striped table-bordered">
                 <thead>
                 <tr>
                     <th>THC</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Gender</th>
                     <th>State</th>
                     <th>Phone</th>
                     <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                    @if($customers->count() > 0)
                        @foreach($customers as $customer)
                            <tr>
                                <td>{!! $customer->thc !!}</td>
                                <td>{!! $customer->firstname !!}</td>
                                <td>{!! $customer->lastname !!}</td>
                                <td>{!! expandGender($customer->profile->gender_id) !!}</td>
                                <td>{!! expandState($customer->profile->state_id) !!}</td>
                                <td>{!! $customer->phone !!}</td>
                                <td>
                                    {!! link_to_route('customer.edit','Edit',$customer->id) !!} |
                                    {!! link_to_route('customer.detail','Detail',$customer->id) !!} |
                                    {!! link_to_route('customer.delete','Delete',$customer->id) !!}
                               </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">No Customers Found!</td>
                        </tr>
                    @endif

                 </tbody>
             </table>
             {!! $customers->render() !!}
         </div>

     </div>
 </div>
@stop

@extends('master')

@section('content')
 <div class="row">
     <h1>Customer List</h1>
     <div class="col-md-12">

         <div class="table-responsive">
             <table class="table table-striped table-bordered">
                 <p class="text-right">
                     <a href="{!! URL::route('customer.new') !!}" class="btn btn-primary">
                         <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Customer
                     </a>
                 </p>

                 <thead>
                 <tr>
                     <th>THC</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Gender</th>
                     <th>Acc. Balance (&#8358;)</th>
                     <th>Phone</th>
                     <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                    @if($customers->count() > 0)
                        @foreach($customers as $customer)
                            <tr>
                                <td style="vertical-align: middle;">{!! $customer->thc !!}</td>
                                <td style="vertical-align: middle;">{!! $customer->firstname !!}</td>
                                <td style="vertical-align: middle;">{!! $customer->lastname !!}</td>
                                <td style="vertical-align: middle;">{!! expandGender($customer->profile->gender_id) !!}</td>
                                <td style="vertical-align: middle;">{!! nairaFormater($customer->payment->account_balance) !!}</td>
                                <td style="vertical-align: middle;">{!! $customer->phone !!}</td>
                                <td>
                                    <a href="{!! route('customer.edit',[$customer->id]) !!}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a>
                                    <a href="{!! route('customer.detail',[$customer->id]) !!}" class="btn btn-info">
                                        <span class="glyphicon glyphicon-expand"></span> Detail
                                    </a>
                                    <a href="{!! route('customer.orderlist',[$customer->id]) !!}" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-credit-card"></span> Orders
                                    </a>
                                    @role('admin')
                                    <a href="{!! route('customer.delete',[$customer->id]) !!}" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove-circle"></span> Delete
                                    </a>
                                    @endrole

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

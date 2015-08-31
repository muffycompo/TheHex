@extends('master')

@section('content')
 <div class="row">
     <h1>Order List</h1>

     <div class="col-md-12">
         <div class="table-responsive">
             <table class="table table-striped table-bordered">
                 <p class="text-right">
                     <a href="{!! URL::route('order.new') !!}" class="btn btn-primary">
                         <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Order
                     </a>
                 </p>
                 <thead>
                 <tr>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Phone</th>
                     <th>Amount (&#8358;)</th>
                     <th>Order Type</th>
                     <th>Order Date</th>
                     <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                    @if($orders->count() > 0)
                        @foreach($orders as $order)
                            <tr>
                                <td style="vertical-align: middle;">{!! isset($order->customer->firstname) ? $order->customer->firstname : 'Deleted' !!}</td>
                                <td style="vertical-align: middle;">{!! isset($order->customer->lastname) ? $order->customer->lastname : 'Deleted' !!}</td>
                                <td style="vertical-align: middle;">{!! isset($order->customer->phone) ? $order->customer->phone : 'Deleted' !!}</td>
                                <td style="vertical-align: middle;">{!! nairaFormater($order->order_amount) !!}</td>
                                <td style="vertical-align: middle;">{!! expandOrderCategoryType($order->order_category_id) !!}</td>
                                <td style="vertical-align: middle;">{!! $order->created_at->format('d/m/Y h:i A') !!}</td>
                                <td>
                                    <a href="{!! route('order.print',[$order->id]) !!}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-print"></span> Print
                                    </a>
                                    @role('admin')
                                    <a href="{!! route('order.cancel',[$order->id]) !!}" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove-circle"></span> Cancel
                                    </a>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">No Orders Found!</td>
                        </tr>
                    @endif

                 </tbody>
             </table>
             {!! $orders->render() !!}
         </div>

     </div>
 </div>
@stop

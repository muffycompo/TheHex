@extends('master')

@section('content')
 <div class="row">
     <h1>Order List</h1>
     <div class="col-md-12">

         <div class="table-responsive">
             <table class="table table-striped table-bordered">
                 <thead>
                 <tr>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Phone</th>
                     <th>Amount</th>
                     <th>Order Type</th>
                     <th>Order Date</th>
                     <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                    @if($orders->count() > 0)
                        @foreach($orders as $order)
                            <tr>
                                <td>{!! $order->customer->firstname !!}</td>
                                <td>{!! $order->customer->lastname !!}</td>
                                <td>{!! $order->customer->phone !!}</td>
                                <td>{!! $order->order_amount !!}</td>
                                <td>{!! expandOrderCategoryType($order->order_category_id) !!}</td>
                                <td>{!! $order->created_at->format('d/m/Y H:i:s A') !!}</td>
                                <td>{!! link_to_route('order.print','Edit',$order->id) !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">No Customers Found!</td>
                        </tr>
                    @endif

                 </tbody>
             </table>
             {!! $orders->render() !!}
         </div>

     </div>
 </div>
@stop

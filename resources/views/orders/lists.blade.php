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
                                <td>{!! isset($order->customer->firstname) ? $order->customer->firstname : 'Deleted' !!}</td>
                                <td>{!! isset($order->customer->lastname) ? $order->customer->lastname : 'Deleted' !!}</td>
                                <td>{!! isset($order->customer->phone) ? $order->customer->phone : 'Deleted' !!}</td>
                                <td>{!! $order->order_amount !!}</td>
                                <td>{!! expandOrderCategoryType($order->order_category_id) !!}</td>
                                <td>{!! $order->created_at->format('d/m/Y H:i:s A') !!}</td>
                                <td>{!! link_to_route('order.print','Print',$order->id) !!}</td>
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

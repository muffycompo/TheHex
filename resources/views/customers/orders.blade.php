@extends('master')

@section('content')
 <div class="row">
     <h1>Orders for: {!! customerFullname($id) !!}</h1>
     <div class="col-md-12">

         <div class="table-responsive">
             <table class="table table-striped table-bordered">
                 <thead>
                 <tr>
                     <th>Order Type</th>
                     <th>Order Date</th>
                     <th>Amount (&#8358;)</th>
                     <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                    @if($orders->count() > 0)
                        @foreach($orders as $order)
                            <tr>
                                <td>{!! expandOrderCategoryType($order->order_category_id) !!}</td>
                                <td>{!! $order->created_at->format('d/m/Y h:i A') !!}</td>
                                <td>{!! $order->order_amount !!}</td>
                                <td>{!! link_to_route('order.print','Print',$order->id) !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No Orders Found!</td>
                        </tr>
                    @endif

                 </tbody>
             </table>
             {!! $orders->render() !!}
         </div>

     </div>
 </div>
@stop

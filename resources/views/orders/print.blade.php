@extends('master')

@section('content')
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>The Hex</strong>
                        <br>
                        1234 Bingham Blvd
                        <br>
                        Karu, Nasarawa
                        <br>
                        <abbr title="Phone">P:</abbr> (234) 805-944-3154
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: {!! $customer_order->created_at->format('jS F, Y') !!}</em>
                    </p>
                    <p>
                        <em>Receipt #: {!! $customer_order->receipt_number !!}</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty.</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-md-7">{!! expandOrderCategoryType($customer_order->order_category_id) !!}</td>
                        <td class="col-md-1" style="text-align: center">1</td>
                        <td class="col-md-2 text-center">{!! nairaFormater($customer_order->order_amount) !!}</td>
                        <td class="col-md-2 text-center">{!! nairaFormater($customer_order->order_amount) !!}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right">
                            <p>
                                <strong>Subtotal:</strong>
                            </p>
                            <p>
                                <strong>Tax:</strong>
                            </p>
                        </td>
                        <td class="text-center">
                            <p>
                                <strong>{!! nairaFormater($customer_order->order_amount) !!}</strong>
                            </p>
                            <p>
                                <strong>{!! nairaFormater(0) !!}</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right"><h4><strong>Total:</strong></h4></td>
                        <td class="text-center text-danger"><h4><strong>{!! nairaFormater($customer_order->order_amount) !!}</strong></h4></td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="javascript:if(window.print)window.print()" class="btn btn-success hidden-print">
                        Print Receipt <span class="glyphicon glyphicon-print"></span>
                    </a>
                    {!! link_to_route('order.list','Back',[],['class' => 'btn btn-danger hidden-print']) !!}
                </div>

            </div>
        </div>
    </div>
@stop

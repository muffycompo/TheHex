@extends('master')

@section('content')
 <div class="row">
     <h1>Rollover List</h1>

     <div class="col-md-12">
         <div class="table-responsive">
             <table class="table table-striped table-bordered">
                 <p class="text-right">
                     <a href="{!! URL::route('rollover.new') !!}" class="btn btn-primary">
                         <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Rollover
                     </a>
                 </p>
                 <thead>
                 <tr>
                     <th>From</th>
                     <th>To</th>
                     <th>Rollover Amount (&#8358;)</th>
                     <th>Rollover Date</th>
                     <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                    @if($rollovers->count() > 0)
                        @foreach($rollovers as $rollover)
                            <tr>
                                <td style="vertical-align: middle;">{!! customerFullname($rollover->rollover_from_user) !!}</td>
                                <td style="vertical-align: middle;">{!! customerFullname($rollover->rollover_to_user) !!}</td>
                                <td style="vertical-align: middle;">{!! nairaFormater($rollover->rollover_amount) !!}</td>
                                <td style="vertical-align: middle;">{!! $rollover->created_at->format('d/m/Y h:i A') !!}</td>
                                <td>
                                    @role('admin')
                                    <a href="{!! route('rollover.cancel',[$rollover->id]) !!}" class="btn btn-info">
                                        <span class="glyphicon glyphicon-remove-circle"></span> Cancel
                                    </a>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No Rollovers Found!</td>
                        </tr>
                    @endif

                 </tbody>
             </table>
             {!! $rollovers->render() !!}
         </div>

     </div>
 </div>
@stop

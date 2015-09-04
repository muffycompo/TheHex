@extends('master')

@section('content')
 <div class="row">
     <h1>Customer: {!! $customerdetail->firstname . ' ' . $customerdetail->lastname !!}</h1>
     <hr>
     <div class="col-md-6">
         <table class="table table-bordered">
             <tbody>
             <tr>
                 <td nowrap>THC</td>
                 <td>{!! $customerdetail->thc !!}</td>
             </tr>
             <tr>
                 <td nowrap>Account Balance</td>
                 <td>{!! nairaFormater($customerdetail->payment->account_balance) !!}</td>
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
             {!! link_to_route('customer.edit','Edit',$customerdetail->id,['class' => 'btn btn-primary hidden-print']) !!}
             {!! link_to_route('customer.list','Back',[],['class' => 'btn btn-danger hidden-print']) !!}
         </p>

     </div>
     <div class="col-md-6">
         <table class="table">
             <tbody>
                 <tr>
                     <td>
                         @if(!empty($customerdetail->profile->photo_path))
                             <img src="{{ $customerdetail->profile->photo_path }}" alt="Profile Photo" height="150">
                         @else
                             <img src="/images/profile_placeholder.png" alt="Profile Photo">
                         @endif
                     </td>
                     <td class="pull-right">
                         <img src="{!! $customerdetail->qrcode !!}" alt="QR Code">
                     </td>
                 </tr>
             </tbody>
         </table>
         <div class="row hidden-print">
             <div class="col-md-5">
                 {!! Form::open(['route' => ['customer.photo',$customerdetail->id], 'class' => 'dropzone', 'id' => 'customerPhotoForm']) !!}
                 <div class="dz-message">
                     <p class="text-center">
                         Upload Customer Photo<br>
                         <span class="text-danger">(Click or drag &amp; drop here)</span>
                     </p>
                 </div>
                 {!! Form::close() !!}
             </div>
             <div class="col-md-3"></div>
             <div class="col-md-4" style="text-align: center;">
                 <a href="javascript:if(window.print)window.print()" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>
             </div>
         </div>
     </div>
 </div>
@stop

@section('scripts.footer')
    <script src="/js/dropzone.min.js"></script>
    <script>
        Dropzone.options.customerPhotoForm = {
            paramName: 'photo',
            maxFilesize: 0.5,
            uploadMultiple: false,
            maxFiles: 1,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp',
            init: function() {
                this.on("maxfilesexceeded", function (file) {
                    this.removeFile(file);
                });
                this.on("success",function(file){
                    // Maybe find a cleaner way
                    location.reload(true);
                });
            }
        };
    </script>
@stop
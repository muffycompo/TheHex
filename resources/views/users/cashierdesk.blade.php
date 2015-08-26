@extends('master')
<style>
    #outdiv
    {
        width:326px;
        height:246px;
        border: solid;
        border-width: 3px 3px 3px 3px;
    }
    #compat{
        display: none;
    }

</style>
@section('content')

    <div class="row">
        <h1>Cashier Desk</h1>
        <div class="col-md-4">
            {{--<div id="camsource">--}}
            <div id="outdiv">
                <video  id="camsource" autoplay width="320" height="240">Video will render.</video>
                <div id="scan_message"></div>
            </div>
            <div id="compat"></div>

        </div>
        <div class="col-md-7 col-md-offset-1">
            <table class="table">
                <tbody>
                <tr>
                    <td colspan="2" id="customer_photo" class="text-right">
                        <img src="/images/profile_placeholder.png" alt="Profile Photo" height="150">
                    </td>
                </tr>
                <tr>
                    <td nowrap>THC</td>
                    <td nowrap id="thc"></td>
                </tr>
                <tr>
                    <td nowrap>First Name:</td>
                    <td id="firstname"></td>
                </tr>
                <tr>
                    <td nowrap>Last Name:</td>
                    <td id="lastname"> </td>
                </tr>
                <tr>
                    <td nowrap>Phone:</td>
                    <td id="phone"></td>
                </tr>
                <tr>
                    <td nowrap>Hostel Address:</td>
                    <td id="hostel_address"></td>
                </tr>
                </tbody>
            </table>

            {{--<div id="result"></div>--}}
            <canvas id="qr-canvas" width="800" height="600" style="display: none;"></canvas>
        </div>
    </div>

@stop

@section('scripts.footer')
  <script src="/js/qr/libs/grid.js"></script>
  <script src="/js/qr/libs/version.js"></script>
  <script src="/js/qr/libs/detector.js"></script>
  <script src="/js/qr/libs/formatinf.js"></script>
  <script src="/js/qr/libs/errorlevel.js"></script>
  <script src="/js/qr/libs/bitmat.js"></script>
  <script src="/js/qr/libs/datablock.js"></script>
  <script src="/js/qr/libs/bmparser.js"></script>
  <script src="/js/qr/libs/datamask.js"></script>
  <script src="/js/qr/libs/rsdecoder.js"></script>
  <script src="/js/qr/libs/gf256poly.js"></script>
  <script src="/js/qr/libs/gf256.js"></script>
  <script src="/js/qr/libs/decoder.js"></script>
  <script src="/js/qr/libs/QRCode.js"></script>
  <script src="/js/qr/libs/findpat.js"></script>
  <script src="/js/qr/libs/alignpat.js"></script>
  <script src="/js/qr/libs/databr.js"></script>

  <script src="/js/qr/qr.js"></script>
  <script src="/js/qr/camera.js"></script>
  <script src="/js/qr/init.js"></script>
@stop
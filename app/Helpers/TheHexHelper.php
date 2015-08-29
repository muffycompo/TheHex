<?php

// Dropdown Helpers
function statesDropDown($field_name,$selection = null,$attributes = [])
{
    $options = [];
    $states = DB::table('states')->get();
    if(count($states) > 0){
        foreach($states as $state){
            $options[$state->id] = $state->state_name;
        }
    }
    return Form::select($field_name, $options, $selection, $attributes);
}

function genderDropDown($field_name,$selection = null,$attributes = [])
{
    $options = [];
    $gender = DB::table('gender')->get();
    if(count($gender) > 0){
        foreach($gender as $sex){
            $options[$sex->id] = $sex->gender_name;
        }
    }
    return Form::select($field_name, $options, $selection, $attributes);
}

function orderCategoryDropDown($field_name,$selection = null,$attributes = [])
{
    $options = [];
    $order_categories = DB::table('order_categories')->get();
    if(count($order_categories) > 0){
        foreach($order_categories as $order){
            $options[$order->id] = $order->order_type;
        }
    }
    return Form::select($field_name, $options, $selection, $attributes);
}

function rolesDropDown($field_name,$selection = null,$attributes = [])
{
    $options = [];
    $roles = DB::table('roles')->get();
    if(count($roles) > 0){
        foreach($roles as $role){
            $options[$role->id] = $role->name;
        }
    }
    return Form::select($field_name, $options, $selection, $attributes);
}

function dobFormat($date)
{
//    2015-11-10
    $dob = explode('-',$date);
    $dob_piece = [$dob[2],$dob[1],$dob[0]];

    return implode('/',$dob_piece);
}

// Utility Helpers
function thcToCustomerId($thc)
{
    $thc = DB::table('customers')->where('thc',$thc)->first(['id']);
    return $thc->id;
}

function authUserFullname()
{
    $auth_user = \Illuminate\Support\Facades\Auth::User();
    return $auth_user->firstname . ' ' . $auth_user->lastname;
}

function customerFullname($id)
{
    $customer = DB::table('customers')->where('id',(int) $id)->first(['firstname','lastname']);
    return $customer->firstname . ' ' . $customer->lastname;
}

function thcFormater($id)
{
    // $numbers = str_pad($input,7,'0',STR_PAD_LEFT);
    return  'THC' . sprintf("%'.04d", (int) $id); // Faster
}

function thcReceiptNoGenerator($id)
{
    return  sprintf("%'.04d", (int) $id) . 'TH'; // Faster
}

function nairaFormater($amount)
{
    return '&#8358; ' . number_format($amount);
}

function imageToBase64($path)
{
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $imgdata = 'data:image/' . $type . ';base64,' . base64_encode($data);
    // Unlink / delete image file
    return $imgdata;
}

function generateQRCode($thc)
{
    $path = base_path('public') . DIRECTORY_SEPARATOR . 'customers' . DIRECTORY_SEPARATOR . 'qrcodes' . DIRECTORY_SEPARATOR . $thc .'.png';
    $code = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')->size(150)->generate($thc, $path);
    return $code;
}

// Expansion Helpers
function expandGender($id)
{
    $gender = [
        '1' => 'Male',
        '2' => 'Female',
    ];
    return $gender[$id];
}

function expandState($id)
{
    $states = [
        '1' => 'Abia',
        '2' => 'Adamawa',
        '3' => 'Akwa-Ibom',
        '4' => 'Anambra',
        '5' => 'Bauchi',
        '6' => 'Bayelsa',
        '7' => 'Benue',
        '8' => 'Borno',
        '9' => 'Cross River',
        '10' => 'Delta',
        '11' => 'Ebonyi',
        '12' => 'Edo',
        '13' => 'Ekiti',
        '14' => 'Enugu',
        '15' => 'Gombe',
        '16' => 'Imo',
        '17' => 'Jigawa',
        '18' => 'Kaduna',
        '19' => 'Kano',
        '20' => 'Katsina',
        '21' => 'Kebbi',
        '22' => 'Kogi',
        '23' => 'Kwara',
        '24' => 'Lagos',
        '25' => 'Nasarawa',
        '26' => 'Niger',
        '27' => 'Ogun',
        '28' => 'Ondo',
        '29' => 'Osun',
        '30' => 'Oyo',
        '31' => 'Plateau',
        '32' => 'Rivers',
        '33' => 'Sokoto',
        '34' => 'Taraba',
        '35' => 'Yobe',
        '36' => 'Zamfara',
        '37' => 'FCT',
    ];
    return $states[$id];
}

function expandOrderCategoryType($id)
{
    $thc = DB::table('order_categories')->whereId($id)->first(['order_type']);
    return $thc->order_type;
}


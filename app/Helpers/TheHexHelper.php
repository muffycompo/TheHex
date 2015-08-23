<?php

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

function rolesDropDown($field_name,$selection = null,$attributes = [])
{
    $options = [];
    $roles = DB::table('roles')->get();
    if(count($roles) > 0){
        foreach($roles as $role){
            $options[$role->id] = $role->role_name;
        }
    }
    return Form::select($field_name, $options, $selection, $attributes);
}
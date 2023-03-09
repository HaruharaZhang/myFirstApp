@extends('layouts.app')
@section('title', 'Animal Detials')
@section('content')
    <ul>
        <li>Name: {{ $animal -> name }} </li>
        <li>Weight: {{ $animal -> weight }} </li>
        <li>Data of birth: 
            @if ($animal -> date_of_birth)
            {{ $animal -> date_of_birth }} 
            @else
                Unknow
            @endif
        </li>
        <!-- 另一种检查数值的方式-->
        <li>Data of birth: {{ $animal -> date_of_birth ?? 'Unknow'}}</li>

        <li>Enclosure: {{ $animal -> enclosure_id }} </li>

        <!-- 这里要注意是enclosure，没有id！-->
        <li>Enclosure: {{ $animal -> enclosure -> name }} </li>
    </ul>
@endsection
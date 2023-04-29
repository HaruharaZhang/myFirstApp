@extends('layouts.app')
@section('title', 'Create Animal')
@section('content')
<form method="POST" action="{{ route('animals.store') }}">
    @csrf
    <p>Name: <input type="text" name="name"></p>
    <p>Weight: <input type="text" name="weight"></p>
    <p>Date of Birth: <input type="text" name="date_of_birth"></p>
    <p>Enclosure Id: <input type="text" name="enclosure_id"></p>
    <input type="submit" value="Submit">
    <a href="{{ route('animals.index') }}">Cancel</a>
</form>

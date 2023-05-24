@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacts</h1>
    <a href="{{ route('contacts.index') }}" class='btn btn-success'>Contacts List</a> 
    <a href="{{ route('contacts.create') }}" class='btn btn-primary'>ADD New Contact</a> 
    <hr>
    
    <div class='card'>
        <div class='card-body'>
            <div class='card-title'>
                Contact Informations
            </div>
            <div class='card-text'>
                <strong>ID :</strong>{{ $contact->id }}</br>
                <strong>Name : </strong>{{ $contact->name }}</br>
                <strong>Contact : </strong>{{ $contact->contact }}</br>
                <strong>Email : </strong>{{ $contact->email }}</br>
            </div>
        </div>
    </div>
    
    
    
</div>
@endsection

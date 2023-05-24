@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacts</h1>
    
    
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
    <a href="{{ route('contacts.edit', $contact->id ) }}" class='btn btn-success mr-2'>Edit</a> 
    
    <form action='{{ route('contacts.destroy', $contact) }}' method='POST' style='display: inline;'>
        @csrf
        @method('DELETE')
        <button type='submit' onclick="return confirm('Sure you want to Delete this Contact')" class='btn btn-danger'>Delete</a>
    </form>
    
    
    
</div>
@endsection

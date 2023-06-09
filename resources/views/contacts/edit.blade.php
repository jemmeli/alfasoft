@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacts</h1>
    
    <div class="card">
        <div class="card-header">
            Edit Contact 
        </div>
        <div class="card-body">
            <form method='POST' action="{{ route('contacts.update', $contact->id )}}">
                @csrf
                @method('PUT')
                <div class='form-group'>
                    <label for='name'>Name</label>
                    <input type='input' class='form-control' id='name'  name='name' value="{{old('name', $contact->name)}}" required >
                    @error('name')
                        <span class='text-danger'>{{$message}}</span>
                    @enderror
                </div>
                
                <div class='form-group'>
                    <label for='contact'>Contact</label>
                    <input type='number' class='form-control' id='contact'  name='contact' value="{{old('contact', $contact->contact)}}"  required >
                    @error('contact')
                        <span class='text-danger'>{{$message}}</span>
                    @enderror
                </div>
                
                <div class='form-group'>
                    <label for='email'>Email</label>
                    <input type='email' class='form-control' id='email'  name='email' value="{{old('email', $contact->email)}}"  required >
                    @error('email')
                        <span class='text-danger'>{{$message}}</span>
                    @enderror
                </div>
                
                <button type='submit' class='btn btn-primary'>Edit</button>
                
            </form>
        </div>
    </div>
    
</div>
@endsection

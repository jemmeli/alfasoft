@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacts</h1>
    @if(session('success'))
        <div class='alert alert-success'>
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                
                <th>Actions</th>
        </tr>
      </thead>
      <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href='#' class='btn btn-primary'>Edit</a>
                        <form action='{{ route('contacts.destroy', $contact) }}' method='POST' style='display: inline;'>
                            @csrf
                            @method('DELETE')
                            <button type='submit' onclick="return confirm('Sure you want to Delete this Contact')" class='btn btn-danger'>Delete</a>
                        </form>
                    </td>
                </tr>
            @endforeach
      </tbody>
      <tfoot>
        <tr>
          {{ $contacts->links('pagination::bootstrap-4') }}
        </tr>
      </tfoot>
    </table>
    
</div>
@endsection

@extends('dashboard')

<div class="container" style="width: 300px; margin-top:-300px">
    @if(isset($user))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $user)
            <tr>
                <td><a href="{{ url('/user/' . $user->id) }}">{{$user->name}}</a></a></td>
                <td>{{$user->address}}</td>
            </tr>
            @endforeach
            {{-- @else
            <p>No results found for "{{ $user }}"</p> --}}
        </tbody>
    </table>
   
    @endif
  

</div>



{{-- @extends('dashboard') --}}

<div class="container" style="width: 500px">
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
                <td><a href="{{ route('profile' ,$user->id) }}">{{$user->name}}</a></td>
                <td>{{$user->address}}</td>
            </tr>
            @endforeach
            {{-- @else
            <p>No results found for "{{ $user }}"</p> --}}
        </tbody>
    </table>
   
    @endif
  

</div>



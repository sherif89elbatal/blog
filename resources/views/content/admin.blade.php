@extends('master')



@section('content')

<div class="col-md-8">
    
    <h4> Control Panel </h4>
    <h6> List Of users </h6>

    <div>
    	
    	<table class="table table-hover">
    		<tr>
    			<th>#</th>
    			<th>Name</th>
    			<th>Email</th>
    			<th>User</th>
    			<th>Editor</th>
    			<th>Admin</th>
    		</tr>
    		@foreach($users as $user)
    		<form method="post" action="/add-role">
    			{{ csrf_field() }}
    			<input type="hidden" name="email" value="{{ $user->email }}">
    		<tr>
    			<td>{{ $user->id }}</td>
    			<td>{{ $user->name }}</td>
    			<td>{{ $user->email }}</td>
    			<td>
    				<input type="checkbox" onchange="this.form.submit()" name="role_user" {{ $user->hasRole('user') ? 'checked':'' }}>
    			</td>
    			<td>
    				<input type="checkbox" onchange="this.form.submit()" name="role_editor" {{ $user->hasRole('editor') ? 'checked':'' }}>
    			</td>
    			<td>
    				<input type="checkbox" onchange="this.form.submit()" name="role_admin" {{ $user->hasRole('admin') ? 'checked':'' }}>
    			</td>
    		</tr>
    		</form>
    		@endforeach

    	</table>
    </div>

    <div>
        <h3>Settings</h3>
        <form method="post" action="/settings">
        {{ csrf_field() }}
        
        Stop Comment: <input type="checkbox" onchange="this.form.submit()" name="stop_comment" {{ $stop_comment == 1 ? 'checked' : ' '}} > 
        <br>
        Stop Register: <input type="checkbox" onchange="this.form.submit()" name="stop_register" {{ $stop_register == 1 ? 'checked' : ' '}} >   
        
        </form>
    </div>

</div>


@stop
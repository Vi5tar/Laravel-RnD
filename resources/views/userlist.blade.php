@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registered Users</div>
                <div class="card-body">
                  <div class="col-sm">
                    @foreach ($users as $user)
                      <li>{{$user->name}}</li>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

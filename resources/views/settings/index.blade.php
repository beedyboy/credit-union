@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Settings</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('settings.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="setting1">Setting 1:</label>
                        <input type="text" class="form-control" id="setting1" name="setting1" value="{{ $user->setting1 }}">
                    </div>
                    <div class="form-group">
                        <label for="setting2">Setting 2:</label>
                        <input type="text" class="form-control" id="setting2" name="setting2" value="{{ $user->setting2 }}">
                    </div>
                    <!-- Add more input fields for other settings -->
                    <button type="submit" class="btn btn-primary">Update Settings</button>
                </form>
            </div>
        </div>
    </div>
@endsection

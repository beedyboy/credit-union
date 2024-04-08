@extends('layouts.app')

@section('title', 'View Profile')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Your Profile</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-weight-bold">Name:</p>
                        <p>{{ $user['name'] }}</p>
                        <p class="font-weight-bold">Email:</p>
                        <p>{{ $user['email'] }}</p>
                        <p class="font-weight-bold">Location:</p>
                        <p>{{ $user['location'] }}</p>
                        <p class="font-weight-bold">Occupation:</p>
                        <p>{{ $user['occupation'] }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="font-weight-bold">Next of Kin:</p>
                        <p>{{ $user['nok'] }}</p>
                        @if(isset($user['beneficiaries']) && count($user['beneficiaries']) > 0)
                            <p class="font-weight-bold">Beneficiaries:</p>
                            <ul>
                                @foreach($user['beneficiaries'] as $beneficiary)
                                    <li>{{ $beneficiary['name'] }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <!-- <div class="card-footer">
                <a href="{{ route('settings.update') }}" class="btn btn-primary">Edit Profile</a>
            </div> -->
        </div>
    </div>
@endsection

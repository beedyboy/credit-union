@extends('layouts.app')

@section('title', 'Notification Preferences')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Notification Preferences</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('settings.notification.update') }}">
                @csrf
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="emailNotificationsSwitch" name="email_notifications" value="1" {{ $user['settings']['email_notifications'] ? 'checked' : '' }}>
                        <label class="custom-control-label" for="emailNotificationsSwitch">Email Notifications</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="pushNotificationsSwitch" name="push_notifications" value="1" {{ $user['settings']['push_notifications'] ? 'checked' : '' }}>
                        <label class="custom-control-label" for="pushNotificationsSwitch">Push Notifications</label>
                    </div>
                </div>
                <!-- Add more input fields for other notification preferences -->
                <button type="submit" class="btn btn-primary">Update Preferences</button>
            </form>
        </div>
    </div>
</div>
@endsection

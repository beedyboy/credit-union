@extends('layouts.app')

@section('title', 'Transfer')

@section('page_header')
    <!-- Content Header (Page header) -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Transfer</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Account</a></li>
                <li class="breadcrumb-item active">Transfer</li>
            </ol>
        </div>
    </div>
    <!-- /.content-header -->
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form class="form-horizontal" id="transfer-form" method="post" action="{{ route('transfer.process') }}">
                    @csrf
                    <!-- Transfer From -->
                    <div class="form-group">
                        <label for="transfer-from">Transfer from</label>
                        <input type="text" readonly class="form-control" value="{{ $user['wallet'] }}">
                    </div>
                    <!-- Recipient's Information -->
                    <div class="form-group">
                        <label for="recipient-bank">Recipient's Bank</label>
                        <input type="text" name="bank" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-acc">Account Number / IBAN</label>
                        <input type="text" name="acc" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name">Beneficiary Name</label>
                        <input type="text" name="beneficiary" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="swift-code">Swift Code</label>
                        <input type="text" name="swift" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="postal-code">Postal Code</label>
                        <input type="text" name="postal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="transfer-amount">Amount</label>
                        <input type="number" name="amount" min="0" max="{{ removeComma($user['wallet']) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="transfer-purpose">Description</label>
                        <textarea name="purpose" class="form-control" rows="4" required></textarea>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group">
                        <button id="transfer-btn" type="submit" class="btn btn-primary">Transfer</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection 

@section('footer')
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#transfer-btn').click(function(event) {
                // Prevent default form submission
                event.preventDefault();

                // Serialize form data
                var formData = $('#transfer-form').serialize();

                // Send AJAX request to process transfer
                $.ajax({
                    url: "{{ route('transfer.process') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        // Handle success response
                        alert(response.msg);
                        // Redirect to account page
                        window.location.href = "{{ route('account.dashboard') }}";
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection

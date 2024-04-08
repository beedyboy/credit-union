@extends('layouts.app')

@section('title', 'Account')

@section('content')
<div class="container">
  <h1>Welcome, {{ $user['name'] }}</h1>

  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header">
          Account Summary
        </div>
        <div class="card-body">
          <p>Account Number: {{ $user['account_number'] }}</p>
          <p>Balance: ${{ formatMoney(removeComma($user['wallet']), true) }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Account Details
        </div>
        <div class="card-body">
          <p>Account Holder: {{ $user['name'] }}</p>
          <p>Account Type: {{ $user['account_type'] }}</p>
          <p>Address: {{ $user['location'] }}</p>
          <!-- Add additional account details here -->
        </div>
      </div>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-header">
      Recent Transactions
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Status</th>
              <th>Date</th>
              <th>Description</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach($transactions as $transaction)
            <tr>
              <td>{{ isset($transaction['status']) ? ucfirst($transaction['status']) : '' }}</td>
              <td>{{ $transaction['date'] }}</td>
              <td>{{ $transaction['description'] }}</td>
              <td>
                @if($transaction['amount'] < 0) -${{ formatMoney(abs($transaction['amount']), true) }} @else ${{ formatMoney($transaction['amount'], true) }} @endif </td>
            </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>
@endsection
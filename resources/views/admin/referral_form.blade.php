@extends('admin.master')
    @section('content')
    
    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <h1>Referral Form</h1>
        <form method="post" action="{{route('refer.amount')}}">
            @csrf
            @php
                $amount = \App\Helpers\Helper::fetchReferralAmount();
            @endphp
            <div class="mb-3 col-md-4">
                <label for="referralCode" class="form-label">Referral Amount</label>
                <input type="text" class="form-control" id="referralCode" name="referralCode" value="{{$amount}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endsection
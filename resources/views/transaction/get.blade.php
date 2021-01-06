@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Transactions</div>

                {{-- <div class="card-body"> --}}
                <table class="mt-3 table table-striped table-bordered">
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>
                            <a href="{{ route('get_order_details', ['id'=>$transaction->id]) }}">
                                <div>
                                    Transaction at {{$transaction->created_at}} <br>
                                    Transaction No {{$transaction->transaction_no}} <br>
                                    @if (Auth::user()->role->name == 'admin')
                                    User Id: {{$transaction->user->id}} <br>
                                    Username : {{$transaction->user->username}} <br>
                                    @endif
                                </div>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{-- </div> --}}
            </div>
        </div>
    </div>

</div>
@endsection
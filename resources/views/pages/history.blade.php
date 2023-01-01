@extends('template')
@section('title', 'Transaction History')
@section('content')
    @if (!count($transactions))
        <div class="text-center my-5">
            <p class="display-5">So far, you haven't bought anything.</p>
        </div>
    @else
        <div class="text-center my-5">
            <p class="display-5">Check what you've bought!</p>
        </div>
        <div class="container w-50">
            @foreach ($transactions as $transaction)
                <div class="card bg-light mb-3 p-5">
                    <div class="mb-3">
                        <p class="h4">{{ $transaction->date }}</p>
                    </div>
                    <div class="mb-3">
                        <ul style="margin: 0;">
                            @php
                                $total_price = 0
                            @endphp
                            @foreach ($transaction->transactionDetails as $detail)
                                <table class="table table-borderless w-100">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><li></li></th>
                                            <td class="text-start">{{ $detail->quantity }} pc(s) of {{ $detail->product->name }}</td>
                                            <td class="text-end">Rp. {{ number_format($detail->product->price, 2, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @php
                                    $total_price += $detail->product->price * $detail->quantity
                                @endphp
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <p class="h4">Total Price: Rp. {{ number_format($total_price, 2, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Statement of Account</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <table class="table col-md-12">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date & Time</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Details</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($statements as $statement)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $statement->created_at }}</td>
                                        <td>{{ $statement->amount }}</td>
                                        <td>{{ $statement->type }}</td>
                                        <td>{{ $statement->details }}</td>
                                        <td>{{ $statement->balance }}</td>
                                    </tr>
                                    <?php $i = $i + 1; ?>
                                @endforeach
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

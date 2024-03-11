@extends('frontend.layouts.master')

@section('content')


<section class="bleesed default">
    <div class="container">
        
        <div class="row"> 
            <div class="col-lg-6 mt-2">
                <a href="{{ route('user.eventTicketSales',$eventdtl->id)}}" class="btn-theme bg-secondary text-center">Back</a>

            </div> 
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2 class="fw-bold darkerGrotesque-bold txt-primary mb-3"> Your All Transactions</h2>
            </div>
            {{-- <div class="col-lg-6 d-flex align-items-center justify-content-end fs-5">
                <form action="" class="d-flex">
                    <div class="me-2">
                        <label for="">From</label>
                        <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">
                    </div>
                    <div class="d-flex align-items-end">
                        <div  class="me-2">
                            <label for="">To</label>
                            <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">
                        </div>
                        <button class="btn btn-theme bg-primary m-0" style="height:46px;">
                            <iconify-icon
                                icon="material-symbols:search-sharp"></iconify-icon>
                            </button>
                    </div>
                </form>
            </div> --}}
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <ul class="nav nav-tabs mt-4 justify-content-start fs-5" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="transaction-tab" data-bs-toggle="tab"
                            data-bs-target="#transaction" type="button" role="tab" aria-controls="transaction" aria-selected="true">All transaction</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="moneyIn-tab" data-bs-toggle="tab" data-bs-target="#moneyIn" type="button" role="tab" aria-controls="moneyIn" aria-selected="false">Money in</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="moneyOut-tab" data-bs-toggle="tab" data-bs-target="#moneyOut" type="button" role="tab" aria-controls="moneyOut" aria-selected="false">Money out</button>
                    </li>
                    
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="request-tab" data-bs-toggle="tab" data-bs-target="#request" type="button" role="tab" aria-controls="request" aria-selected="false">Withdraw request</button>
                    </li>

                </ul>
                <div class="tab-content fs-5" id="myTabContent">
                    <div class="tab-pane fade active show" id="transaction" role="tabpanel"
                        aria-labelledby="transaction-tab">
                        <div class="table-responsive shadow-sm px-4">
                            {{-- <table class="table table-theme mt-4 table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Dr Amount</th>
                                        <th scope="col">Cr Amount</th>
                                        <th scope="col">Balance</th>
                                    </tr>
                                </thead>
                                <?php
                                    // $tbalance = $totalInAmount - $totalOutAmount;
                                ?>
                                <tbody>
                                        @foreach ($data as $item)
                                        <tr> 
                                            <td class="fs-16 txt-secondary">{{$item->date}}</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fs-20 txt-secondary fw-bold">{{$item->tran_no}}</span>
                                                </div>
                                            </td>
                                            <td class="fs-16 txt-secondary">
                                                {{$item->description}}
                                            </td>

                                            <td class="fs-16 txt-secondary">
                                                @if ($item->tran_type == "In") {{ number_format($item->amount, 2) }} @endif
                                            </td> 
                                            <td class="fs-16 txt-secondary">
                                                @if ($item->tran_type == "Out") {{ number_format($item->amount, 2) }} @endif
                                            </td> 
                                            <td class="fs-16 txt-secondary">
                                                £{{ number_format($tbalance, 2) }}
                                            </td> 
                                            @php
                                            if ($item->tran_type == "In") {
                                                $tbalance = $tbalance - $item->amount;
                                            } else {
                                                $tbalance = $tbalance + $item->amount;
                                            }
                                            @endphp
                                        </tr> 
                                        @endforeach
                                </tbody>
                            </table> --}}

                            <table class="table table-theme mt-4 table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Reference Id</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Customer Email</th>
                                        <th scope="col">Customer Phone</th>
                                        <th scope="col">Payment Type</th>
                                        <th scope="col">Ticket Type</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Gross</th>
                                        <th scope="col">Fee</th>
                                        <th scope="col">Net</th>
                                        <th scope="col">Balance</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                </thead>
                                <?php
                                    $tbalance = $netsaleamount;
                                    // $tbalance = $netsaleamount;
                                    // $tbalance = $netsaleamount - $totalOutAmount;
                                ?>
                                <tbody>
                                    @foreach ($eventdtl->eventticket as $sale)
                                    @php
                                        $totalfee = $sale->commission + $sale->fixed_fee;
                                        $netamnt = $sale->total_amount - $totalfee;
                                    @endphp
                                    <tr>
                                        <td class="fs-16 txt-primary">{{ \Carbon\Carbon::parse($sale->date)->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fs-20 txt-primary fw-bold text-center">{{$sale->tran_no}}</span>
                                            </div>
                                        </td>
                                        
                                        <td class="fs-16 txt-primary">
                                            {{\App\Models\User::where('id',$sale->user_id)->first()->name}}
                                        </td>
                                        
                                        <td class="fs-16 txt-primary">
                                            {{\App\Models\User::where('id',$sale->user_id)->first()->email}}
                                        </td>
                                        
                                        <td class="fs-16 txt-primary text-center">
                                            {{\App\Models\User::where('id',$sale->user_id)->first()->phone}}
                                        </td>
                                        <td class="fs-16 txt-primary text-center">
                                            {{$sale->payment_type}}
                                        </td>
                                        
                                        <td class="fs-16 txt-primary text-center">
                                            {{$sale->ticket_type}}
                                        </td>
        
                                        <td class="fs-16 txt-primary text-center">
                                            {{$sale->note}}
                                        </td>
        
                                        <td class="fs-16 txt-primary text-center">
                                            £{{ number_format($sale->total_amount, 2) }}
                                        </td>
                                        
                                        <td class="fs-16 txt-primary text-center">
                                            £{{ number_format($totalfee, 2) }}
                                        </td>
                                        
                                        <td class="fs-16 txt-primary text-center">
                                            £{{ number_format($netamnt, 2) }}
                                        </td>
        
                                        <td class="fs-16 txt-primary text-center">
                                            £{{ number_format($tbalance, 2) }}
                                        </td>
                                        @php
                                            $tbalance = $tbalance - $netamnt;
                                        @endphp
        
        
                                        {{-- <td class="fs-16 txt-primary">
                                            <a href="#" target="_blank" class="text-decoration-none bg-primary text-white py-1 px-3 rounded mb-1 text-center"><i class="fa fa-download" style="color: #2196f3;font-size:16px;"></i>  Download</a>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="moneyIn" role="tabpanel" aria-labelledby="moneyIn-tab">
                        <div class="table-responsive shadow-sm px-4">


                            <table class="table table-theme mt-4 table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Ticket Type</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Gross</th>
                                        <th scope="col">Fee</th>
                                        <th scope="col">Net</th>
                                        <th scope="col">Balance</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                </thead>
                                <?php
                                    // $tbalance = $netamount;
                                    $tbalance = $totalInAmount - $totalOutAmount;
                                ?>
                                <tbody>
                                    @foreach ($eventdtl->eventticket as $sale)
                                    @php
                                        $totalfee = $sale->commission + $sale->fixed_fee;
                                        $netamnt = $sale->total_amount - $totalfee;
                                    @endphp
                                    <tr>
                                        <td class="fs-16 txt-primary">{{ \Carbon\Carbon::parse($sale->date)->format('d/m/Y') }}</td>
                                        
                                        <td class="fs-16 txt-primary text-center">
                                            {{$sale->ticket_type}}
                                        </td>
        
                                        <td class="fs-16 txt-primary text-center">
                                            {{$sale->note}}
                                        </td>
        
                                        <td class="fs-16 txt-primary text-center">
                                            £{{ number_format($sale->total_amount, 2) }}
                                        </td>
                                        
                                        <td class="fs-16 txt-primary text-center">
                                            £{{ number_format($totalfee, 2) }}
                                        </td>
                                        
                                        <td class="fs-16 txt-primary text-center">
                                            £{{ number_format($netamnt, 2) }}
                                        </td>
        
                                        <td class="fs-16 txt-primary text-center">
                                            £{{ number_format($tbalance, 2) }}
                                        </td>
                                        @php
                                            $tbalance = $tbalance - $netamnt;
                                        @endphp
        
        
                                        {{-- <td class="fs-16 txt-primary">
                                            <a href="#" target="_blank" class="text-decoration-none bg-primary text-white py-1 px-3 rounded mb-1 text-center"><i class="fa fa-download" style="color: #2196f3;font-size:16px;"></i>  Download</a>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>


                        </div>

                    </div>
                    <div class="tab-pane fade" id="moneyOut" role="tabpanel" aria-labelledby="moneyOut-tab">
                        <div class="data-container">
                            <table class="table table-theme mt-4" id="example3">
                                <thead>
                                    <tr> 
                                        <th scope="col">Date</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Cr Amount</th>
                                        <th scope="col">Total Cr Amount</th>
                                    </tr>
                                </thead>
                                <?php
                                    $tCrbalance = $totalOutAmount;
                                ?>
                                <tbody>
                                    @foreach ($data as $item)
                                    @if ($item->tran_type == "Out")
                                    <tr> 
                                        <td class="fs-16 txt-secondary">{{$item->date}}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fs-20 txt-secondary fw-bold">{{$item->tran_no}}</span>
                                            </div>
                                        </td>
                                        <td class="fs-16 txt-secondary">
                                            {{$item->description}}
                                        </td>
                                        <td class="fs-16 txt-secondary">
                                            {{ number_format($item->amount, 2) }}
                                        </td>
                                        <td class="fs-16 txt-secondary">
                                            £{{ number_format($tCrbalance, 2) }}
                                        </td>
                                        @php
                                        if ($item->tran_type == "Out") {
                                            $tCrbalance = $tCrbalance - $item->amount;
                                        }
                                        @endphp
                                    </tr> 
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="request" role="tabpanel" aria-labelledby="request-tab">

                        <div class="data-container">
                            <table class="table table-theme mt-4" id="example3">
                                <thead>
                                    <tr> 
                                        <th scope="col">Date</th>
                                        <th scope="col">Request ID</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdrawreqs as $item)
                                        <tr> 
                                            <td class="fs-16 txt-secondary">{{$item->date}}</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fs-20 txt-secondary fw-bold">{{$item->req_no}}</span>
                                                </div>
                                            </td>
                                            <td class="fs-16 txt-secondary">
                                                {{$item->note}}
                                            </td>
                                            <td class="fs-16 txt-secondary">
                                                {{ number_format($item->amount, 2) }}
                                            </td>

                                        </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



@endsection

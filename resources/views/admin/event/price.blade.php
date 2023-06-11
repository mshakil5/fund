@extends('admin.layouts.admin')

@section('content')

<!-- content area -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="pagetitle pb-2">
                {{-- <a href="{{route('frontend.eventDetails',$data->id)}}" target="_blank" class="text-decoration-none bg-primary text-white py-1 px-3 rounded mb-1 text-center">{{$data->title}} </a> Event booking record --}}
            </div>
        </div>
    </div>
    <div class="row"> 
        <div class="col-lg-6 mt-2">
            <a href="{{ route('admin.event')}}" class="btn-theme bg-primary text-center">Back</a>
        </div> 
    </div>
    <div id="contentContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background-color: #fdf3ee">
                    <div class="card-header">
                        <h3> All Data</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="example">
                            <thead>
                            <tr>
                                <th style="text-align: center">SL</th>
                                <th style="text-align: center">Type</th>
                                <th style="text-align: center">Ticket Price</th>
                                <th style="text-align: center">Quantity</th>
                                <th style="text-align: center">Available Quantity</th>
                                <th style="text-align: center">Sold Quantity</th>
                                
                                <th style="text-align: center">Total ticket</th>
                                <th scope="text-align: center">Note</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $data)
                                <tr>
                                    <td style="text-align: center">{{ $key + 1 }}</td>
    
                                    <td style="text-align: center" class="fs-16 txt-primary text-center">
                                        {{$data->type}}
                                    </td>
                                    
                                    <td style="text-align: center" class="fs-16 txt-primary text-center">
                                        £{{ number_format($data->ticket_price, 2) }}
                                    </td>
                                    
                                    <td style="text-align: center" class="fs-16 txt-primary text-center">
                                        {{$data->max_person}}
                                    </td>
                                    <td style="text-align: center" class="fs-16 txt-primary text-center">
                                        {{$data->available_qty}}
                                    </td>

                                    <td style="text-align: center" class="fs-16 txt-primary text-center">
                                        {{$data->sold_qty}}
                                    </td>

                                    <td style="text-align: center" class="fs-16 txt-primary text-center">
                                        {{$data->qty}}
                                    </td>

                                    <td style="text-align: center" class="fs-16 txt-primary text-center">
                                        {{$data->note}}
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

@endsection
@section('script')


@endsection
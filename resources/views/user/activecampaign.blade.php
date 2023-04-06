@extends('frontend.layouts.master')
@section('content')


<section class="bleesed default py-5">
    <div class="container"> 
        <div class="row mt-5">
            <div class="col-lg-6">
                <h2 class="fw-bold darkerGrotesque-bold txt-primary mb-3"> List of active campaign</h2>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-end fs-5"> 

                <form action="" class="d-flex">
                    <div class="me-2">
                        <label for="">From</label>
                        <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">

                    </div>
                    <div class="d-flex align-items-end">
                        <div class="me-2">
                            <label for="">To</label>
                            <input type="date" class="form-control fs-5" style="height: 46px;" placeholder="Search">
                        </div>
                        <button class="btn btn-theme bg-primary m-0" style="height:46px;">
                            <iconify-icon icon="material-symbols:search-sharp"></iconify-icon>
                            </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-12 mb-4 mt-5">
                 
                <div class="table-responsive fs-5 shadow-sm  ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> Date</th>
                                <th scope="col">Title</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th> 
                                <th scope="col"> payment method</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12-12-2023</td>
                                <td>lorem ipsum </td>
                                <td>$56</td>
                                <td>Active </td> 
                                <td>card or something</td>
                                <td class="d-flex align-items-center">
                                    <a href="user-campaign-edit.html" class="px-2">
                                        <iconify-icon class="txt-primary" icon="mdi:pencil-outline"></iconify-icon>
                                    </a>
                                    <a href="/user-transaction.html" class="px-2" title="view all transaction">
                                        <iconify-icon icon="ic:outline-remove-red-eye"></iconify-icon>
                                    </a>
                                    <a href="#" class="px-2">
                                        <iconify-icon class="text-danger" icon="bi:trash"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                          

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-lg-6 mx-auto mt-2">
                <a href="create-campaign.html" class="btn-theme bg-primary mx-auto w-50 text-center d-block">Create New Campaign</a>
            </div> 
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
  
</script>
@endsection

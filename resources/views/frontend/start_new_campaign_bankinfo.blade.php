@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="fundriser">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto p-4">
                <div class="inner">
                    
                    <div class="row mt-4">
                        <div class="col-lg-9 mx-auto">
                            <div class="title darkerGrotesque-bold lh-1 fs-3">Tell us a bit more about your fundriser
                            </div>
                            <form action="{{route('startanewfund4')}}" method="post">
                                @csrf
                            
                                <div class="row my-3">
                                    <div class="col-lg-12 mb-3">
                                        <label for="currency" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Currency </label>
                                        <input type="text" name="currency" class="form-control" id="currency">
                                    </div>

                                    <div class="col-lg-12 ">
                                        <label for="name_of_account" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Name of the account</label>
                                        <input type="text" name="name_of_account" class="form-control" id="name_of_account">
                                    </div>
                                    <div class="col-lg-12 ">
                                        <label for="bank_account_country" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Country </label>
                                        <input type="text" name="bank_account_country" class="form-control" id="bank_account_country">
                                    </div>

                                    <div class="col-lg-12 ">
                                        <label for="bank_name" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Bank Name</label>
                                        <input type="bank_name" name="bank_name" class="form-control" id="bank_name">
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label for="bank_account_class" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Bank Account Class </label>
                                        <select name="bank_account_class" id="bank_account_class"  class="form-control">
                                            <option value="">Select</option>
                                            <option value="Personal">Personal</option>
                                            <option value="Corporate">Corporate</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 ">
                                        <label for="bank_account_type" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Bank Account Type </label>
                                        <select name="bank_account_type" id="bank_account_type"  class="form-control">
                                            <option value="">Select</option>
                                            <option value="Checking">Checking</option>
                                            <option value="Saving">Saving</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 ">
                                        <label for="bank_routing" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Bank Routing </label>
                                        <select name="bank_routing" id="bank_routing"  class="form-control">
                                            <option value="">Select</option>
                                            <option value="SWIFT">SWIFT</option>
                                            <option value="BIC">BIC</option>
                                            <option value="Sort Code">Sort Code</option>
                                            <option value="BSB">BSB</option>
                                        </select>
                                    </div>


                                    <div class="col-lg-6">
                                        <label for="iban" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">IBAN </label>
                                        <input type="text" name="iban" class="form-control" id="iban">
                                    </div>
                                    

                                    <div class="col-lg-12">
                                        <label for="bank_verification_doc" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Bank Verification Document</label>
                                        <input type="file" name="bank_verification_doc" class="form-control" id="bank_verification_doc">
                                    </div>
                                        
                                    <button type="submit" class="btn-theme bg-secondary mx-auto mt-4 saveBtn" id="saveBtn">Next</button>

                                    

                                    </form>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('script')
<script>

$(document).ready(function() {
    
});


</script>

@endsection
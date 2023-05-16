@extends('admin.layouts.admin')

@section('content')


<!-- content area -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="pagetitle pb-2">
                Campaign
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ermsg"></div>
        </div>
    </div>


<div id="addThisFormContainer">
    
    
    
    <div class="row ">
        <div class="col-lg-12">
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="basic-tab" data-bs-toggle="tab"
                        data-bs-target="#basic" type="button" role="tab" aria-controls="basic"
                        aria-selected="true">Basic Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cInfo-tab" data-bs-toggle="tab" data-bs-target="#cInfo"
                        type="button" role="tab" aria-controls="cInfo" aria-selected="false">
                    Campaign Information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pInfo-tab" data-bs-toggle="tab"
                        data-bs-target="#pInfo" type="button" role="tab" aria-controls="pInfo"
                        aria-selected="false">Personal Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="bInfo-tab" data-bs-toggle="tab" data-bs-target="#bInfo"
                        type="button" role="tab" aria-controls="bInfo" aria-selected="false">Bank Information</button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="doc-tab" data-bs-toggle="tab" data-bs-target="#doc"
                        type="button" role="tab" aria-controls="doc" aria-selected="false">All Document</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="transaction-tab" data-bs-toggle="tab" data-bs-target="#transaction"
                        type="button" role="tab" aria-controls="transaction" aria-selected="false">Transaction</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="basic" role="tabpanel"
                    aria-labelledby="basic-tab">
                    <div class="data-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="background-color: #fdf3ee">
                                
                                    <div class="card-body">
                                        <div class="tile">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    
                                                    <div>
                                                        <label for="name">Select Your Country</label>
                                                        <select name="country" id="country" class="form-control select2" required>
                                                            <option value="">Select Country</option>
                                                            @foreach ($countries as $cntry)
                                                            <option value="{{$cntry->id}}" @if((isset($data->country_id))&&($data->country_id==$cntry->id)) selected @endif>{{$cntry->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-lg-6">
                                                    
                                                    <div>
                                                        <label for="source">Category</label>
                                                        
                                                        <select name="source" id="source" class="form-control  select2" required>
                                                            <option value="">Select</option>
                                                            <@foreach ($source as $source)
                                                            <option value="{{$source->id}}" @if((isset($data->fundraising_source_id))&&($data->fundraising_source_id==$source->id)) selected @endif>{{$source->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                
                                                </div>
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Fundriser title</label>
                                                        <input type="text" name="title" class="form-control" id="title" value="{{ $data->title }}" required>
                                                        <input type="hidden" name="codeid" class="form-control" id="codeid" value="{{ $data->id }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">

                                                    <div>
                                                        <label for="story" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Tell your story </label>
                                                        <textarea name="story" id="story" class="form-control summernote" required>{{ $data->story }}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                    
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="cInfo" role="tabpanel" aria-labelledby="cInfo-tab">
                    <div class="data-container">
                        <div class="row">
                            <div class="col-lg-12">      
                                <div>
                                    <label for="raising_goal" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">How much would you like to raise?</label>
                                    <input type="number" class="form-control" placeholder="Your starting goal" value="{{ $data->raising_goal }}" id="raising_goal" name="raising_goal">
                                </div>               
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="image" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Upload Feature Image</label>
                                    <input type="file" name="fimage" class="form-control" id="fimage" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="image" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Upload Photo</label>
                                    <input type="file" name="image[]" class="form-control" id="image" multiple required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="preview2">
                                    <div class="row">
                                        @foreach ($data->campaignimage as $img)
                                            <div class="col-3 singleImage my-3"><span id="{{$img->id}}" data-file="{{$img->image}}" class="btn btn-sm btn-danger imageremove2">×</span><img width="120px" height="auto" src="{{asset('images/campaign/'.$img->image)}}"  alt="Image"></div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            <div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Upload Video Link</label>
                                    <input type="text" name="video_link" class="form-control" id="video_link"  value="{{ $data->video_link }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="tagline" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Tagline</label>
                                    <input type="text" name="tagline" value="{{ $data->tagline}}" class="form-control" id="tagline">
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div>
                                    <label for="location" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Location </label>
                                    <input type="text" name="location" class="form-control" id="location" value="{{ $data->location }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="funding_type" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Funding Type</label>
                                    <select name="funding_type" class="form-control" id="funding_type">
                                        <option value="">Select</option>
                                        <option value="Partial" @if ($data->funding_type == "Partial") selected @endif>Partial</option>
                                        <option value="All or Nothing" @if ($data->funding_type == "All or Nothing") selected @endif>All or Nothing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="end_date" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> End Date </label>
                                    <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $data->end_date  }}">
                                </div>
                            </div>
                            <hr>
                    
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="pInfo" role="tabpanel" aria-labelledby="pInfo-tab">
                    <div class="data-container">
                        <div class="row">
                            <div class="col-lg-12">      
                                <div>
                                    <label for="email" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Email</label>
                                    <input type="email" class="form-control" placeholder="Your email" id="email" name="email" value="{{ $data->email }}" required>
                                </div>               
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="name" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="family_name" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Family Name </label>
                                    <input type="text" name="family_name" class="form-control" id="family_name" value="{{ $data->family_name }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="dob" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Date of birth</label>
                                    <input type="date" name="dob" class="form-control" id="dob" value="{{ $data->dob }}" required>
                                </div>
                                
                                
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="phone" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Phone Number </label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $data->phone }}" required>
                                </div>
                                
                                
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="city" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">House Number</label>
                                    <input type="text" name="city" class="form-control" id="city" value="{{ $data->city  }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="street_name" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Street Name</label>
                                    <input type="text" name="street_name" class="form-control" id="street_name" value="{{ $data->street_name  }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="town" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Town </label>
                                    <input type="text" name="town" class="form-control" id="town" value="{{ $data->town }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="postcode" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Post code </label>
                                    <input type="text" name="postcode" class="form-control" id="postcode" value="{{ $data->postcode  }}" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div>
                                    <label for="gov_issue_id" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Government Issued ID</label>
                                    <input type="text" name="gov_issue_id" class="form-control" id="gov_issue_id" value="{{ $data->gov_issue_id  }}" required>
                                </div>
                            </div>
                            
                            <hr>
                    
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="bInfo" role="tabpanel" aria-labelledby="bInfo-tab">
                    <div class="data-container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <label for="name_of_account" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Name of the account</label>
                                    <input type="text" name="name_of_account" class="form-control" id="name_of_account" value="{{ $data->name_of_account }}" required>
                                </div>
                            </div>
                            

                            <div class="col-lg-6">
                                <div>
                                    <label for="bank_name" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Bank Name</label>
                                    <input type="bank_name" name="bank_name" class="form-control" id="bank_name" value="{{ $data->bank_name }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="bank_account_number" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Bank Account Number</label>
                                    <input type="text" name="bank_account_number" class="form-control" id="bank_account_number" value="{{ $data->bank_account_number }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="bank_sort_code" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Bank Sort Code</label>
                                    <input type="text" name="bank_sort_code" class="form-control" id="bank_sort_code" value="{{ $data->bank_sort_code }}" required>
                                </div>
                            </div>

                            
                            <div class="col-lg-12">
                                <div>
                                    <label for="bank_verification_doc" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Bank Verification Document</label>
                                    <input type="file" name="bank_verification_doc" class="form-control" id="bank_verification_doc">
                                </div>
                            </div>

                            

                            <div class="col-lg-12">
                                <div>
                                    
                                    
                                </div>
                            </div>
                            
                            <hr>
                    
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="doc" role="tabpanel" aria-labelledby="doc-tab">
                    <div class="data-container">
                        <div class="row">
                            <div class="col-lg-6">
                                
                                <h1>image modal goes here</h1>

                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                    <div class="data-container">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                
                        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="alltransaction-tab" data-bs-toggle="tab"
                                    data-bs-target="#alltransaction" type="button" role="tab" aria-controls="alltransaction"
                                    aria-selected="true">All transaction</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="moneyIn-tab" data-bs-toggle="tab" data-bs-target="#moneyIn"
                                    type="button" role="tab" aria-controls="moneyIn" aria-selected="false">Money
                                    in</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="moneyOut-tab" data-bs-toggle="tab"
                                    data-bs-target="#moneyOut" type="button" role="tab" aria-controls="moneyOut"
                                    aria-selected="false">Money out</button>
                            </li>
                            
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="alltransaction" role="tabpanel"
                                aria-labelledby="alltransaction-tab">
                                <div class="data-container">
                                    <table class="table table-theme mt-4">
                                        <thead>
                                            <tr> 
                                                <th scope="col">Date</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Comments</th>
                                                <th scope="col">Reference/Voucher no.</th>
                                                <th scope="col">Balance</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        
                                        <tr> 
                                            <td class="fs-16 txt-secondary">23/08/2022</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fs-20 txt-secondary fw-bold">Aim Habonim</span>
                                                    <span class="fs-16 txt-secondary">Online donation</span>
                                                </div>
                                            </td>
                                            <td class="fs-16 txt-secondary">
                                                -£18.00
                                                <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.0527 7.18393C9.96315 7.08574 9.84339 7.03085 9.71876 7.03085C9.59413 7.03085 9.47438 7.08574 9.38478 7.18393L5.96876 11.0621V0.656192C5.96876 0.515295 5.91938 0.380169 5.83147 0.28054C5.74356 0.180912 5.62433 0.124942 5.50001 0.124942C5.37569 0.124942 5.25646 0.180912 5.16856 0.28054C5.08065 0.380169 5.03126 0.515295 5.03126 0.656192V11.0621L1.61525 7.18393C1.52417 7.09921 1.40855 7.05592 1.29087 7.06247C1.17319 7.06902 1.06186 7.12494 0.978549 7.21937C0.895236 7.31379 0.84589 7.43995 0.84011 7.57333C0.834331 7.7067 0.87253 7.83774 0.947278 7.94096L5.16603 12.7222C5.2549 12.822 5.37493 12.8779 5.50001 12.8779C5.6251 12.8779 5.74512 12.822 5.834 12.7222L10.0527 7.94096C10.1408 7.84024 10.1901 7.7042 10.1901 7.56244C10.1901 7.42068 10.1408 7.28465 10.0527 7.18393Z" fill="#003057"/>
                                                </svg> 
                                            </td>
                                            <td class="fs-16 txt-secondary">
                                                **Campaign** Ride4Bonim 2022 Charity ref no 490 
                                            </td>
                                            <td class="fs-16 txt-secondary">
                                                1674651949-186
                                            </td>
                                            <td class="fs-16 txt-secondary">
                                                -£18.00
                                            </td> 
                                        </tr> 
                                    </tbody>
                                </table>
                                </div>
                              
                            </div>
                            <div class="tab-pane fade" id="moneyIn" role="tabpanel" aria-labelledby="moneyIn-tab">..moneyIn.
                            </div>
                            <div class="tab-pane fade" id="moneyOut" role="tabpanel" aria-labelledby="moneyOut-tab">..moneyOut.
                            </div>
                            
                        </div>

                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-12">
            <a href="{{route('admin.campaign')}}" class="btn-theme bg-secondary fs-16 fw-700">Back</a>
            <a id="upBtn" class="btn-theme bg-primary fs-16 fw-700">Update</a>
        </div> --}}
    </div>


</div>

        
</div>


@endsection
@section('script')
<script type="text/javascript">
    $('.summernote').summernote({
        height: 400
    });
</script>
<script>
    
    var storedFiles = [];
    $(document).ready(function () {
        
       

    });

    // images
        /* WHEN YOU UPLOAD ONE OR MULTIPLE FILES */
        $(document).on('change','#image',function(){
            len_files = $("#image").prop("files").length;
            var construc = "<div class='row'>";
            for (var i = 0; i < len_files; i++) {
                var file_data2 = $("#image").prop("files")[i];
                storedFiles.push(file_data2);
                construc += '<div class="col-3 singleImage my-3"><span data-file="'+file_data2.name+'" class="btn ' +
                    'btn-sm btn-danger imageremove2">&times;</span><img width="120px" height="auto" src="' +  window.URL.createObjectURL(file_data2) + '" alt="'  +  file_data2.name  + '" /></div>';
            }
            construc += "</div>";
            $('.preview2').append(construc);
        });

        $(".preview2").on('click','span.imageremove2',function(){
            var trash = $(this).data("file");
            for(var i=0;i<storedFiles.length;i++) {
                if(storedFiles[i].name === trash) {
                    storedFiles.splice(i,1);
                    break;
                }
            }
            $(this).parent().remove();

        });


    
</script>
@endsection
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
<div id="addThisFormContainer">
    
    
    <div class="row ">
        <div class="col-lg-12">
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="transaction-tab" data-bs-toggle="tab"
                        data-bs-target="#transaction" type="button" role="tab" aria-controls="transaction"
                        aria-selected="true">Basic Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="moneyIn-tab" data-bs-toggle="tab" data-bs-target="#moneyIn"
                        type="button" role="tab" aria-controls="moneyIn" aria-selected="false">
                    Campaign Information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="moneyOut-tab" data-bs-toggle="tab"
                        data-bs-target="#moneyOut" type="button" role="tab" aria-controls="moneyOut"
                        aria-selected="false">Personal Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending"
                        type="button" role="tab" aria-controls="pending" aria-selected="false">Bank Information</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="transaction" role="tabpanel"
                    aria-labelledby="transaction-tab">
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
                                                        <option value="{{$cntry->id}}">{{$cntry->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div>
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control">
                                                </div>
                                                <div>
                                                    <label for="house_number">House Number</label>
                                                    <input type="text" id="house_number" name="house_number" class="form-control">
                                                </div>
                                                <div>
                                                    <label for="town">Town</label>
                                                    <input type="text" id="town" name="town" class="form-control">
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="surname">Surname</label>
                                                    <input type="text" id="surname" name="surname" class="form-control">
                                                </div>
            
                                                <div>
                                                    <label for="phone">Phone</label>
                                                    <input type="number" id="phone" name="phone" class="form-control">
                                                </div>
            
                                                <div>
                                                    <label for="street_name">Street Name</label>
                                                    <input type="text" id="street_name" name="street_name" class="form-control">
                                                </div>
            
                                                <div>
                                                    <label for="postcode">Postcode</label>
                                                    <input type="text" id="postcode" name="postcode" class="form-control">
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
                <div class="tab-pane fade" id="moneyIn" role="tabpanel" aria-labelledby="moneyIn-tab">...
                </div>
                <div class="tab-pane fade" id="moneyOut" role="tabpanel" aria-labelledby="moneyOut-tab">...
                </div>
                <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">...
                </div>
            </div>
        </div>
    </div>


</div>

<button id="newBtn" type="button" class="btn-theme bg-primary">Add New</button>
<div class="stsermsg"></div>
    <hr>
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
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center">Username</th>
                                <th style="text-align: center">Country</th>
                                <th style="text-align: center">Raising Goal</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $data)
                                    <tr>
                                        <td style="text-align: center">{{ $key + 1 }}</td>
                                        <td style="text-align: center">{{$data->title}}</td>
                                        <td style="text-align: center">{{$data->user->name}}</td>
                                        <td style="text-align: center">{{$data->country->name}}</td>
                                        <td style="text-align: center">{{$data->raising_goal}}</td>
                                        <td style="text-align: center">
                                            {{-- {{$data->status}} --}}
                                            <div class="form-check form-switch">
                                                <input class="form-check-input campaignstatus" type="checkbox" role="switch"  data-id="{{$data->id}}" id="campaignstatus" @if ($data->status == 1) checked @endif >
                                            </div>
                                        </td>
                                        
                                        <td style="text-align: center">
                                            <a href="{{route('admin.campaignEdit',$data->id)}}"> <i class="fa fa-edit" style="color: #2196f3;font-size:16px;"> </i></a>
                                            <a id="deleteBtn" rid="{{$data->id}}"> <i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>

                                            
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
<script>
    $(function() {
      $('.campaignstatus').change(function() {
        var url = "{{URL::to('/admin/active-campaign')}}";
          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');
           console.log(id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: url,
              data: {'status': status, 'id': id},
              success: function(d){
                // console.log(data.success)
                if (d.status == 303) {
                        pagetop();
                        $(".stsermsg").html(d.message);
                        window.setTimeout(function(){location.reload()},2000)
                    }else if(d.status == 300){
                        pagetop();
                        $(".stsermsg").html(d.message);
                        window.setTimeout(function(){location.reload()},2000)
                    }
                },
                error: function (d) {
                    console.log(d);
                }
          });
      })
    })
</script>
<script>
    
    var storedFiles = [];
    $(document).ready(function () {

        $("#addThisFormContainer").hide();
            $("#newBtn").click(function(){
                // clearform();
                $("#newBtn").hide(100);
                $("#addThisFormContainer").show(300);

            });
            $("#FormCloseBtn").click(function(){
                $("#addThisFormContainer").hide(200);
                $("#newBtn").show(100);
                // clearform();
            });

        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //
            var url = "{{URL::to('/admin/campaign')}}";
            var updateurl = "{{URL::to('/admin/campaign-update')}}";
            // console.log(url);
            $("#addBtn").click(function(){
                // fundraiser create 
                if($(this).val() == 'Create') {
                    var form_data = new FormData();
                    for(var i=0, len=storedFiles.length; i<len; i++) {
                        form_data.append('image[]', storedFiles[i]);
                    }
                    form_data.append("source", $("#source").val());
                    form_data.append("country", $("#country").val());
                    form_data.append("raising_goal", $("#raising_goal").val());
                    form_data.append("video_link", $("#video_link").val());
                    form_data.append("title", $("#title").val());
                    form_data.append("story", $("#story").val());
                    form_data.append("fundraising_for", $("#fundraising_for").val());
                    
                    $.ajax({
                        url: url,
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data:form_data,
                        success: function (d) {
                            if (d.status == 303) {
                                $(".ermsg").html(d.message);
                            }else if(d.status == 300){
                                pagetop();
                                $(".ermsg").html(d.message);
                                window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error: function (d) {
                            console.log(d);
                        }
                    });
                }
                // fundraiser create 
                //Update
                if($(this).val() == 'Update'){

                    var form_data = new FormData();
                    for(var i=0, len=storedFiles.length; i<len; i++) {
                        form_data.append('image[]', storedFiles[i]);
                    }
                    form_data.append("source", $("#source").val());
                    form_data.append("country", $("#country").val());
                    form_data.append("raising_goal", $("#raising_goal").val());
                    form_data.append("video_link", $("#video_link").val());
                    form_data.append("title", $("#title").val());
                    form_data.append("story", $("#story").val());
                    form_data.append("fundraising_for", $("#fundraising_for").val());
                    form_data.append("codeid", $("#codeid").val());
                    
                    $.ajax({
                        url: updateurl,
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data:form_data,
                        success: function (d) {
                            if (d.status == 303) {
                                $(".ermsg").html(d.message);
                            }else if(d.status == 300){
                                pagetop();
                                $(".ermsg").html(d.message);
                                window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error: function (d) {
                            console.log(d);
                        }
                    });
                }
                //Update

            });

            //Edit
            $("#contentContainer").on('click','#EditBtn', function(){
                $accountid = $(this).attr('rid');
                $info_url = url + '/'+$accountid+'/edit';
                $.get($info_url,{},function(d){
                    populateForm(d);
                    pagetop();
                });
            });
            //Edit  end

            //Delete
            $("#contentContainer").on('click','#deleteBtn', function(){
                if(!confirm('Sure?')) return;
                codeid = $(this).attr('rid');
                info_url = url + '/'+codeid;
                $.ajax({
                    url:info_url,
                    method: "GET",
                    type: "DELETE",
                    data:{
                    },
                    success: function(d){
                        if(d.success) {
                            alert(d.message);
                            location.reload();
                        }
                    },
                    error:function(d){
                        console.log(d);
                    }
                });
            });
            //Delete

            function populateForm(data){
                // $("#source").val(data.source);
                // $("#country").val(data.country);
                // $("#raising_goal").val(data.raising_goal);
                // $("#video_link").val(data.video_link);    
                // $("#title").val(data.title);   
                // $("#story").val(data.story);        
                // $("#fundraising_for").val(data.fundraising_for);       
                // $("#codeid").val(data.id);
                // $("#addBtn").val('Update');
                $("#addThisFormContainer").show(300);
                $("#newBtn").hide(100);
            }

            function clearform(){
                $('#createThisForm')[0].reset();
                $("#addBtn").val('Create');
            }

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
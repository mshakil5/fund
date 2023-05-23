@extends('admin.layouts.admin')

@section('content')

<!-- content area -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="pagetitle pb-2">
                Event
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ermsg">
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
                    Event Photos and Time
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="moneyOut-tab" data-bs-toggle="tab"
                        data-bs-target="#moneyOut" type="button" role="tab" aria-controls="moneyOut"
                        aria-selected="false">Event Summery</button>
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
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="user_id" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Select User</label>
                                                        <select name="user_id" id="user_id" class="form-control select2" required>
                                                            <option value="">Select User</option>
                                                            @foreach ($users as $user)
                                                            <option value="{{$user->id}}">{{$user->name}}-{{$user->sur_name}}-{{$user->email}}{{$user->clientid}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Event title</label>
                                                        <input type="text" name="title" class="form-control" id="title">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Event Type</label>
                                                        <input type="text" name="event_type" class="form-control" id="event_type">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div>
                                                        <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Event Category</label>
                                                        <input type="text" name="category" class="form-control" id="category">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Tags</label>
                                                        <input type="text" name="tagline" class="form-control" id="tagline">
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
                <div class="tab-pane fade" id="moneyIn" role="tabpanel" aria-labelledby="moneyIn-tab">
                    <div class="data-container">
                        <div class="row">
                            <div class="col-lg-12">      
                                <div>
                                    <label for="location" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Location</label>
                                    <input type="text" class="form-control" placeholder="Location" id="location" name="location">
                                </div>               
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="image" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Upload Feature Image <small>(1000*700)</small> </label>
                                    <input type="file" name="fimage" class="form-control" id="fimage" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="image" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Upload Photo <small>(711*304)</small></label>
                                    <input type="file" name="image[]" class="form-control" id="image" multiple required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="preview2">
                                    
                                </div>
                            </div>
                            <div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Event Start Time</label>
                                    <input type="datetime-local" id="event_start_date" name="event_start_date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Event End Time</label>
                                    <input type="datetime-local" id="event_end_date" name="event_end_date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Sale Start Time</label>
                                    <input type="datetime-local" id="sale_start_date" name="sale_start_date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="title" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Sale End Time</label>
                                    <input type="datetime-local" id="sale_end_date" name="sale_end_date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="price" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Price </label>
                                    <input type="number" name="price" class="form-control" id="price">
                                </div>
                            </div>
                            <hr>
                    
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="moneyOut" role="tabpanel" aria-labelledby="moneyOut-tab">
                    <div class="data-container">
                        <div class="row">
                            <div class="col-lg-12">      
                                <div>
                                    <label for="summery" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Summery</label>
                                    <input type="text" class="form-control" placeholder="Summery" id="summery" name="summery">
                                </div>               
                            </div>

                            <div class="col-lg-12">
                                <div>
                                    <label for="description" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Event Description</label>
                                    <textarea name="description" id="description" class="form-control summernote"></textarea>
                                </div>
                            </div>
                            
                            
                            
                            <hr>
                    
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-12">
            <input type="button" id="addBtn" value="Create" class="btn-theme bg-primary fs-16 fw-700">
            <input type="button" id="FormCloseBtn" value="Close" class="btn-theme bg-secondary">
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
                                <th style="text-align: center">Event Organizer</th>
                                <th style="text-align: center">Category</th>
                                <th style="text-align: center">Event Start </th>
                                <th style="text-align: center">Event Start </th>
                                <th style="text-align: center">Sale Start </th>
                                <th style="text-align: center">Sale End </th>
                                <th style="text-align: center">Price</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $data)
                                    <tr>
                                        <td style="text-align: center">{{ $key + 1 }}</td>
                                        <td style="text-align: center">
                                            <a href="{{route('admin.eventView',$data->id)}}" class="text-decoration-none bg-primary text-white py-1 px-3 rounded mb-1 text-center">{{$data->title}}</a>
                                        </td>
                                        <td style="text-align: center">{{$data->user->name}}</td>
                                        <td style="text-align: center">{{$data->category}}</td>
                                        <td style="text-align: center">{{$data->event_start_date}}</td>
                                        <td style="text-align: center">{{$data->event_end_date}}</td>
                                        <td style="text-align: center">{{$data->sale_start_date}}</td>
                                        <td style="text-align: center">{{$data->sale_end_date}}</td>

                                        <td style="text-align: center">{{$data->price}}</td>
                                        <td style="text-align: center">
                                            {{-- {{$data->status}} --}}
                                            <div class="form-check form-switch">
                                                <input class="form-check-input eventstatus" type="checkbox" role="switch"  data-id="{{$data->id}}" id="eventstatus" @if ($data->status == 1) checked @endif >
                                            </div>
                                        </td>
                                        
                                        <td style="text-align: center">

                                            <a href="{{route('admin.eventEdit',$data->id)}}"> <i class="fa fa-edit" style="color: #2196f3;font-size:16px;"> </i></a>
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
<script type="text/javascript">
    $('.summernote').summernote({
        height: 200
    });
    
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
<script>
    $(function() {
      $('.eventstatus').change(function() {
        var url = "{{URL::to('/admin/active-event')}}";
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
            var url = "{{URL::to('/admin/event')}}";
            // console.log(url);
            $("#addBtn").click(function(){
                // fundraiser create 
                if($(this).val() == 'Create') {
                    var file_data = $('#fimage').prop('files')[0];
                    if(typeof file_data === 'undefined'){
                        file_data = 'null';
                    }

                    var form_data = new FormData();
                    for(var i=0, len=storedFiles.length; i<len; i++) {
                        form_data.append('image[]', storedFiles[i]);
                    }
                    form_data.append('fimage', file_data);
                    form_data.append("event_type", $("#event_type").val());
                    form_data.append("title", $("#title").val());
                    form_data.append("category", $("#category").val());
                    form_data.append("tagline", $("#tagline").val());

                    form_data.append("location", $("#location").val());
                    form_data.append("event_start_date", $("#event_start_date").val());
                    form_data.append("event_end_date", $("#event_end_date").val());
                    form_data.append("price", $("#price").val());
                    form_data.append("sale_end_date", $("#sale_end_date").val());
                    form_data.append("sale_start_date", $("#sale_start_date").val());

                    form_data.append("summery", $("#summery").val());
                    form_data.append("description", $("#description").val());
                    form_data.append("user_id", $("#user_id").val());
                    
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
                

            });

            

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
@extends('frontend.layouts.master')
@section('content')



<section class="fundriser">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            <div class="title darkerGrotesque-bold lh-1 fs-1">
                                Update event
                            </div>
                            <div class="ermsg"></div>
                            <!-- multistep form -->

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-container">
                                <form id="msform">

                                    <fieldset>
                                        <h3 class="fs-subtitle para fs-6 txt-secondary mb-0"> Step 1</h3>
                                        <h5 class="txt-primary mb-4">Basic Events Info</h5>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{$data->title}}" />
                                        <input type="text" id="event_id" name="event_id" value="{{$data->id}}" />

                                        <input type="text" id="event_type" name="event_type" class="form-control" placeholder="Event type"  value="{{$data->event_type}}" />

                                        <input type="text" id="category" name="category" class="form-control" placeholder="Event Category"  value="{{$data->category}}" />

                                        <input type="text" id="tagline" name="tagline" class="form-control" placeholder="Tags"  value="{{$data->tagline}}" />

                                        <input type="button" name="next" class="next action-button" value="Next" />
                                    </fieldset>
                                    <fieldset>
                                        <h3 class="fs-subtitle para fs-6 txt-secondary mb-0"> Step 2</h3>
                                        <h5 class="txt-primary mb-4">  Events Location & times</h5>

                                        <input type="text" placeholder="Location" id="location" name="location" class="form-control" value="{{$data->location}}" >

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="text-start w-100">
                                                    Event Start <input type="datetime-local" id="event_start_date" name="event_start_date" class="form-control" value="{{$data->event_start_date}}" />
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="text-start w-100">
                                                    Event end <input type="datetime-local" id="event_end_date" name="event_end_date" class="form-control"  value="{{$data->event_end_date}}"/>
                                                </label>
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="text-start w-100">
                                                    Sale Start <input type="datetime-local" id="sale_start_date" name="sale_start_date" class="form-control"  value="{{$data->sale_start_date}}"/>
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="text-start w-100">
                                                    Sale end <input type="datetime-local" id="sale_end_date" name="sale_end_date" class="form-control"  value="{{$data->sale_end_date}}"/>
                                                </label>
                                            </div>
                                        </div> 

                                        <input type="number" placeholder="Price per ticket" id="price" name="price" class="form-control"  value="{{$data->price}}">

                                        <input type="button" name="previous" class="previous action-button"
                                        value="Previous" />

                                        <input type="button" name="next" class="next action-button" value="Next" />
                                    </fieldset>
                                    <fieldset>
                                        <h3 class="fs-subtitle para fs-6 txt-secondary mb-0"> Step 3</h3>
                                        <h5 class="txt-primary mb-4"> Events Photo & Others</h5>
                                        
                                        <label for="" class="w-100 text-start fs-6  txt-secondary">
                                            <big class="text-muted">Upload Event photo</big>
                                            <input type="file" name="image" class="form-control" id="image" multiple> 
                                        </label>
                                        <label for="" class="w-100 text-start fs-6  txt-secondary">
                                            <big class="text-muted">Upload Event Feature photo</big>
                                            <input type="file" name="fimage" class="form-control" id="fimage"> 
                                        </label>
                                        <input type="text" class="form-control" name="summery" id="summery" placeholder="Event summery"  value="{{$data->summery}}"/> 
                                        <textarea name="description" id="description" class="form-control summernote" placeholder="Event description">{!! $data->description !!}</textarea>
                                        <input type="button" name="previous" class="previous action-button"
                                            value="Previous" />
                                        <input type="submit" name="submit" id="updateBtn" class="submit action-button" value="Update" />
                                    </fieldset>

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
    $(function () {
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({ 'transform': 'scale(' + scale + ')' });
                    next_fs.css({ 'left': left, 'opacity': opacity });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({ 'left': left });
                    previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })

    });
</script>
<script type="text/javascript">
    $('.summernote').summernote({
        height: 200
    });
</script>
<script>
    
    var storedFiles = [];
$(document).ready(function () { 
    //header for csrf-token is must in laravel
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    //
    var url = "{{URL::to('/user/update-event')}}";
    // console.log(url);

    $("#updateBtn").click(function(){
        // event create 

            var file_data = $('#fimage').prop('files')[0];
            if(typeof file_data === 'undefined'){
                file_data = 'null';
            }
            var form_data = new FormData();
            for(var i=0, len=storedFiles.length; i<len; i++) {
                form_data.append('image[]', storedFiles[i]);
            }
            form_data.append('fimage', file_data);
            form_data.append("event_id", $("#event_id").val());
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
        // event create 
    });

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

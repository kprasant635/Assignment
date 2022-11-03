@extends("layouts.app")

@section("wrapper")

<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-12">
            <div class="card pd_15">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add / View Users</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Users</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- This session message use for When user add or delete Showing the message. -->
        @if (session('msg'))
        <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show">
            <div class="text-white">{{ session('msg') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row row-cols-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered tbl">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Experience</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users_records as $key=>$users_record)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('image/'.$users_record->image)}}" class="user-img" alt="user avatar"></td>
                                    <td>{{$users_record->name}}</td>
                                    <td style="display:none;" id="user_id">{{Crypt::encrypt($users_record->id)}}</td>
                                    <td>{{$users_record->email}}</td>
                                    @if($users_record->leavedate==!null)
                                    @php
                                    $users_record->leavedate=Carbon\Carbon::now();
                                    @endphp
                                    @endif

                                    <!-- This is custom helper which helps to get experience. -->

                                    <td>{!! Helper::experience($users_record->joindate,$users_record->leavedate) !!}</td>
                                    <td>
                                        <a href="" class="bg-warning text-white pd_db_r1 show_confirm" data-toggle="tooltip" title='Delete'><i class="bx bx-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- User Insert Modal Popup Start -->
        <div class="modal" id="insertModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header pd_11">
                        <h4 class="modal-title">Add Users</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="form-valid" action="{{url('/insert_userdata')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">Email<span class="st_cl">*</span></label>
                                <input type="email" class="form-control" id="email" name="email">

                            </div>
                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">Full Name<span class="st_cl">*</span></label>
                                <input type="text" class="form-control" id="name" name="name">

                            </div>
                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">Date Of Joining<span class="st_cl">*</span></label>
                                <input type="date" class="form-control" id="joindate" name="joindate">

                            </div>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Date Of leaving<span class="st_cl">*</span></label>
                                <input type="date" class="form-control" id="leavedate" name="leavedate">

                            </div>
                            <div class="col-md-6">
                                <div class="form-check t_p">

                                    <input class="form-check-input" type="checkbox" name="status" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Still Working
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="inputFirstName" name="image" class="form-label">Upload Image<span class="st_cl">*</span></label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="col-12">
                                <button type="submit" value="Submit" class="btn btn-primary px-5">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- End User Insert Modal Popup -->

    </div>
</div>
@endsection

@section("script")

<script>
    // this function is use for leave date show hide when still working check
    $(document).ready(function() {

        $('#flexCheckDefault').change(function() {
            if (this.checked) {

                $('#leavedate').attr('disabled', true);
            } else {
                $('#leavedate').attr('disabled', false);
            }



        });
    // End show hide

    //This is use for Form validation 
        $('form[id="form-valid"]').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                name: 'required',
                joindate: 'required',
                leavedate: {

                    required: function(element) {

                        if ($("#flexCheckDefault").is(':checked')) {

                            return false
                        } else {
                            return true
                        }
                    }
                },

                image: 'required',


            },
            messages: {
                email: '<span style="color:red;">*Enter a valid email</span>',
                name: '*<span style="color:red;">This field is required</span>',
                joindate: '*<span style="color:red;">This field is required</span>',
                leavedate: '*<span style="color:red;">This field is required</span>',
                image: '*<span style="color:red;">This field is required</span>',


            },
            submitHandler: function(form) {
                form.submit();
            }
        });

    });

    // End Form Validation
</script>
<!-- Here this script use for sweet alert  -->
<!-- Start -->
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var id = $('#user_id').text();
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "delete_userdata/" + id;
                }
            });
    });
</script>
<!-- End -->
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="assets/js/index3.js"></script>

<script>
    $("html").attr("class", "color-sidebar sidebarcolor3 color-header headercolor1");
</script>
@endsection
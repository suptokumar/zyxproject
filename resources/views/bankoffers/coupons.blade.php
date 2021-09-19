@extends("layout.app")
@section("title",__("ZYX Admin Panel"))
@section("page")
<div class="breadcrumb">
    <h1>ZYX</h1>
    <ul>
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li>View All Custom Pages</li>
    </ul>
</div>
@endsection
@section("content")

            <!-- end of row -->
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{{url('addbankoffers')}}" class="btn btn-info">
                        <i class="nav-icon i-Add"></i>
                        <span class="item-name">Create New Bank Offer</span>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="card o-hidden mb-4">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="w-50 float-left card-title m-0">All Coupons</h3>
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <button class="btn bg-gray-100" type="button" id="dropdownMenuButton_table1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
                                    <a class="dropdown-item" href="{{url('addbankoffers')}}">Create New Bank Offer</a>
                                    <a class="dropdown-item" href="{{url('')}}">Back to Dashboard</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                @if (session('successfully'))
                                <div class="alert alert-success text-center">
                                    {{ session('successfully') }}
                                </div>
                                @endif
                                <table id="user_table" class="table dataTable-collapse text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Icon</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Gateway</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Value</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Test</th>
                                            <th scope="col">Minimum Amount</th>
                                            <th scope="col">Vendors</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i= 1;
                                        @endphp
                                        @forelse ($allpages as $page)
                                            
                                        <tr id="unis{{$page->id}}">
                                            <th scope="row">{{$i++}}</th>   
                                            <td><img src="{{url("".$page->icon)}}" style="width: 50px" alt=""></td>
                                            <td>{{$page->name}}</td>                                            
                                            <td>{{$page->gateway}}</td>                                            
                                            <td>{{$page->type}}</td>                                            
                                            <td>{{$page->value}}</td>                                            
                                            <td>{{$page->description}}</td>                                            
                                            <td>{{$page->test}}</td>                                            
                                            <td>{{$page->min_amount}}</td>                                            
                                            <td>{{$page->vendor}}</td>                                            
                                            <td>
                                                <a href="{{url('editbankoffers')}}/{{$page->id}}" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete_pages" data-toggle="modal" data-target="#dnoeod1d11" onclick="delete_delta_step({{$page->id}},'unis{{$page->id}}');" id="page_delete"  class="text-danger mr-2">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        @empty
                                        <tr>
                                            <td colspan="50" class="text-center text-info">No Bank Offers Found</td>
                                        </tr>
                                        @endforelse                                        
                                    </tbody>
                                </table>


                                <div class="modal fade" id="dnoeod1d11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle-2">Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete it?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary ml-2 fd4_step" data-dismiss="modal">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <script>
                                    function delete_delta_step(id,back_link){
                                        $(".fd4_step").attr("onclick","delete_pages("+id+",'"+back_link+"')");
                                    }
                                    function delete_pages(id,back_link)
                                    {
                                            $.ajax({
                                            url: '{{url("/deletebankoffers")}}',
                                            type: 'POST',
                                            data: {id: id, _token: '{{csrf_token()}}'},
                                            })
                                            .done(function(data) {
                                                let d = JSON.parse(data);
                                                if(d.status==200){
                       
                                                    $("#"+back_link).fadeOut(200);
                                                }
                                                Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: d.message,
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            });

                                            
                                             
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of col-->
            </div>
            <!-- end of row-->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('datatables-styles')
    @include('admin.master-common.datatables.datatable-css')
@stop
<div class="row">
@php $count = 1; @endphp
<!-- Dark table start -->
    <div class="col-12 mt-5">
        <div class="align-content-center" >
            <a href="{{route('ec-register-form', \App\Helpers\BergyUtils::uuid())}}" class="btn btn-success " ><i class="fa fa-user-plus" ></i> Add New Service Provider</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Service Providers</h4>
                <div class="data-tables datatable-dark">
                    <table id="ec-table" class="text-center">
                        <thead class="text-capitalize">
                        <tr>
                            <th>Serial No#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last Updated</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results['ec_managers'] as $content_manager)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$content_manager->name}}</td>
                                <td>{{$content_manager->email}}</td>
                                <td>{{$content_manager->updated_at->diffForHumans()}}</td>
                                @if($content_manager->is_blocked == false)
                                    <td><span class="badge badge-success" >Active</span></td>
                                @else
                                    <td><span class="badge badge-danger" >Blocked</span></td>
                                @endif

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="#" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                    </ul>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark table end -->
</div>
@section('datatables-scripts')
    @include('admin.master-common.datatables.datatable-js')

@stop

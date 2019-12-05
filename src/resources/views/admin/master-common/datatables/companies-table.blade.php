@section('datatables-styles')
    @include('admin.master-common.datatables.datatable-css')
@stop
<div class="row">
    @php $count = 1; @endphp
    <!-- Dark table start -->
    <div class="col-12 mt-5">
        <div class="align-content-center" >
            <a href="{{route('admin-add-company', \App\Helpers\BergyUtils::uuid())}}" class="btn btn-success " ><i class="fa fa-user-plus" ></i> Add New Job Poster</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Job Posters</h4>
                <div class="data-tables datatable-dark">
                    <table id="companies-table" class="text-center">
                        <thead class="text-capitalize">
                        <tr>
                            <th>Serial No#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->phone1}}</td>
                            <td>{{$company->updated_at->diffForHumans()}}</td>

                            <td>
                                <ul class="d-flex justify-content-center">
                                    <li><a href="{{route('admin-jobs-form-with-poster',[$company->id, \App\Helpers\BergyUtils::uuid()])}}" class="text-primary mr-3"><i class="ti-plus"></i></a></li>
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

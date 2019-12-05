
@section('datatables-styles')
    @include('admin.master-common.datatables.datatable-css')
@stop
<div class="row">
@php $count = 1; @endphp
<!-- Dark table start -->
    <div class="col-12 mt-5">
        <div class="align-content-center" >
            <a href="{{route('admin-jobs-form', \App\Helpers\BergyUtils::uuid())}}" class="btn btn-success " ><i class="fa fa-building-o" ></i> Add New Job</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Jobs (Job Listings)</h4>
                <div class="data-tables datatable-dark">
                    <table id="job-table" class="text-center">
                        <thead class="text-capitalize">
                        <tr>
                            <th>Serial No#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Last Updated</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results['jobs'] as $job)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$job->title}}</td>
                                <td>{{\App\Helpers\BergyUtils::strWordCut($job->description,45)}}
                                    <a href="#" data-toggle="modal" data-target="#category-desc-modal" data-title="{{$job->title}}" data-desc="{{$job->description}}" class="open-job-desc" > view more</a>
                                </td>
                                <td>{{\App\Helpers\BergyUtils::get_category_name($job->category_id)}}</td>
                                <td>{{$job->updated_at->diffForHumans()}}</td>
                                @if($job->is_active == true)
                                    <td><span class="badge badge-success" >Active</span></td>
                                @else
                                    <td><span class="badge badge-danger" >Deactivated</span></td>
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
    @include('all-common.modals.full-job-category-description')
</div>
@section('datatables-scripts')
    @include('admin.master-common.datatables.datatable-js')
    @include('all-common.scripts.all-common-scripts')
@stop

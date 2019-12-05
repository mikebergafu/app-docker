@section('datatables-styles')
    @include('admin.master-common.datatables.datatable-css')
@stop
<div class="row">
@php $count = 1; @endphp
<!-- Dark table start -->
    <div class="col-12 mt-5">
        <div class="align-content-center" >
            <a href="{{route('admin-job-categories-form', \App\Helpers\BergyUtils::uuid())}}" class="btn btn-success " ><i class="fa fa-building-o" ></i> Add New Job Keyword</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Job Categories (Job Keywords)</h4>
                <div class="data-tables datatable-dark">
                    <table id="job-category-table" class="text-center">
                        <thead class="text-capitalize">
                        <tr>
                            <th>Serial No#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Last Updated</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results['categories'] as $category)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{\App\Helpers\BergyUtils::strWordCut($category->description,45)}}
                                    <a href="#" data-toggle="modal" data-target="#catory-desc-modal" data-title="{{$category->name}}" data-desc="{{$category->description}}" class="open-category-desc" > view more</a>
                                </td>
                                <td>{{$category->updated_at->diffForHumans()}}</td>
                                @if($category->is_active == true)
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

<!-- subscribe Modal -->
<div class="modal fade text-center py-5" id="viewMoreModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Job Application Details
                <button type="button" class="close text-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <p class="text-justify">
                            {{$data}}
                        </p>
                    </div> <!-- card-body.// -->
                </div>
            </div>
        </div>
    </div>
</div>

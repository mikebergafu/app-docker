<form id="frm-search-job-by-category" method="post" action="{{route('jobs-by-categories-search',\App\Helpers\BergyUtils::uuid())}}">
    @csrf
    <fieldset>
        <div class="col-md-7 col-sm-7 no-pad">
            <select class="selectpicker" id="category_id" name="category_id">
                @include('subscriber.select.categories-select')
            </select>
        </div>
        <div class="col-md-5 col-sm-5 no-pad">
            <input type="submit" id="btn-search-job" class="btn seub-btn" value="submit"/>
        </div>
    </fieldset>
</form>

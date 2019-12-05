<div class="well" data-bind="fileDrag: multiFileData">
    <div class="form-group row">
        <div class="col-md-6">
            <!-- ko foreach: {data: multiFileData().dataURLArray, as: 'dataURL'} -->
            <img style="height: 100px; margin: 5px;" class="img-rounded  thumb" data-bind="attr: { src: dataURL }, visible: dataURL">
            <!-- /ko -->
            <div data-bind="ifnot: fileData().dataURL">
                <label class="drag-label">Drag files here</label>
            </div>
        </div>
        <div class="col-md-6">
            <input type="file" multiple data-bind="fileInput: multiFileData, customFileInput: {
              buttonClass: 'btn btn-success',
              fileNameClass: 'disabled form-control',
              onClear: onClear,
            }" accept="image/*">
        </div>
    </div>
</div>

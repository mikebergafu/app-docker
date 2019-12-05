<div class="well" data-bind="fileDrag: fileData">
        <div class="form-group row">
            <div class="col-md-6">
                <img style="height: 125px;" class="img-rounded  thumb" data-bind="attr: { src: fileData().dataURL }, visible: fileData().dataURL">
                <div data-bind="ifnot: fileData().dataURL">
                    <label class="drag-label">Drag file here</label>
                </div>
            </div>
            <div class="col-md-6">
                <input type="file" data-bind="fileInput: fileData, customFileInput: {
              buttonClass: 'btn btn-success',
              fileNameClass: 'disabled form-control',
              onClear: onClear,
            }" accept="image/*">
            </div>
        </div>
    </div>

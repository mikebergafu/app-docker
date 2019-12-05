<div id="page-wrapper">
    <div class="graphs">
        <h3 class="blank1">Settings</h3>
        <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="checkbox" class="col-sm-2 control-label">Subscribed</label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline"><label>
                                    @if($sub_status === '1')
                                    <input type="checkbox" checked id="is_subscribed" name="is_subscribed">
                                    @else
                                        <input type="checkbox" id="is_subscribed" name="is_subscribed">
                                    @endif
                                    Status
                                </label>
                            </div>
                          </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<form class="form">
    <div class="card-body">
        <div class="form-group">
            <label>Description<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="item_description" placeholder="Enter item description"/>
        </div>
        
     
        <div class="form-group">
            <label>Price<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" >₱</span></div>
                <input type="text" class="form-control" id="item_price" placeholder="99.9"/>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-12 col-md-2 col-form-label">Fix Price<span class="text-danger">*</span></label>
            <div class="col-12 col-md-3">
                <span class="switch switch-icon">
                    <label>
                        <input type="checkbox" name="select" id="chk_fix_price" value="N">
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
        
    </div>
</form>  
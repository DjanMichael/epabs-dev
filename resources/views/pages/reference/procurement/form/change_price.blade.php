<form class="form" onSubmit="return false;">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-12 col-md-6">
                <label>Price<span class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" >₱</span></div>
                    <input type="text" class="form-control" id="procurement_medicine_price_id"/>
                    <input type="text" class="form-control number" id="change_item_price" placeholder="99.9" required/>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label>Effective Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="change_effective_date" required/>
            </div>
        </div>
    </div>
</form>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModalCenter">List New Brand</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">New Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" onSubmit="return addBrandFormValidate();">
                <div class="modal-body">
                    <!-- Add Brand Form Start -->                   
                    <div class="col-md-12">
                        <div class="account-sign-in">
                            <h5 class="text-center modi-sm">Add Brand</h5>
                            <h6 class="settingPageErrors text-center bg-light p-2"><?php add_brand(); ?></h6>
                            
                            <div class="form__div">
                                <input type="text" class="form__input" placeholder=" " name="brandName" id="brandName">
                                <label for="brandName" class="form__label">Brand Name</label>
                            </div>

                            <div class="form__div mb-5">
                                <label for="brandDesc">Brand Description</label>
                                <textarea name="brandDesc" class="textarea form-control" id="brandDesc" cols="" rows="2"></textarea>
                            </div>

                            <div class="form__div no-border">
                                <input type="file" name="brandPic" id="brandPic">
                            </div>                                        
                        </div>
                    </div>
                    <!-- Add Brand Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn bg-primary" value="Add Brand" name="addBrand">
                </div>
            </form>  
        </div>
    </div>
</div>


<!-- Show Brand Table Start -->
<table class="table">
    <tr>
        <th>ID</th>
        <th>Brand Name</th>
        <th>Brand Description</th>
        <th>Brand Logo</th>
        <th></th>
    </tr>
    
    <?php show_all_brands(); ?>
</table>
<!-- Show Brand Table End -->
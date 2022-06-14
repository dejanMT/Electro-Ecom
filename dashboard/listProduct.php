<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#listProduct">List New Product</button>

<!-- Modal -->
<div class="modal fade" id="listProduct" tabindex="-1" role="dialog" aria-labelledby="listProductTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listProductTitle">New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" onSubmit="return addProductFormValidate();">
                <div class="modal-body">                   
                    <div class="col-md-12">
                        <div class="account-sign-in">
                            <h5 class="text-center modi-sm">Add Product</h5>
                            <h6 class="settingPageErrors text-center bg-light p-2"><?php add_product(); ?></h6>
                            
                            <div class="form__div">
                                <input type="text" class="form__input" placeholder=" " name="productName" id="productName">
                                <label for="productName" class="form__label">Product Name</label>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form__div">
                                        <input type="text" class="form__input" placeholder=" " name="productPrice" id="productPrice">
                                        <label for="productPrice" class="form__label">Product Price</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form__div">
                                        <input type="text" class="form__input" placeholder=" " name="productQuantity" id="productQuantity">
                                        <label for="productQuantity" class="form__label">Product Quantity</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form__div mb-5">
                                <label for="productDesc">Product Description</label>
                                <textarea name="productDesc" class="textarea form-control" cols="" rows="2" id="productDesc"></textarea>
                            </div>       
                            
                            <div class="form__div">
                                <label for="productPic">Product Image</label>
                                <input type="file" name="productPic" id="productImg">
                            </div> 
                        </div>
                    </div>
                    <!-- Add Brand Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn bg-primary" value="Add Product" name="addProduct">
                </div>
            </form>  
        </div>
    </div>
</div>


<!-- Show Brand Table Start -->
<table class="table">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th></th>
        <th>Product Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th></th>
    </tr>
    
    <?php show_all_products(); ?>
</table>
<!-- Show Brand Table End -->
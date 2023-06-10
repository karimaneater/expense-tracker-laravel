<!-- Modal -->
<div class="modal fade" id="editExpenseCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Edit Expense Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="expenseCategoryForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="expenseCategoryId">
                    <div id="expenseCategoryError" class="alert alert-danger" role="alert" hidden></div>
                    <div class="form-floating mb-3">
                        <input type="text" class="expense_category form-control text-capitalize" value="" name="expense_category" id="expense_category" placeholder="Category Name">
                        <label for="expense_category">Category Name</label>
                        </div>
                    <div class="form-floating">
                        <input type="text" class="expense_description form-control" value="" name="expense_description" id="expense_description" placeholder="Category Description">
                        <label for="expense_description">Category Description</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="editExpenseCategorySubmitBtn btn btn-primary btn-sm">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal -->

<div class="modal fade" id="expensesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Create Expenses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="expensesForm">
                @csrf
                <div class="modal-body">
                    <div id="expensesError" class="alert alert-danger" role="alert" hidden></div>
                    <div class="mb-3">
                        <select name="expense_category_id" id="expense_category_id" class="form-control">
                                <option value="" hidden>Select Category</option>
                            @foreach ($expenseCategory as $category)
                                <option value="{{$category['id']}}">{{$category['expense_category']}}</option>
                            @endforeach
                        </select>

                        </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" min="1" value="" name="amount" id="amount" placeholder="Amount">
                        <label for="amount">Amount</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" value="" name="entry_date" id="entry_date" placeholder="Entry Date">
                        <label for="entry_date">Entry Date</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="expensesSubmitBtn" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



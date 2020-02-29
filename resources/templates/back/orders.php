
<div class="row">
    <div class="col-md-12">
        <p class="text-center alert-success"><?php display_message(); ?></p>
        <table class="table table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Transaction</th>
                <th>Currency</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            <?php display_orders(); ?>
            </tbody>
        </table>
    </div>
</div>
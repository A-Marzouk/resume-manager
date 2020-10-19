<div role="tabpanel" class="tab-pane" id="search_links">
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Search name</th>
            <th scope="col">Client's email</th>
        </tr>
        </thead>
        <tbody>
        <? $i=1; ?>
        <? foreach ($searches as $search):?>
        <?php if( App\Client::where('id',$search->client_id)->first() != null): ?>
            <tr>
                <th scope="row">
                <?php echo e($i); ?>

                <td><a href="/search/<?php echo e($search->id); ?>" target="_blank"><?php echo e($search->name); ?></a>
                </td>
                <th scope="row"><?php echo e(App\Client::where('id',$search->client_id)->first()->email); ?></th>

            </tr>
        <?php endif; ?>

        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>
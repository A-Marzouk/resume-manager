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
        @if( App\Client::where('id',$search->client_id)->first() != null)
            <tr>
                <th scope="row">
                {{$i}}
                <td><a href="/search/{{$search->id}}" target="_blank">{{$search->name}}</a>
                </td>
                <th scope="row">{{App\Client::where('id',$search->client_id)->first()->email}}</th>

            </tr>
        @endif

        <? $i++;?>
        <? endforeach;?>
        </tbody>
    </table>
</div>
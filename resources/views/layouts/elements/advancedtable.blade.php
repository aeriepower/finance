<div class="panel panel-default">
    <div class="panel-heading">Advanced Table</div>
    <div class="panel-body">
        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
            <thead>
            <tr>
                @if(!empty($tableData))
                    @foreach($tableData[0]->getAttributes() as $key => $value)
                        <th>{{ $key }}</th>
                    @endforeach
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($tableData as $element)
            <tr>
                @foreach($element->getAttributes() as $key => $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

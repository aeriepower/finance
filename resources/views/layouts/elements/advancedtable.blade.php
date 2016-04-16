<div class="panel panel-default">
    <div class="panel-heading">
        <a type="button" class="btn btn-success">
            <i class="glyphicon glyphicon glyphicon-plus icon-list-alt"></i> {{ ucfirst(trans('helper.add')) . ' ' . $title }}
        </a>
    </div>
    <div class="panel-body">
        <table
                data-toggle="table"
                data-show-refresh="false"
                data-show-toggle="true"
                data-show-columns="true"
                data-search="true"
                data-pagination="true"
                data-sort-name="name"
                data-sort-order="desc">
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

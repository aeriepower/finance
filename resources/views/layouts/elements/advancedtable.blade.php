<div class="panel panel-default">
    <!--div class="panel-heading">
    </div-->
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
                    @if(!empty($tableData[0]))
                        @foreach($tableData[0]->getAttributes() as $key => $value)
                                <th>{{ ucfirst(trans('advancedtable.' . $key)) }}</th>
                        @endforeach
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($tableData as $element)
                    <tr>
                        @foreach($element->getAttributes() as $key => $value)
                            <td>
                                @if($key == 'id')
                                    <a href="{!! route('transactions.show', $value) !!}" class="btn btn-info">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </a>
                                @elseif($key == 'concept')
                                    <a href="{!! route('concept', $value) !!}">
                                        {{ ucfirst(strtolower($value)) }}
                                    </a>
                                @else
                                    {{ ucfirst(strtolower($value)) }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

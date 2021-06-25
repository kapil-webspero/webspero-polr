<div class="card table-card">
    <div class="card-header">
        <h3>{{ __('Links')}}</h3>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                <li><i class="ik ik-minus minimize-card"></i></li>
                <li><i class="ik ik-x close-card"></i></li>
            </ul>
        </div>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>{{ __('Link Ending')}}</th>
                        <th>{{ __('Clicks')}}</th>
                        <th>{{ __('Date')}}</th>
                        <th>{{ __('Creator')}}</th>
                        <th>{{ __('Status')}}</th>
                        <th>{{ __('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($links as $link)
                        <tr>
                            <td>{{$link->short_url}}</td>
                            <td>{{$link->clicks}}</td>
                            <td>{{$link->created_at}}</td>
                            <td>{{$link->creator}}</td>
                            <td>
                                @if($link->is_disabled)
                                  <div class="p-status bg-red"></div>
                                @else
                                  <div class="p-status bg-green"></div>
                                @endif
                            </td>
                            <td>
                                <a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </td>
                        </tr>
                    @empty
                        <p>No Links</p>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

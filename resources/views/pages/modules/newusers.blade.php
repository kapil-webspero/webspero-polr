<div class="card new-cust-card">
    <div class="card-header">
        <h3>{{ __('New Users')}}</h3>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                <li><i class="ik ik-minus minimize-card"></i></li>
                <li><i class="ik ik-x close-card"></i></li>
            </ul>
        </div>
    </div>
    <div class="card-block">
      @forelse ($users as $user)
          <div class="align-middle mb-25">
            {{$user->username}}
            <div >
              <h6>{{ $user->email}}</h6>
              <span class="status deactive text-mute">{{date('d-m-Y',strtotime($user->created_at))}}</span>
            </div>
          </div>
      @empty
          <p>No users</p>
      @endforelse
    </div>
</div>

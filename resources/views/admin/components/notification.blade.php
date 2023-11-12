@if(session('notification'))
                            <div class="alert alert_warning" role="alert">
                                {{ session('notification') }}
                            </div>
@endif
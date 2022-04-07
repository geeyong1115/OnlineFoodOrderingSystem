<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="margin-right:-50vw">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                {{-- <i class="fa fa-sign-out" style="font-size:36px"></i> --}}
                <a style="color: white" class="dropdown-item fa fa-sign-out" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">                                        {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </button>
        </div>
    </nav>
</div>
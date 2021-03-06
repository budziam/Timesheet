<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#navbar"
                    aria-expanded="false"
                    aria-controls="navbar"
            >
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('app.home.index') }}">
                {{ config('app.name') }}
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            @if($user !== null)
                @include('app.layout.includes.navbar-user')
            @endif
        </div>
    </div>
</nav>
<div class="container">
    <!-- If loged in then show button to logout(FORM with POST method) -->
    @if (Auth::check())
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" style="margin-top: 35px;">Logout</button>
        </form>
    @endif
</div>
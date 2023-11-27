<h2>Ini adalah dashboard, {{ auth()->user()->name; }}</h2>
<h2>Kamu login sebagai, {{ auth()->user()->role; }}</h2>

<form action="/logout" method="POST">
    @csrf
    <button type="submit"> Logout</button>
</form>
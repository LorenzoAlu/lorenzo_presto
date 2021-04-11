<html>
<style>
    .card {
        border: 1px solid blue;
        border-radius: 10px;
        padding: 10px;
        width: 150px;
        height:250px;
    }

    .d-flex {
        display: flex;
        justify-content: space-evenly;
        margin: 5px 10px 5px 10px
    }

</style>

<h1>Presto.it</h1>
<h2>Ultimi annunci</h2>
{{ $bag['messaggio'] }}
<div class="d-flex">
    @foreach ($announcements as $announcement)
        <div class="card">
            <h2>{{ $announcement->title }}</h2>
            <p>{{ $announcement->price }}</p>
            <p>{{substr( $announcement->body ,0 , 10) }}...</p>
        </div>
    @endforeach
</div>
{{-- {{dd($announcements)}} --}}
<h4>Non vuoi ricevere piu la newsletter?<a href="http://127.0.0.1:8000/users/deleteNewsletter">clicca qui!</a> </h4>

</html>

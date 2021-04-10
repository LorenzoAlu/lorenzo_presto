<html>
   
   <h1>Presto.it</h1>
   <h2>Ultimi annunci</h2>
   {{ $bag['messaggio'] }}   
    @foreach ($announcements as $announcement)
    <h2>{{$announcement->title}}</h2>
    <p>{{$announcement->price}}</p>
    <p>{{$announcement->body}}</p>

    @endforeach

</html>
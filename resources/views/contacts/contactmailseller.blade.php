<html>
    <body>
        <style>
            body{
                display: flex;
                justify-content: center;
                margin: 10px;
                text-align: center;
            }
            .m-dettagli{
                margin-top: 50px;
            }

        </style>

        <div class="card">
            <h1>Hai ricevuto un messaggio per il tuo annuncio</h1>
            <h2>Email ricevuta da: {{$bag['name']}}</h2>
            <div><small>Email utente: {{$bag['email']}}</small></div>
            <p class="m-dettagli">Dettagli richiesta:</p>
            <p>{{$bag['body']}}</p>
        </div>
        
    </body>
</html>
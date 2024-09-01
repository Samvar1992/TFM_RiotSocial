<div class="contenedor">
    <h1>{{$item->titulo}}</h1>
    @if($item->juego==1)
        <img src="storage/League-of-Legends-logo.jpg" alt="LeagueOfLegends LOGO"/>
    @elseif($item->juego==2)
        <img src="/RiotSocial/resources/images/League-of-Legends-Wild-Rift-logo.jpg" alt="LeagueOfLegends WildRift LOGO"/>
    @elseif($item->juego==3)
        <img src="/RiotSocial/resources/images/Valorant-logo.png" alt="Valorant LOGO"/>
    @else
        <p>No hay imagen</p>
    @endif
    <p>{{$item->resumen}}</p>


</div>
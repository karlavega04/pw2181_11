var marvel= function()
{
	var Buscar=function(){
		var personaje=$("#txtPersonaje").val();
		var url="http://gateway.marvel.com/v1/public/characters?ts=1&apikey=67788e74df746a1523d8ebb504ee1008&hash=cf5ec9bfa5a156f031a69417cd0e012c&nameStartsWith=";
		var cantidadComics=0;
		var comics="";
		
		url=url+personaje;
		$.ajax({	
			url:url,
			dataType: "json",
			success:function(response)
			{
 				if(response.code==200)//Si es Ok
 				{
 					$("#nombre").attr("src",response.data.results[0].name);
 					$("#foto").attr("src",response.data.results[0].thumbnail.path+"."+response.data.results[0].thumbnail.extension);
 					cantidadComics=response.data.results[0].comics.returned;
 				}
			} 
		});
	}
    $("#btnBuscar").on("click",Buscar);
}
$(document).ready(marvel);

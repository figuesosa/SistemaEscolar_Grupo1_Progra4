function init(){

    $("#login").val("");
    $("#clave").val("");
    
}
function verificar()
{
    var usu=login.value;
    var cla=clave.value;


    alert( usu+"Verific para verific "+cla);
    $.post("../ajax/usuario.php?opc=verificar",
        {"usu":usu,"clave":cla},
        function(data)
    {
        
        alert (data);
        if (data=="si")
        $(location).attr("href","administrativos.php");
        else
        alert ("EL usuario no es correcto");

        
    });


}
init();
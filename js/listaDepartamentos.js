function listaDepartamentos(){
                         
var consulta = $("#cede"+$("#empresa").val()).val()+$("#empresa").val();
                      
//hace la búsqueda
$("#listaDepartamentos").delay(1000).queue(function(n) {      
                           
  $("#listaDepartamentos").html('<img src="img/loading.gif">');
                           
        $.ajax({
              type: "POST",
              url: "scripts/scriptListDepartament.php",
              data: "b="+consulta,
              dataType: "html",
              error: function(){
                    alert("error petición ajax");
              },
              success: function(data){                                                      
                    $("#listaDepartamentos").html(data);
                    n();
              }
  });
                           
});
                          
}
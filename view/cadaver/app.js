
$(document).ready(function()
{
// função select dinamico para listar disciplina por classe
// // turma



$(".camara").change(function()
{
var id_camara=$(this).val();
var post_id = 'id='+ id_camara;
// alert(post_id);
$.ajax
({
type: "POST",
url: "ajax.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".gaveta").html(cities);
} 
});

});
// fim função select dinamico para listar disciplina por classe


});

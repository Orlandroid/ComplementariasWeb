function Editar(id){
    document.getElementById('accion').value = 'Editar';
    document.getElementById('accion').name = 'actualizar';
    document.getElementById('id').value = id;
    document.getElementById('accion').style.backgroundColor="teal";
}

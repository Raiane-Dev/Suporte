const button = document.getElementById('continuar');
const abrir = document.getElementById('abrir');
const fechar = document.getElementById('fechar');

button.addEventListener('click', (e)=>{
    abrir.style.display = "flex";
    fechar.style.display = "none";
});
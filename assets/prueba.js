const BtnComprar 	= document.querySelectorAll(".agregar-carrito");
let BtnUsuario 		= document.getElementById('usuario');
let BtnRegistrar 	= document.getElementById('btn-registrarCliente');

//Botones: cerrar.
let BtnCerrarInfo 	= document.getElementById('cerrar-informacion');//Cerrar ventana de información.
let BtnCerrar 			= document.getElementById('cerrar');//Cerrar formulario de registro de cliente.

//Variables de cierre.
let form = 0;
let info = 0;

//Formulario: Login.
BtnUsuario.addEventListener('click', ()=>{
	document.getElementById('form-login').classList.toggle('form-login--activo');
});

//Información.
BtnComprar.forEach(boton => {
	boton.addEventListener("click", ()=>{
    info++;
    if(info==1){
      document.getElementById('informacion').classList.toggle('informacion--activo');
    }
  });
});

BtnCerrarInfo.addEventListener('click', ()=>{
	info = 0;
	document.getElementById('informacion').classList.toggle('informacion--activo');
});

//Formulario: Cliente.
BtnRegistrar.addEventListener('click', ()=>{
	info = 0;
	document.getElementById('informacion').classList.toggle('informacion--activo');
	document.getElementById('form-comprar').classList.toggle('form-comprar--activo');
});

BtnCerrar.addEventListener('click', ()=>{
  document.getElementById('form-comprar').classList.toggle('form-comprar--activo');
});

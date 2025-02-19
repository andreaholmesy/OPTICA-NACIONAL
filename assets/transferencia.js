let BtnPedido = document.getElementById('procesar-pedido');//Botón para procesar la compra.
let BtnPago   = document.getElementById('BtnPago');//Botón para abrir el formulario de transferencia.

//Botones para cerrar ventanas:
let BtnCerrarInfoTR = document.getElementById('CerrarInfo-TR');//Cerrar ventana de información: transferencia.
let BtnCerrarFormTR = document.getElementById('CerrarForm-TR');//Cerrar formulario de transferencia.

//Variables de cierre.
let infoTR = 0;
let formTR = 0;

//Ventada de información: transferencia.
BtnPedido.addEventListener('click', ()=>{
  infoTR++;
  if(infoTR==1){
    document.getElementById('info-transferencia').classList.toggle('info-transferencia--activo');
  }
});

BtnCerrarInfoTR.addEventListener('click', ()=>{
  infoTR = 0;
  document.getElementById('info-transferencia').classList.toggle('info-transferencia--activo');
});

//Formulario: transferencia.
BtnPago.addEventListener('click', ()=>{
  infoTR = 0;
  document.getElementById('info-transferencia').classList.toggle('info-transferencia--activo');
  document.getElementById('form-transferencia').classList.toggle('form-transferencia--activo');
})

BtnCerrarFormTR.addEventListener('click', ()=>{
  document.getElementById('form-transferencia').classList.toggle('form-transferencia--activo');
});

const formulario = document.querySelector('#myform');
const alerta = document.querySelector('#alertaDiv');
const selectColonia = document.querySelector('#coloniaS');
const cp2 = document.querySelector('#codigo_postal');

window.addEventListener('load' , ()=>{

cp2.addEventListener('keyup', getCP);
formulario.addEventListener('submit', validarCampos);


} );

function getCP(e){
    e.preventDefault();
    var x = cp2;
    console.log(cp2.value);
    x.value = x.value.toUpperCase();
    consultarApi(x.value);
}

function validarCampos (e){
    e.preventDefault();
    //validar
    const nombre = document.querySelector('#first_name').value;
    const apellidoPaterno= document.querySelector('#last_name').value;
    const apellidoMaterno = document.querySelector('#last_name2').value;
    const curp = document.querySelector('#curp').value;
    const sexo = document.querySelector('#sexo').value;
    const fecha = document.querySelector('#fecha').value;
    const email = document.querySelector('#email').value;
    const contrasena = document.querySelector('#contrasena').value;
    const telefono = document.querySelector('#telefono').value;
   // const colonia = document.querySelector('#colonia');
    const  calle = document.querySelector('#calle').value;
    const numero = document.querySelector('#num_ext').value;
    const cp = document.querySelector('#codigo_postal').value;
    const cp2 = document.querySelector('#codigo_postal');
    const municipio = document.querySelector('#municipio').value;
    const estado = document.querySelector('#estado').value;
    const tipode= document.querySelector('#tipode').value;
    const escuela= document.querySelector('#escuela').value;
    const formacion= document.querySelector('#formacion_tecnica').value;
    const  localidad = document.querySelector('#localidad').value;
    const programaAcademico = document.querySelector('#codigo_postal').value;
    const promedio = document.querySelector('#promedio').values;
    const semestre = document.querySelector('#semestre').value;
    const opcion = document.querySelector('#opcion').value;


    if(nombre==='' || apellidoPaterno==='' || apellidoMaterno==='' || curp==='' || sexo===''|| fecha===''|| email==='' || contrasena===''
    || telefono==='' || calle==='' || numero==='' || cp=== '' || municipio==='' || estado===''
    || escuela===''|| formacion==='' || localidad==='' || programaAcademico==='' || semestre==='' || opcion==='' || promedio==='' || tipode==='' ){
        mostrarAdevertencia('Todos los campos son obligatorios');
        return;
    }


    if(!curpValida(curp)){
        mostrarAdevertencia('Curp Invalido');
        return;
    }

    if(!validarEmail(email)){
        mostrarAdevertencia('Email invalido');
        return;
    }

    if (validaNumero(telefono)){
        mostrarAdevertencia("Telefono invalido inserte digitos")
        return;
    }

    if(validaNumero(numero)){
        mostrarAdevertencia("Numero Exterior invalido inserte digitos")
        return;
    }

    if(validaNumero(cp)){
        mostrarAdevertencia("Codigo Postal invalido inserte digitos")
        return;
    }
   // if(validaNumero(promedio)){
     //   mostrarAdevertencia("Promedio Invalido inserte digitos");
       // return;
    //}
    

   
    if(validaNumero(opcion)){
        mostrarAdevertencia("Opcion invalida inserte Digitos");
        return;
    }

   

//consultarApi(cp);





    console.log(sexo);
    console.log(fecha);

    console.log(nombre);
    console.log("TODO BIEN");
    formulario.submit();
}

function obtenerCP(){
    const cp = document.querySelector('#codigo_postal').value;
    console.log("CP: "+cp);
    consultarApi(cp);
}
function validaNumero(numero){
    if(isNaN(numero)){
    return true;
    }else{
    return false;
    }
}
function mostrarAdevertencia(mensaje){
    const alerta2 = document.querySelector('.alert');
    
    if(!alerta2){
    //crar lalaerta 
    const alerta2 = document.createElement('div');
    alerta2.classList.add('alert', 'alert-danger');
    
    /* 
    
        <div class="alert alert-danger" role="alert">
         This is a primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
        </div>
    */
    
    alerta2.innerHTML=`
    ${mensaje}
    `;
    alerta.appendChild(alerta2);
    
    setTimeout(() => {
        alerta2.remove();
    }, 5000);
    
    }
    
}
function curpValida(curp) {
        var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
            validado = curp.match(re);
        
        if (!validado)  //Coincide con el formato general?
            return false;
        
        //Validar que coincida el dígito verificador
        function digitoVerificador(curp17) {
            //Fuente https://consultas.curp.gob.mx/CurpSP/
            var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
                lngSuma      = 0.0,
                lngDigito    = 0.0;
            for(var i=0; i<17; i++)
                lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
            lngDigito = 10 - lngSuma % 10;
            if (lngDigito == 10) return 0;
            return lngDigito;
        }
      
        if (validado[2] != digitoVerificador(validado[1])) 
            return false;
            
        return true; //Validado
}
function validarEmail(email) {
        if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(email)){
         return true;
        } else {
         return false;
        }
}

function consultarApi (cp){
    const url = `https://api-sepomex.hckdrk.mx/query/get_colonia_por_cp/${cp}`;

    fetch(url)
    .then(respuesta=>respuesta.json())
    .then(datos=>{
        console.log(datos);
        if(datos.error===true){
            mostrarAdevertencia('Codigo Postal Invalido');
            return;
        }
        insertarColonia(datos);
    })

}

function insertarColonia(data){
    const colonias = data.response.colonia;
    console.log("Colonia: "+colonias);
    limpiarhtml();
    colonias.forEach(colonias=>{
        const  nombre= colonias;
        const option= document.createElement('option');
        option.value=nombre;
        option.textContent=nombre;
        selectColonia.appendChild(option);

    })
}

function limpiarhtml (){
    while(selectColonia.firstChild){
        selectColonia.removeChild(selectColonia.firstChild);
    }
}
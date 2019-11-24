<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Proyecto Base de Datos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/Index.css" rel="stylesheet" type="text/css"/>
        <link href="font-Awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script>
            var ConsultaChida = "";
            var ContadorTablas=0;
            var NombreDeLasTablas=['0'];
            var NombreDeLosAtributos=['0'];
            var Numeros=['0','1','2','3','4','5','6','7','8','9','0'];
        var explicarBase="Para crear una base de datos se utiliza la sentencia (línea de código) 'create database' seguida del nombre"+
                            " de la base de datos. Después, tenemos que escribir 'use' seguido del nombre de la base, esto para"+
                            " indicar que vamos a utilizar esta base de datos y así poder manipularla."+
                            "\n\nOprima el botón para crear una base de datos.";
        var explicarTabla="Las tablas son objetos de base de datos que contienen todos sus datos. En las tablas, los datos "+
                            "se organizan en un formato de filas y columnas, similar al de una hoja de cálculo. "+
                            "Cada fila representa un registro único y cada columna un campo dentro del registro. Por ejemplo, "+
                            "en una tabla que contiene los datos de los empleados de una compañía puede haber una fila para cada "+
                            "empleado y distintas columnas en las que figuren detalles de los mismos, como el número de empleado, "+
                            "el nombre, la dirección, el puesto que ocupa y su número de teléfono particular.\n\n"+
                            "Oprime el botón y te explicaremos paso a paso cómo crear una de estas tablas.";
        var explicarConsulta="Una consulta es una sentencia (línea de código) que servirá para traernos cualquier información contenida "+
                                "dentro de nuestra base de datos. Esta información pueden ser datos específicos de las filas de una "+
                                "o más tablas. Podemos limitar las columnas que queramos o incluso filtrar la información de acuerdo "+
                                "a las condiciones que deseemos. Siguiendo con el ejemplo anterior, una consulta nos permite obtener "+
                                "el nombre de los empleados que tengan el puesto de gerente o la dirección de un empleado con un "+
                                "teléfono específico; por citar algunos ejemplos.\n\nOprime el botón y te explicaremos paso a paso cómo "+
                                "crear una de estas consultas.";
        var explicarDatos="INT (INTEGER): Ocupación de 4 bytes con valores entre -2147483648 y 2147483647 o entre 0 y 4294967295."+
                                "SMALLINT: Ocupación de 2 bytes con valores entre -32768 y 32767 o entre 0 y 65535."+
                                "TINYINT: Ocupación de 1 bytes con valores entre -128 y 127 o entre 0 y 255."+
                                "MEDIUMINT: Ocupación de 3 bytes con valores entre -8388608 y 8388607 o entre 0 y 16777215."+
                                "BIGINT: Ocupación de 8 bytes con valores entre -8388608 y 8388607 o entre 0 y 16777215."+
                                "DECIMAL (NUMERIC): Almacena los números de coma flotante como cadenas o string."+
                                "FLOAT (m,d): Almacena números de coma flotante, donde ‘m’ es el número de dígitos de la parte entera y ‘d’ el número de decimales."+
                                "DOUBLE (REAL): Almacena número de coma flotante con precisión doble. Igual que FLOAT, la diferencia es el rango de valores posibles."+
                                "BIT (BOOL, BOOLEAN): Número entero con valor 0 o 1."+
                                "DATE: Válido para almacenar una fecha con año, mes y día, su rango oscila entre  ‘1000-01-01′ y ‘9999-12-31′."+
                                "DATETIME: Almacena una fecha (año-mes-día) y una hora (horas-minutos-segundos), su rango oscila entre  ‘1000-01-01 00:00:00′ y ‘9999-12-31 23:59:59′."+
                                "TIME: Válido para almacenar una hora (horas-minutos-segundos). Su rango de horas oscila entre -838-59-59 y 838-59-59. El formato almacenado es ‘HH:MM:SS’."+
                                "TIMESTAMP: Almacena una fecha y hora UTC. El rango de valores oscila entre ‘1970-01-01 00:00:01′ y ‘2038-01-19 03:14:07′."+
                                "YEAR: Almacena un año dado con 2 o 4 dígitos de longitud, por defecto son 4. El rango de valores oscila entre 1901 y 2155 con 4 dígitos. Mientras que con 2 dígitos el rango es desde 1970 a 2069  (70-69)."+
                                "CHAR: Ocupación fija cuya longitud comprende de 1 a 255 caracteres."+
                                "VARCHAR: Ocupación variable cuya longitud comprende de 1 a 255 caracteres."+
                                "TINYBLOB: Una longitud máxima de 255 caracteres. Válido para objetos binarios como son un fichero de texto, imágenes, ficheros de audio o vídeo. No distingue entre minúculas y mayúsculas."+
                                "BLOB: Una longitud máxima de 65.535 caracteres. Válido para objetos binarios como son un fichero de texto, imágenes, ficheros de audio o vídeo. No distingue entre minúculas y mayúsculas."+
                                "MEDIUMBLOB: Una longitud máxima de 16.777.215 caracteres. Válido para objetos binarios como son un fichero de texto, imágenes, ficheros de audio o vídeo. No distingue entre minúculas y mayúsculas."+
                                "LONGBLOB: Una longitud máxima de 4.294.967.298 caracteres. Válido para objetos binarios como son un fichero de texto, imágenes, ficheros de audio o vídeo. No distingue entre minúculas y mayúsculas."+
                                "SET: Almacena 0, uno o varios valores una lista con un máximo de 64 posibles valores."+
                                "ENUM: Igual que SET pero solo puede almacenar un valor."+
                                "TINYTEXT: Una longitud máxima de 255 caracteres. Sirve para almecenar texto plano sin formato. Distingue entre minúculas y mayúsculas."+
                                "TEXT:Una longitud máxima de 65.535 caracteres. Sirve para almecenar texto plano sin formato. Distingue entre minúculas y mayúsculas."+
                                "MEDIUMTEXT:Una longitud máxima de 16.777.215 caracteres. Sirve para almecenar texto plano sin formato. Distingue entre minúculas y mayúsculas."+
                                "LONGTEXT: Una longitud máxima de 4.294.967.298 caracteres. Sirve para almecenar texto plano sin formato. Distingue entre minúculas y mayúsculas.";

        var select="Esta instrucción recupera las filas de una base de datos y habilita la selección de varias filas y columnas de"+" tablas que se encuentran contenidas dentro de una base de datos.";
        var explicarFROM="La cláusula FROM también puede contener una operación de unión. Puede usar una operación de unión para hacer coincidir y combinar datos de dos orígenes de datos, como dos tablas o una tabla y una consulta.";
        var explicarWHERE="La cláusula WHERE se usa para filtrar registros, la cláusula WHERE se usa para extraer solo aquellos registros que cumplen una condición específica.";
        var explicarAS="Un alias, es otra forma de llamar a una tabla o a una columna, y se utiliza para simplificar las sentencias SQL cuando los nombre de tablas o columnas son largos o complicados.";
        var explicarHAVING="La cláusula HAVING se agregó a SQL porque la palabra clave WHERE no se pudo usar con funciones agregadas. La función HAVING se utiliza para incluir condiciones con alguna función SQL del tipo SUM, MAX, ..";
        var explicarIN="El operador IN le permite especificar múltiples valores en una cláusula WHERE, el operador IN es una abreviatura para múltiples condiciones OR.";
        var explicarINNER="La sentencia INNER JOIN es el sentencia JOIN por defecto, y consiste en combinar cada fila de una tabla con cada fila de la otra tabla, seleccionado aquellas filas que cumplan una determinada condición.";
        var explicarJOIN="Una cláusula JOIN se usa para combinar filas de dos o más tablas, en función de una columna relacionada entre ellas.";
        var OR="La cláusula WHERE se puede combinar con operadores AND y OR, Los operadores AND y OR se utilizan para filtrar registros en función de más de una condición: El operador OR muestra un registro si alguna de las condiciones separadas por OR es VERDADERA.";
        var AND="La cláusula WHERE se puede combinar con operadores AND y OR, Los operadores AND y OR se utilizan para filtrar registros en función de más de una condición: El operador AND muestra un registro si todas las condiciones separadas por AND son VERDADERAS.";
        var Drop=" La sentencia DROP se utiliza para borrar definitivamente un índice, tabla o base de datos. Se utiliza para borrar una base de datos definitivamente.";


       
       
       
        var SeparadorAtributos = [0,0,0];
        var contenidoSentencias="";
        var GenerarTabla = 0;
         
    function habilitar(){
            document.getElementById("boton1").disabled=false;
            document.getElementById("boton2").disabled=true;
            document.getElementById("iniciar").disabled=true;
            var nombre = prompt("¿Cómo deseas que se llame tu base de datos?", "");
            document.getElementById("p1").innerHTML =nombre;
            contenidoSentencias=contenidoSentencias+"create database "+nombre+";";
            document.getElementById("sentencias").value=contenidoSentencias;
            contenidoSentencias=contenidoSentencias+"\nuse "+nombre+";";
            document.getElementById("sentencias").value=contenidoSentencias;
        }
        
        var NombreDeTabla=["Saab", "Volvo", "BMW"];
        var Tabla;
        var TablaGenerada;
        var NombreDeTablaUno;
        
        
        
        
        function enviar(form){
            SeparadorAtributos[ContadorTablas-1]=(NumeroAtributos-1);
            ContadorTablas=ContadorTablas-1;
            NumeroAtributos=NumeroAtributos-1;

            var Tabla = document.getElementById("mas-derecho");
        
        if(ContadorTablas>0){
            for(var f=0;f<=ContadorTablas;f++){
            NombreDeTabla[f]=CrearTabla[f].nombretabla.value;
            NombreDeLasTablas[f]=CrearTabla[f].nombretabla.value;
            }

        }else{
         NombreDeTablaUno=CrearTabla.nombretabla.value;
         NombreDeLasTablas[0]=CrearTabla.nombretabla.value;
        }

        console.log(NombreDeLasTablas);
        

        var TablaGenerada=["<table>","<table>","<table>"];

            if(ContadorTablas>0){
        for(var f=0;f<=ContadorTablas;f++){
        TablaGenerada[f] = '<table>'+
            '<tr>'+
            '<th>Nombre</th>'+
            '<th>Tipo</th>'+
            '<th>Tamaño</th>'+
            '<th>Valor</th>'+
            '</tr>';
        }
            }
        else{
            TablaGenerada = '<table>'+
            '<tr>'+
            '<th>Nombre</th>'+
            '<th>Tipo</th>'+
            '<th>Tamaño</th>'+
            '<th>Valor</th>'+
            '</tr>';
        }

        //TODO:Pasar atributos a una var global

        var k =0;
       
       
       
       
        for(var g=0;g<=ContadorTablas;g++){

            if(NumeroAtributos>0 && ContadorTablas>0){

                    for(k;k<=SeparadorAtributos[g];k++){

                        TablaGenerada[g] += '<tr>'+
                            '<td>'+Atributos[k].NombreAtributo.value+'</td>'+
                            '<td>'+Atributos[k].tipoDato.value+'</td>'+
                            '<td>'+Atributos[k].TamanoAtributo.value+'</td>'+
                            '<td>'+Atributos[k].Valor.value+'</td></tr>';
                        NombreDeLosAtributos[k]=Atributos[k].NombreAtributo.value;
                            

                    }
                    TablaGenerada[g] += '</table>';
            }
            else if(NumeroAtributos==0 && ContadorTablas==0){
                TablaGenerada += '<tr>'+
                            '<td>'+Atributos.NombreAtributo.value+'</td>'+
                            '<td>'+Atributos.tipoDato.value+'</td>'+
                            '<td>'+Atributos.TamanoAtributo.value+'</td>'+
                            '<td>'+Atributos.Valor.value+'</td></tr>';
                            NombreDeLosAtributos[0]=Atributos.NombreAtributo.value;
            }
            else if(NumeroAtributos>0 && ContadorTablas==0){


                    for(k;k<=SeparadorAtributos[g];k++){

                        TablaGenerada += '<tr>'+
                            '<td>'+Atributos[k].NombreAtributo.value+'</td>'+
                            '<td>'+Atributos[k].tipoDato.value+'</td>'+
                            '<td>'+Atributos[k].TamanoAtributo.value+'</td>'+
                            '<td>'+Atributos[k].Valor.value+'</td></tr>';
                        NombreDeLosAtributos[k]=Atributos[k].NombreAtributo.value;
                            

                    }





            }


        }


        if(ContadorTablas>0){
            var k=0;
            var SentenciaGenerada=["1","2"];

            for(var o=0;o<=ContadorTablas;o++){
                Tabla.innerHTML += '<h3>'+NombreDeTabla[o]+'</h3><br>';
                Tabla.innerHTML += TablaGenerada[o];
                SentenciaGenerada[o] = "CREATE TABLE "+NombreDeTabla[o]+" (";
            


                for(k;k<=SeparadorAtributos[o];k++){
                
                    SentenciaGenerada[o] += Atributos[k].NombreAtributo.value+' '+Atributos[k].tipoDato.value+'('+
                    Atributos[k].TamanoAtributo.value+')';
                
                    if(k!=(SeparadorAtributos[o])){
                    SentenciaGenerada[o]+=', ';                
                    }
                }

            SentenciaGenerada[o] +=');';



            Tabla.innerHTML+=SentenciaGenerada[o];
            }

        }





        else{

            Tabla.innerHTML += '<h3>'+NombreDeTablaUno+'</h3><br>';
            Tabla.innerHTML += TablaGenerada;




            var SentenciaGenerada = "CREATE TABLE "+NombreDeTablaUno+" (";

            if(NumeroAtributos>1){
                for(var k=0;k<=NumeroAtributos;k++){
                
                    SentenciaGenerada += Atributos[k].NombreAtributo.value+' '+Atributos[k].tipoDato.value+'('+
                    Atributos[k].TamanoAtributo.value+')';
                
                    if(k!=(NumeroAtributos)){
                    SentenciaGenerada+=', ';}
                    
                }
            SentenciaGenerada +=');'
            }
            else{
                SentenciaGenerada += Atributos.NombreAtributo.value+' '+Atributos.tipoDato.value+'('+
                    Atributos.TamanoAtributo.value+'));';
            }   
            Tabla.innerHTML+=SentenciaGenerada;

        }









        console.log(NombreDeLosAtributos);


       
        

    }


        var NumeroAtributos = 0;
        function explicarCrearBase(){
            document.getElementById("explicaciones").value=explicarBase;
        }
        
        function explicarCrearTabla(){
            document.getElementById("explicaciones").value=explicarTabla;
        }
        
        function explicarCrearConsulta(){
            document.getElementById("explicaciones").value=explicarConsulta;
        }
        
        var Formulario;
        var bandera=0;
        function crearTabla(){
            document.getElementById("boton2").disabled=false;
            document.getElementById("divTabla").style.visibility="visible";
            document.getElementById("derecha").style.visibility="hidden";
            document.getElementById("divConsulta").style.visibility="hidden";
            var Formulario = document.getElementById("divTabla");
            if(bandera==0){
            Formulario.innerHTML += '<form name="Tabla" action="index.html" method="get">'+
                           '<input id="AgregaBoton" type="button" name="botonTabla" onclick="agregarTabla()" value="Agregar Tabla">'+
                           '<input id="AgregaBoton" type="button" name="botonTabla" onclick="agregar()" value="Agregar atributo">'+
                           '<input id="EnviaBoton" type="button" onClick="enviar(CrearTabla.form,Atributos.form)" value="Enviar"><br>'+
                           '</form>';                 
            }
            bandera=1; 





        }
        
        function agregarTabla(){
            if(ContadorTablas!=0){
            SeparadorAtributos[ContadorTablas-1]=(NumeroAtributos-1);
            }
            ContadorTablas+=1;
            var Formulario = document.getElementById("divTabla");
            Formulario.innerHTML += '<hr style="color: #000000;" size="7" noshade="noshade"/><form name="CrearTabla" action="index.html" method="get">'+
                           'Nombre de La tabla: <input type="text" name="nombretabla" size="42"><br>'+
                           '<br>'+
                           '<h3>Atributos:</h3>'+
                           '</form>';                 
            agregar();
            Formulario.innerHTML += '<br><br>'
                           
        }


        function crearConsulta(){
            myOnLoad()
            document.getElementById("divTabla").style.visibility="hidden";
            document.getElementById("derecha").style.visibility="hidden";
            document.getElementById("divConsulta").style.visibility="visible";
            document.getElementById("botonConsulta").disabled=false;
        }
        
        function habilitar2(){
            document.getElementById("divTabla2").style.visibility="visible";
            document.getElementById("derecha").style.visibility="hidden";
            document.getElementById("divConsulta").style.visibility="hidden";
        }
        
        function agregar(){
         Formulario = document.getElementById("divTabla");

            NumeroAtributos +=1;

            Formulario.innerHTML += '<form name="Atributos" action="index.html" method="get">'+'<br>Nombre: <input type="text" name="NombreAtributo">'+
                            'Tipo: <select name="tipoDato">'+
                                   
                            '<option>INT</option>'+
                            '<option>SMALLINT</option>'+
                            '<option>TINYINT</option>'+
                            '<option>MEDIUMINT</option>'+
                            '<option>BIGINT</option>'+
                            '<option>DECIMAL</option>'+
                            '<option>FLOAT</option>'+
                            '<option>DOUBLE</option>'+
                            '<option>BIT</option>'+
                            
                            '<option>DATE</option>'+
                            '<option>DATETIME</option>'+
                            '<option>TIME</option>'+
                            '<option>TIMESTAMP</option>'+
                            '<option>YEAR</option>'+
                            
                            '<option>CHAR</option>'+
                            '<option>VARCHAR</option>'+
                            '<option>TINYBLOB</option>'+
                            '<option>BLOB</option>'+
                            '<option>MEDIUMBLOB</option>'+
                            '<option>LONGBLOB</option>'+
                            '<option>SET</option>'+
                            '<option>ENUM</option>'+
                            '<option>TINYTEXT</option>'+
                            '<option>TEXT</option>'+
                            '<option>MEDIUMTEXT</option>'+
                            '<option>LONGTEXT</option>'+



                                  '</select><br>'+
                           'Tamaño: <input name="TamanoAtributo" type="number" min="1" max="1000" step="1">'+
                           'Valor: <input type="text" name="Valor">'+
                          '</form>';


        }

var tabla;
var atributo;
var condicion;

        function explicacionSelect(){
        
            document.getElementById("explicacion").value=select;
            
         }

           function explicacionFROM(){
        
            document.getElementById("explicacion").value=explicarFROM;
            
         }

           function explicacionWHERE(){
        
            document.getElementById("explicacion").value=explicarWHERE;
            
         }

           function explicacionAS(){
        
            document.getElementById("explicacion").value=explicarAS;
            
         }

           function explicacionHAVING(){
        
            document.getElementById("explicacion").value=explicarHAVING;
            
         }

           function explicacionIN(){
        
            document.getElementById("explicacion").value=explicarIN;
            
         }

            function explicacionINNER(){
        
            document.getElementById("explicacion").value=explicarINNER;
            
         }

            function explicacionJOIN(){
        
            document.getElementById("explicacion").value=explicarJOIN;OR
            
         }

             function explicacionOR(){
        
            document.getElementById("explicacion").value=OR;
            
         }

            function explicacionAND(){
        
            document.getElementById("explicacion").value=AND;
            
         }

            function explicacionDROP(){
        
            document.getElementById("explicacion").value=Drop;
            
         }


        function InsertarPalabra(nombre){
            console.log(nombre.value);
            ConsultaChida +=" "+nombre.value;
            document.getElementById("sql").value=ConsultaChida;
        }


        function InsertarTabla(){
            tabla= document.CrearConsulta.comboTablas.options[document.CrearConsulta.comboTablas.selectedIndex].text;
            ConsultaChida +=" "+tabla;
            document.getElementById("sql").value=ConsultaChida;
        }
        
        function InsertarAtributo(){
            atributo= document.CrearConsulta.comboAtributo.options[document.CrearConsulta.comboAtributo.selectedIndex].text
            ConsultaChida +=" "+atributo;
            document.getElementById("sql").value=ConsultaChida;
        }

        function InsertarNumero(){
            numero= condicion= document.CrearConsulta.comboCondicion.options[document.CrearConsulta.comboCondicion.selectedIndex].text
            ConsultaChida +=" "+numero;
            document.getElementById("sql").value=ConsultaChida;
        }


        function Consulta(){
            document.getElementById("sql").value="";
            document.getElementById("divConsulta").style.visibility="visible";


        }




         function myOnLoad() {
            cargar_tablas()
            cargar_atributos()
            cargar_condicion()
         }

        function cargar_tablas() {


        var array = NombreDeLasTablas;
         array.sort();
        insertar("comboTablas", array);
        }

          function cargar_atributos() {
          
          var array= new Array(); ;

            var array = NombreDeLosAtributos;
              array.sort();
              insertar("comboAtributo", array);
        
        }

          function cargar_condicion() {
            var array= new Array(); ;
            var array = Numeros;
         array.sort();
        insertar("comboCondicion", array);
        }


        function insertar(domElement, array) {
         var select = document.getElementsByName(domElement)[0];
         for (value in array) {
          var option = document.createElement("option");
          option.text = array[value];
          select.add(option);
         }

       

     }
        </script>
    </head>
    
    <body>
        <div id="central">
            
            
            <div style =" display: table;float: left; width: 100%; height: 5% ">
                <div id="titulo">
                    <p id="p1" style="padding: 0px; margin: 0px;">Manejador de bases de datos para novatos</p>
                </div>
            </div>
            
            
            <div style =" display: table;float: left; width: 100%; height: 95% ">
                
                
                <div id="izquierda">
                    <button id="iniciar" onclick="habilitar()">Crear base</button><button class="imagen fa fa-info" id="explicarCrearBase" onclick="explicarCrearBase()" title="Saber más..."></button>
                    <br>
                    <button name="boton1" id="boton1" onclick="crearTabla()" disabled="">Crear tabla</button><button class="imagen fa fa-info" onclick="explicarCrearTabla()" id="explicarCrearTabla"  title="Saber más..."></button>
                    <br>
                    <button name="boton2" id="boton2" onclick="crearConsulta()" disabled="">Crear consulta</button><button class="imagen fa fa-info" onclick="explicarCrearConsulta()" id="explicarCrearConsulta" title="Saber más..."></button>
                    <textarea disabled="" id="explicacion" readonly="" style="height: 20%">Informacion de palabras reservadas de consultas</textarea>
                 </div>
                
                
                <div id="medio">
                    
                    
                    <div class="invisible" id="divTabla">
                            
                    </div>
                    
                    <div class="invisible" id="divConsulta">
                <form name="CrearConsulta">
                <span >
                    Crea una cosulta<br>
                </span>
                <input onclick="InsertarPalabra(this); explicacionSelect();" type="button" value="SELECT">
                <input onclick="InsertarPalabra(this); explicacionFROM();" type="button" value="FROM">
                <input onclick="InsertarPalabra(this); explicacionWHERE();" type="button" value="WHERE">
                <input onclick="InsertarPalabra(this)" type="button" value="(">
                <input onclick="InsertarPalabra(this)" type="button" value=")">
                <input onclick="InsertarPalabra(this); explicacionAS();" type="button" value="AS">
                <input onclick="InsertarPalabra(this)" type="button" value="=">
                <input onclick="InsertarPalabra(this)" type="button" value="<">
                <input onclick="InsertarPalabra(this)" type="button" value=">">
                <input onclick="InsertarPalabra(this)" type="button" value="'">
                <input onclick="InsertarPalabra(this)" type="button" value="*">
                <input onclick="InsertarPalabra(this)" type="button" value=";">
                <input onclick="InsertarPalabra(this)" type="button" value=",">
                <input onclick="InsertarPalabra(this); explicacionHAVING();" type="button" value="HAVING"><br>
                <input onclick="InsertarPalabra(this); explicacionIN();" type="button" value="IN">
                <input onclick="InsertarPalabra(this); explicacionINNER();" type="button" value="INNER">
                <input onclick="InsertarPalabra(this); explicacionJOIN();" type="button" value="JOIN">
                <input onclick="InsertarPalabra(this); explicacionOR();" type="button" value="OR">
                <input onclick="InsertarPalabra(this); explicacionAND()" type="button" value="AND">
                <input onclick="InsertarPalabra(this); explicacionDROP();" type="button" value="DROP">
                            <div>
                                <span>Elige tu tabla</span>
                                <div>
                                    <select name="comboTablas">
                                        <option>Seleccione una tabla.</option>
                                    </select>
                                    <input type="button" value="Insertar" onclick="InsertarTabla()">
                                </div>
                                <span></span>
                            </div>

                            <div >
                                <span>Eligue un atributo</span>
                                <div>
                                    <select name="comboAtributo">
                                        <option>Seleccione una atributo.</option>
                                        <input type="button" value="Insertar" onclick="InsertarAtributo()">
                                    </select>
                                </div>
                                <span ></span>
                            </div>

                            <div >
                                <span>Numeros</span>
                                <div>
                                    <select name="comboCondicion">
                                        <option>Seleccione un numero.</option>
                                        <input type="button" value="Insertar" onclick="InsertarNumero()">
                                    </select>
                                </div>
                                <span ></span>
                            </div>


                            <div>
                                <div>
                                        <input type="button" name="BotonConsulta" id="BotonConsulta" onclick="Consulta()" value="Checar Consulta"></button>
                                </div>
                            </div>
                        </form>
                        <textarea disabled="" id="sql" readonly=""  style="height:100px; width: 650px"></textarea>
                    </div>
                    
                    <div id="derecha">
                        <textarea disabled="" id="sentencias" readonly="" ></textarea>
                    </div>
                    
                    
                    <div id="derecha-abajo">
                        <textarea disabled="" id="explicaciones" readonly="" style="height: 90%">
Una base de datos es un “almacén” que nos permite guardar grandes cantidades de información de forma organizada para que luego podamos encontrar y utilizar fácilmente. 
Es una herramienta muy utilizada en el desarrollo de software y tal vez esta páagina pueda ayudarte a aprender un poco.
Para ello utilizaremos SQL, un lenguaje con el que podrás crear, manipular e interactuar con las bases de datos.
Oprime el botón de crear base para comenzar!
                            
Nota: Todas las sentencias deben terminar con punto y coma (;)
                        </textarea>
                    </div>
                </div>
                <div id="mas-derecho">
                    Aqui se desplegaran las tablas que se creen.
                </div>
            </div>
        </div>  
    </body>
</html>

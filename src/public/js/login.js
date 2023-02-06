function nome(){
    document.getElementById("name").innerHTML = "Nome";
    document.getElementById("input_text").innerHTML = "<input type='text' name='text' id='text' required>";
    document.getElementById('select').style.cssText = 'border: 1px solid rgb(207, 207, 207); background-color: #fdfdfd; color: black;';
    document.getElementById('cod').style.cssText = 'border: 1px solid rgb(207, 207, 207); background-color: #fdfdfd; color: black;';
    document.getElementById('name').style.cssText = 'color: rgb(95, 95, 95);';
    document.getElementById('cod_l').style.cssText = 'color: rgb(95, 95, 95);;';
    document.getElementById('span').style.cssText = 'display: none;';
    document.getElementById('enviar').style.cssText = 'background: linear-gradient(347deg, rgb(34, 81, 174), rgb(89, 153, 221), rgb(136, 200, 243));';
    document.getElementById("enviar").value = "Entrar";
    document.getElementById('text').style.cssText = 'display: flex;';
    document.getElementById('select').style.cssText = 'display: none;';
}

function turma(){
    document.getElementById("name").innerHTML = "Turma";
    document.getElementById("input_text").innerHTML = "<input type='text' id='text'>";
    document.getElementById('select').style.cssText = 'border: 1px solid rgb(207, 207, 207); background-color: #fdfdfd; color: black;';
    document.getElementById('cod').style.cssText = 'border: 1px solid rgb(207, 207, 207); background-color: #fdfdfd; color: black;';
    document.getElementById('name').style.cssText = 'color: rgb(95, 95, 95);';
    document.getElementById('cod_l').style.cssText = 'color: rgb(95, 95, 95);';
    document.getElementById('span').style.cssText = 'display: none;';
    document.getElementById('enviar').style.cssText = 'background: linear-gradient(347deg, rgb(34, 81, 174), rgb(89, 153, 221), rgb(136, 200, 243));';
    document.getElementById("enviar").value = "Entrar";
    document.getElementById('text').style.cssText = 'display: none;';
    document.getElementById('select').style.cssText = 'display: flex;';
}

var leave;
var load;
setTimeout(() => {leave = true; loading_screen();}, 4000);

function loading(){
    load = true;
    if (sessionStorage.getItem('Erros') >= 1) {erro();}
    loading_screen();
}

function loading_screen(){
    if(leave == true & load == true){document.getElementById('action_area').style.cssText = 'display: none;';} 
}

if (sessionStorage.getItem('Erros') >= 1) {
    function erro(){
        var id = sessionStorage.getItem('Radio_type');
        if (!id){id = 'aluno_radio';}
        var turma
        if(id == 'aluno_radio' || id == 'representante_radio'){turma = 'select';}else{turma = 'text';}
        if(turma == 'select'){
            document.getElementById(turma).style.cssText = 'outline: none; border: 2px solid rgb(255, 173, 173); box-shadow: none; color: rgb(255, 116, 116); background-color: #fff4f4; display: flex; margin-top: -1px;';
            document.getElementById('cod').style.cssText = 'outline: none; border: 2px solid rgb(255, 173, 173); box-shadow: none; color: rgb(255, 116, 116); background-color: #fff4f4; margin-top: -1px;';
        }
        if(turma == 'text'){
            document.getElementById(turma).style.cssText = 'outline: none; border: 2px solid rgb(255, 173, 173); box-shadow: none; color: rgb(255, 116, 116); background-color: #fff4f4; display: flex; margin-top: -2px;';
            document.getElementById('cod').style.cssText = 'outline: none; border: 2px solid rgb(255, 173, 173); box-shadow: none; color: rgb(255, 116, 116); background-color: #fff4f4; margin-top: -2px;';
        }
        document.getElementById('name').style.cssText = 'color: rgb(255, 116, 116);';
        document.getElementById('cod_l').style.cssText = 'color: rgb(255, 116, 116);';
        document.getElementById('span').style.cssText = 'display: flex;';
        document.getElementById('enviar').style.cssText = 'background-image: linear-gradient(-45deg,#ff5c5c, #fbcbcb);';
        document.getElementById("enviar").value = "Tentar novamente";
        sessionStorage.setItem('Erros', 0);
    }
}

function reCAPTCHA(){  
    if(grecaptcha.getResponse() == ''){
        document.getElementById('reCAP').style.cssText = 'display: flex;';
        document.getElementById('enviar').style.cssText = 'background-image: linear-gradient(-45deg,#ff5c5c, #fbcbcb);';
        document.getElementById("enviar").value = "Tentar novamente";
        return false;
    }
}

window.addEventListener('resize', function () {
    var largura_window = window.innerWidth;

    if (largura_window < 500) {

        var proportion = (largura_window/1000)*2;
        var top = ((proportion-1)*280)+((proportion+0.2)*17);
        if(top < 25){
            document.getElementById('block').style.cssText = 'margin-top: '+top+'px; transform: scale('+proportion+'); transition: all 0.0s;';
        }else{
            document.getElementById('block').style.cssText = 'margin-top: 25px; transform: scale(1); transition: all 0.2s;';
        }
    }

    if (largura_window > 1033) {
        document.getElementById('block').style.cssText = 'margin-top: 0px;';
    }

    if (largura_window > 500 & largura_window < 1033) {
        document.getElementById('block').style.cssText = 'margin-top: 25px;';
    }
});

if (sessionStorage.getItem('Erros') >= 1) {document.getElementById('action_area').style.cssText = 'display: none;';}

var largura_window = window.innerWidth;
if (largura_window < 500) {mobile();}

function mobile(){
    var largura_window = window.innerWidth;

    if (largura_window < 500) {

        var larg = largura_window - 466;
        largura_window = largura_window + larg;

        var proportion = (largura_window/1000)*2;
        var top = ((proportion-1)*280)+((proportion+0.2)*17);
        if(top < 25){
            document.getElementById('block').style.cssText = 'margin-top: '+top+'px; transform: scale('+proportion+'); transition: all 0.0s;';
        }else{
            document.getElementById('block').style.cssText = 'margin-top: 25px; transform: scale(1); transition: all 0.2s;';
        }
    }
}

var id = sessionStorage.getItem('Radio_type');

if (!id){
    id = 'aluno_radio';
}

if(id == 'aluno_radio' || id == 'representante_radio'){
    document.getElementById("name").innerHTML = "Turma";
    document.getElementById("input_text").innerHTML = "<input type='text' id='text'>";   
    document.getElementById('text').style.cssText = 'display: none;';
    document.getElementById('select').style.cssText = 'display: flex;';          
}else{
    document.getElementById("name").innerHTML = "Nome"; 
    document.getElementById("input_text").innerHTML = "<input type='text' name='text' id='text' required>";
    document.getElementById('text').style.cssText = 'display: flex;';
    document.getElementById('select').style.cssText = 'display: none;';
}

let radio = document.getElementById(id);
radio.checked = true;
function aluno(){sessionStorage.setItem('Radio_type', 'aluno_radio');}
function representante(){sessionStorage.setItem('Radio_type', 'representante_radio');}
function administracao(){sessionStorage.setItem('Radio_type', 'administração_radio');} 

if(class_){
    document.getElementById("select_one").innerHTML = class_; 
}else{
    document.getElementById("select_one").innerHTML = ""; 
}
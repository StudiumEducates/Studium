        window.addEventListener('resize', function () {
            var largura_window = document.getElementById('header').clientWidth;
            var altura_window = document.getElementById('container').clientWidth;
        
            if (largura_window < 500 & largura_window != 0) {

                var proportion = (largura_window/1000)*2;
                var top = ((proportion-1)*3740);


                if(top < 0){
                    document.getElementById('container').style.cssText = 'margin-top: '+top+'px; margin-bottom:'+top+'px; transform: scale('+proportion+');';
                }else{
                    document.getElementById('container').style.cssText = 'margin-top: 0px; margin-bottom: 0px; transform: scale(1);';
                }
            }
        });

        var largura_window = window.innerWidth;
        if (largura_window < 500) {mobile();}
                    
        function mobile(){
        var largura_window = window.innerWidth;
                    
            if (largura_window < 500) {

                var larg = largura_window - 500;
                largura_window = largura_window + larg;

                var proportion = (largura_window/1000)*2;
                var top = ((proportion-1)*3740);
                if(top < 0){
                    document.getElementById('container').style.cssText = 'margin-top: '+top+'px; margin-bottom:'+top+'px; transform: scale('+proportion+');';
                }else{
                    document.getElementById('container').style.cssText = 'margin-top: 0px; margin-bottom: 0px; transform: scale(1);';
                }
            }
        }
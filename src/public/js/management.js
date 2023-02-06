            window.addEventListener('resize', function () {
            var largura_window = window.innerWidth;
        
            if (largura_window < 500) {

                var proportion = (largura_window/1000)*2;
                var top = ((proportion-1)*430);
                if(top < 25){
                    document.getElementById('decrease').style.cssText = 'margin-top: '+top+'px; transform: scale('+proportion+');';
                }else{
                    document.getElementById('decrease').style.cssText = 'margin-top: 0px;';
                }
            }
        });

        var largura_window = window.innerWidth;
        if (largura_window < 500) {mobile();}
                    
        function mobile(){
        var largura_window = window.innerWidth;
                    
            if (largura_window < 500) {

                var larg = largura_window - 450;

                largura_window = largura_window + larg;

                var proportion = (largura_window/1000)*2;
                var top = ((proportion-1)*430);
                if(top < 25){
                    document.getElementById('decrease').style.cssText = 'margin-top: '+top+'px; transform: scale('+proportion+'); transition: all 0.0s;';
                }else{
                    document.getElementById('decrease').style.cssText = 'margin-top: 25px; transform: scale(1);';
                }
            }
        }
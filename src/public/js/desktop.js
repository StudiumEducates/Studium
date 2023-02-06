    var cont = localStorage.getItem('Menu', cont);

    if (isNaN(cont)){
        cont = 0;
    }

    function move(){
        if (!cont || cont == 0){
            cont++;
        }else{
            cont--;
        }
        localStorage.setItem('Menu', cont);
        menu(cont);
    }

    function menu(){
        if(localStorage.getItem('Menu', cont) == 0){
            let side_bar = document.getElementById('side_bar');
                side_bar.style.cssText = 
                'width: 70px;' +
                'padding-left: 4px;' +
                'background: linear-gradient(37deg, rgb(28 56 112), rgb(48 99 171), rgb(101 164 248));' +
                'border-right: 2px solid #e8f0ff;' +
                'box-shadow: 6px 0px 10px #e8f0ff;';

            const Option = document.getElementsByClassName("Option");
            for (let i = 0; i < Option.length; i++) {
                Option[i].style.cssText = 
                'width: 70px;' +
                'border-radius: 5px 0px 0px 5px;';  
            }  

            const img_icon = document.getElementsByClassName("img_icon");
            for (let i = 0; i < img_icon.length; i++) {
                img_icon[i].style.cssText = 'filter: brightness(1);' +
                'width: 25px;' +
                'height: 25px;';   
            }

            let this_id = document.getElementById('this');
                this_id.style.cssText = 'background: white;' +
                'width: 70px;' + 
                'background-image: var(--icon_menu);' + 
                'background-size: 25px;' + 
                'background-position: 41% center;' +
                'background-repeat: no-repeat;';

            let this_img = document.getElementById('this_img');
                this_img.style.cssText = 'opacity: 0;' +
                'width: 25px;' +
                'height: 25px;';     

                let title_option = document.getElementsByClassName("title_option");
                for (let i = 0; i < title_option.length; i++) {
                    title_option[i].style.cssText = 'opacity: 0;' +
                    'transition: opacity 0s; display: none;';   
                }
            
            let menu_expand = document.getElementById('menu_expand');
                menu_expand.style.cssText = 'display:';

            let menu_back = document.getElementById('menu_back');
                menu_back.style.cssText = 'display: none;';

            let logout = document.getElementById('logout');
                logout.style.cssText = 'width: 70px; justify-content: center;';

            let exit_img = document.getElementById('exit_img');
                exit_img.style.cssText = 'width: 22px; height: 22px; margin-right: 10px;';

            let exit_p = document.getElementById('exit_p');
                exit_p.style.cssText = 'display: none';

            let line = document.getElementById('line');
                line.style.cssText = 'display: none';

            let logo_menu = document.getElementById('logo_menu');
                logo_menu.style.cssText = 'display: none';

            let Studium = document.getElementById('Studium');
                Studium.style.cssText = 'display: none';

            let container = document.getElementById('container');
                container.style.cssText = 'width: calc(100% - 80px);';

        }else{
        
            let side_bar = document.getElementById('side_bar');
                side_bar.style.cssText = 
                'width: 205px;' + 
                'padding: 0px 10px 0px 10px;' +
                'background: white;' +
                'width: 205px;' + 
                'background: white;' +
                'border-right: none;' +
                'box-shadow: 6px 0px 10px #e9edf8;';
            
            const Option = document.getElementsByClassName("Option");
            for (let i = 0; i < Option.length; i++) {
                Option[i].style.cssText = 
                'width: 205px;' + 
                'border-radius: 8px;';    
            }

            const img_icon = document.getElementsByClassName("img_icon");
            for (let i = 0; i < img_icon.length; i++) {
                img_icon[i].style.cssText = 'filter: brightness(0.75);' +
                'width: 21px;' +
                'height: 21px;';    
            }

            let this_id = document.getElementById('this');
                this_id.style.cssText = 'background: linear-gradient(29deg, rgb(34, 81, 174), rgb(89, 153, 221), rgb(136, 200, 243));' +
                'width: 205px;' +
                'border-radius: 8px;';

            let this_img = document.getElementById('this_img');
                this_img.style.cssText = 'opacity: 1;' +
                'width: 21px;' +
                'height: 21px;';
            
            let title_option = document.getElementsByClassName("title_option");
            for (let i = 0; i < title_option.length; i++) {
                title_option[i].style.cssText = 'opacity: 1;'+
                'transition: opacity 0.2s; display:flex;'; 
            }

            let menu_expand = document.getElementById('menu_expand');
                menu_expand.style.cssText = 'display: none;';

            let menu_back = document.getElementById('menu_back');
                menu_back.style.cssText = 'display: flex;';  

            let logout = document.getElementById('logout');
                logout.style.cssText = 'width: 205px; justify-content: start;';

            let exit_img = document.getElementById('exit_img');
                exit_img.style.cssText = 'width: 15px; height: 15px; margin-right: 10px; margin-left: 20px; filter: brightness(0.75);';

            let exit_p = document.getElementById('exit_p');
                exit_p.style.cssText = 'display: flex';

            let line = document.getElementById('line');
                line.style.cssText = 'display: flex';

            let logo_menu = document.getElementById('logo_menu');
                logo_menu.style.cssText = 'display: flex';

            let Studium = document.getElementById('Studium');
                Studium.style.cssText = 'display: block';

            let container = document.getElementById('container');
                container.style.cssText = 'width: calc(100% - 232.5px);';

        }
    }
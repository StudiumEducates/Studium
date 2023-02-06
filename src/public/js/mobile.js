
    function move_A(){
        let menu = document.getElementById('side_bar');
        menu.style.cssText = 'transition: transform 0.15s; transform: translate(0px);';

        let filter = document.getElementById('filter');
        filter.style.cssText = 'display: flex;';

        let title_option = document.getElementsByClassName("title_option");
            for (let i = 0; i < title_option.length; i++) {
                title_option[i].style.cssText = 'opacity: 1;'
            }
        
        const Option = document.getElementsByClassName("Option");
        for (let i = 0; i < Option.length; i++) {
            Option[i].style.cssText = 
            'width: 225px;' +
            'height: 50px;' +
            'margin-top: 10px;' +
            'display: flex;' +
            'align-items: center;' +
            'flex-direction: row;' +
            'border-radius: 10px;';
        }

        const img_icon = document.getElementsByClassName("img_icon");
        for (let i = 0; i < img_icon.length; i++) {
            img_icon[i].style.cssText =
            'width: 22px;' +
            'height: 22px;' +
            'margin-left: 15px;' +
            'margin-right: 10px;' +
            'filter: brightness(0.8);';  
        }

        let logout = document.getElementById('logout');
            logout.style.cssText = 'width: 225px; justify-content: center;';

        let exit_img = document.getElementById('exit_img');
            exit_img.style.cssText = 'width: 17px; height: 17px; margin-right: 10px; margin-left: -10px; filter: brightness(0.8);';

        let exit_p = document.getElementById('exit_p');
            exit_p.style.cssText = 'display: flex';

        let logo_menu = document.getElementById('logo_menu');
            logo_menu.style.cssText = 'display: none';

        let menu_back = document.getElementById('menu_back');
            menu_back.style.cssText = 'display: none;';  

        let line = document.getElementById('line');
            line.style.cssText = 'display: flex';

        let this_id = document.getElementById('this');
            this_id.style.cssText = 'background: linear-gradient(29deg, rgb(34, 81, 174), rgb(89, 153, 221), rgb(136, 200, 243));';

        let this_img = document.getElementById('this_img');
            this_img.style.cssText = 'filter: brightness(1);';
        
        let menu_expand = document.getElementById('menu_expand');
            menu_expand.style.cssText = 'display: none;';

    }

    function move_D(){
        let menu = document.getElementById('side_bar');
        menu.style.cssText = 'transition: transform 0.15s; transform: translate(-270px);';

        let filter = document.getElementById('filter');
        filter.style.cssText = 'display: none;';

        let title_option = document.getElementsByClassName("title_option");
            for (let i = 0; i < title_option.length; i++) {
                title_option[i].style.cssText = 'opacity: 0;'
            }
    }
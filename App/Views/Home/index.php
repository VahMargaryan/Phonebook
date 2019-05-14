<div class="cotn_principal">
    <div class="cont_centrar">
        <div class="cont_login">
            <div class="cont_info_log_sign_up">
                <div class="col_md_login">
                    <div class="cont_ba_opcitiy">
                        <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                    </div>
                </div>
                <div class="col_md_sign_up">
                    <div class="cont_ba_opcitiy">
                        <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                    </div>
                </div>
            </div>
            <div class="cont_back_info">
                <div class="cont_img_back_grey">
                    <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d"
                         alt=""/>
                </div>
            </div>
            <div class="cont_forms">
                <div class="cont_img_back_">
                    <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d"
                         alt=""/>
                </div>
                <div class="cont_form_login">
                    <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <input name="email" type="text" placeholder="Email"/>
                        <input name="password" type="password" placeholder="Password"/>
                        <input type="submit" name="login" class="btn_login" onclick="cambiar_login()" value="LOGIN"/>
                    </form>
                </div>
                <div class="cont_form_sign_up">
                    <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="text" placeholder="Email" name="email"/>
                        <input type="text" placeholder="First Name" name="first"/>
                        <input type="text" placeholder="Last Name" name="last"/>
                        <input type="text" placeholder="Phone Number" name="number"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <input type="password" placeholder="Confirm Password" name=confpass/>
                        <input type="submit" name="signup" class="btn_sign_up" onclick="cambiar_sign_up()"
                               value="SIGN UP">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
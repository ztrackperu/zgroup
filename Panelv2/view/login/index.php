<script>	

$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});

function enviarpassword(){
	usern=document.getElementById('usern').value;
	if(usern==''){
		alert('Favor de Ingresar su Nombre de usuario');
	}else{
		//alert(usern);
		location.href="http://zgroup.com.pe/formwebpassword.php?usern="+usern;
	}	
	
}
/*
function inhabilitar(){ 
   //	alert ("Esta función está inhabilitada.\n\nPerdonen las molestias.") 
   	return false 
} 
document.oncontextmenu=inhabilitar 
*/
</script>


<div align="center"><img src="assets/img/logo.png" width="254" height="66" /></div>
    <div class="container">    
        <div id="loginbox" style="margin-top:20px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Bienvenidos al Sistema Intranet z2</div>
                        <div style="float:right; font-size: 80%; position: relative;  top:-10px"><a href="#my_modal" data-toggle="modal" >Olvido su contraseña?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                            
                            <form class="form-signin" method="post" id="login-form" action="?c=log01"> <!--action="session_init.php"-->
       
            <?php /*?>                <?php if($err==1){
                echo "Usuario o Contraseña Erróneos <br />";
            }
            if($err==2){
                echo "Debe iniciar sesion para poder acceder el sitio. <br />";
            }
            if($err==3){
                echo "No tiene permiso para acceder a esa Sección, Ingrese Nuevamente. <br />";
            }?><?php */?>
            
                            
                      
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="usern" type="text" class="form-control" name="usern" value="" placeholder="Nombre de usuario">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="passwd" id="passwd" placeholder="Contraseña">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="remember" type="checkbox" name="remember" value="1" > Recordar contraseña.
                                        </label>
                                      </div>
                                    </div>
                                <div style="margin-top:15px" class="form-group" > 
                                	<!---->
                                    <!-- Button -->
                                    <div class=""> <!--col-sm-12 controls-->
                                      <!--<a id="btn-login" href="indexp.php" class="btn btn-success">Aceptar</a>-->
                                      <input name="btn-login"  type="submit"  class="btn btn-success" id="btn-login" value="Ingresar" />
                                      <a id="btn-login" href="#" class="btn btn-danger">Cancelar</a>
                                      <?php /*?><input name="btn-login"  type="button"  class="btn btn-primary" id="btn-login" value="Olvido Contraseña" onclick="enviarpassword();" /><?php */?>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="padding-top:15px; font-size:85%" ><!-- border-top: 1px solid#888;--> 
                                            Desarrollado por Dpto Sistemas 
                                      <!--  <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">-->
                                            versión 2.0
                                       <!-- </a>-->
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <?php  $pc=IPPC();
		
			$ip=substr($pc,0,9);
			if($ip=='192.168.0'){
		?>
        <a href="http://192.168.0.5:2531/Panelfoodz" target="_blank">Acceso Panel FoodZ</a>
        <?php 
        }else{
		?>
         <a href="http://148.102.22.93:2531/Panelfoodz" target="_blank">Acceso Panel FoodZ</a>	
        <?php } ?>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onClick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                        <span style="margin-left:8px;">or</span>  
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                        
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
<?php 
  function menuItems($items,$udni,$mod, $padre = array()){
		$menuContent = '';
    $nItems = $items;
    $urlSufix = '&udni='.$udni.'&mod='.$mod;
		foreach($items as $item){
      $new_tab = 'target="_blank"';
      if($item['new_tab']==0)
        $new_tab = '';
			//Item simple principal (sin hijos)
			if ($item['url'] != '' && $item['controladorPadre'] == null && $item['mostrar'] == 1 && empty($padre)) {
				$menuContent .= '<li><a tabindex="0" href="'.$item['url'].$urlSufix.'" style="cursor:pointer;" '.$new_tab.'>'.$item['nombre'].'</a></li>';
        $nItems = borrarElementoPorArray($nItems, $item);
			}else{
				//Item con hijos
				if($item['controladorPadre'] == null && $item['mostrar'] == 1 && empty($padre)){//1,683.79 3956 4782
          $menuContent .= '<li class="dropdown">';
          $menuContent .= '<a tabindex="0" data-toggle="dropdown" data-submenu style="cursor:pointer;">';
          $menuContent .= $item['nombre'].'<span class="caret"></span>';
          $menuContent .= '</a>';
          $menuContent .= '<ul class="dropdown-menu">';
          $nItems = borrarElementoPorArray($nItems, $item);
          $menuContent .= menuItems($nItems,$udni,$mod, $item);
          $menuContent .= '</ul>';
          $menuContent .= '</li>';
				}else{//Es un item hijo
          if(isset($padre['id']) && $padre['id'] == $item['controladorPadre'] && $item['mostrar'] == 1) {
            if(comprobarItemHijos($item, $items)){
              $menuContent .= '<li class="dropdown-submenu">';
              $menuContent .= '<a tabindex="0" style="cursor:pointer;" '.$new_tab.'>'.$item['nombre'].'</a>';
              $menuContent .= '<ul class="dropdown-menu">';
              $nItems = borrarElementoPorArray($nItems, $item);
              $menuContent .= menuItems($nItems,$udni,$mod, $item);
              $menuContent .= '</ul>';
              $menuContent .= '</li>';
            }else{
              $menuContent .= '<li><a tabindex="0" href="'.$item['url'].$urlSufix.'" style="cursor:pointer;" '.$new_tab.'>'.$item['nombre'].'</a></li>';
            }
          }
				}
			}
		}
    return $menuContent;
	}
  function comprobarItemHijos($padre, $items){
    $sw = false;
    foreach($items as $item){
      if($padre['id'] == $item['controladorPadre']){
        $sw = true;
        break;
      }
    }
    return $sw;
  }
  function borrarElementoPorArray($lista, $subarray){
    foreach($lista as $key => $valor){
      if ($valor == $subarray) {
        unset($lista[$key]);
        break;
      }
    }
    return $lista;
  }
  $mimenu = $this->login->consultarModulosDisponiblesUsuario(['udni' => $udni]);
  // var_dump($mimenu);
  // var_dump( menuItems($mimenu));
if (!$mimenu['error']) :
  $mimenu = $mimenu['data'];
  // var_dump($mimenu);
?>

<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img alt="ZGROUP SAC" src="assets/images/logo-z.png" width="105" height="30">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-size: 0.9em;">
      <ul class="nav navbar-nav">
        <?= menuItems($mimenu, $udni, $mod);?>
		<li><button type="button" class="btn btn-default navbar-btn" onclick="alertaCronograma()">Ver notificaciones</button></li>
		<li><button type="button" class="btn btn-default navbar-btn" id="notificacion">Ver</button></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a tabindex="0" data-toggle="dropdown" data-submenu style="cursor:pointer;">
            <?php
              $user = $login!=""?$login:strtoupper($_REQUEST['usern']);
            ?>
            <strong><?= $user;?></strong>
            <img src="assets/images/usuarios/<?= $user ?>.jpg"  class="img-rounded" width="25" height="25" alt=" ">
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <!-- <li class="divider"></li> -->
            <li><a tabindex="0" href="Layout.php" style="cursor:pointer;">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
endif;
?>
 
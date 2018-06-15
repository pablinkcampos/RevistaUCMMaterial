<?php
/*
guia:
---en los view---
se reemplaza el texto a mostrar por:
<?php echo lang('variable');?>

---en los diccionarios---
formato: lang['variable']  = 'lo que muestro';

en diccionario espa�ol agrgar como:
$lang['nombre variable']							='nombre variable';

en diccionario ingles agregar como:
$lang['nombre variable']							='var name';

------------------------------------------------------------------------
ejemplo practico:
antes:
<li><a data-lang="espa�ol" href="#">espa�ol</a>
<li><a data-lang="espa�ol" href="#">ingles</a>

despues:
<li><a data-lang="espa�ol" href="#"><?php echo lang('spanish');?></a>
<li><a data-lang="espa�ol" href="#"><?php echo lang('english');?></a>

diccionario espa�ol:
$lang['spanish']							='espa�ol';
$lang['english']							='ingles';

diccionario ingles:
$lang['spanish']							='spanish';
$lang['english']							='inglish';
------------------------------------------------------------------------

*/


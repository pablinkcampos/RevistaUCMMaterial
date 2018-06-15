<?php
/*
guia:
---en los view---
se reemplaza el texto a mostrar por:
<?php echo lang('variable');?>

---en los diccionarios---
formato: lang['variable']  = 'lo que muestro';

en diccionario español agrgar como:
$lang['nombre variable']							='nombre variable';

en diccionario ingles agregar como:
$lang['nombre variable']							='var name';

------------------------------------------------------------------------
ejemplo practico:
antes:
<li><a data-lang="español" href="#">español</a>
<li><a data-lang="español" href="#">ingles</a>

despues:
<li><a data-lang="español" href="#"><?php echo lang('spanish');?></a>
<li><a data-lang="español" href="#"><?php echo lang('english');?></a>

diccionario español:
$lang['spanish']							='español';
$lang['english']							='ingles';

diccionario ingles:
$lang['spanish']							='spanish';
$lang['english']							='inglish';
------------------------------------------------------------------------

*/


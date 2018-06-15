<html>
 
   <head> 
      <title><?php echo lang('vuf_upload form');?></title> 
   </head>
	
   <body> 
      <?php echo $error;?> 
      <?php echo form_open_multipart('index.php/upload/do_upload');?> 
		
      <form action = "POST" method = "http://localhost/mak_hum/index.php/upload/do_upload">
         <input type="email" name="exampleInputEmail1" id="exampleInputEmail1" placeholder="<?php echo lang('vuf_ingrese email');?>">
         <input type = "file" name = "userfile" size = "20" /> 
         <br /><br /> 
         <input type = "submit" value = "<?php echo lang('vuf_subir');?>" /> 
      </form> 
		
   </body>
	
</html>
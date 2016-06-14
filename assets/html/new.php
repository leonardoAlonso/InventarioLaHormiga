<?php include('header.php') ?>
  <body>
    <h2>Nuevo Producto</h2>
    <form class="wrapper" action="../php/add.php" method="post">
      <input title ="Se necesita el nombre" type="text" name="nombre" placeholder="Nombre Producto" required/>
      <br>
      <input title ="Se necesita la cantidad" id='stock' type="text" name="stock" placeholder="Cantidad" required onkeypress="return soloNumeros(event);"/>
      <br>
      <input title ="Se necesita el precio" id='precio_publico' type="text" name="precio_publico" placeholder="Precio Publico" required onkeypress="return soloNumeros(event);"/>
      <br>
      <input title ="Se necesita el precio" id='precio_proveedor' type="text" name="precio_proveedor" placeholder="Precio Proveedor" required onkeypress="return soloNumeros(event);"/>
      <br>
      <button class="new" type="submit" name="submit">Agregar</button>
    </form>
  </body>
</html>

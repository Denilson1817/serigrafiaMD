@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía Ortiz</h2>
    </div>
    <div class="titulo_cata">
        <h3 class="titulo-2">Agregar un producto</h3>
    </div>
</header>
<form>
    
                  <div class="form-group">
                      <label for="tamano">Selecciona un Catalogo</label>
                      <select name="tamano" class="form-control" id="tamano">
                          <option value="chico">Chico</option>
                          <option value="grande">Grande</option>
                      </select>
                      <small class="form-text text-muted">Atributo</small>
                  </div>

                  <div class="form-group">
                      <label for="tamano">Selecciona un producto</label>
                      <select name="tamano" class="form-control" id="tamano">
                          <option value="chico">Chico</option>
                          <option value="grande">Grande</option>
                      </select>
                      <small class="form-text text-muted">Atributo</small>
                  </div>
                  
                  <div class="form-group">
                      <label for="price">PRECIO</label>
                      <input type="text" name="price" class="form-control" id="price">
                  </div>

                   <div class="form-group">
                      <label for="quantity">Cantidad de unidades </label>
                      <input type="text" name="quantity" class="form-control" id="quantity">
                  </div>
                  <button type="submit" class="btn btn-primary">Agregar al carrito</button>
              </form>
<h1>Fotos do Produto</h1>

<form id="addfoto" action="/fotos/{{$produto->idprodutos}}" method="post" enctype="multipart/form-data">
    <b>Adicionar Fotos</b><br>
    <input id="foto" type="file" name="foto" accept="image/*" /><br/>
    @method('put')
    @csrf
</form>

<br><h2>Para Excluir Clique No "X"<h2><br>

@foreach($fotos as $foto)

    @if ($loop->first) 
        <input form="addfoto" type="hidden" name="fotoproduto" value="{{$foto->fotos}}">
    @endif
      <form action="/fotos/{{$foto->idfotos}}" method="post">
      <div class="image-area">
          <img src="{{$foto->fotos}}"  alt="Preview">
          <button class="remove-image" type="submit" style="display: inline;">&#215;</button>
          @method('delete')
          @csrf
        </div>
      </form>
      <br>
  </div>


@endforeach 
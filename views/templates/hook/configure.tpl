{if $save}
    <div class="bootstrap">
        <div class="module_confirmation conf confirm alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            Datos guardados exitosamente.
        </div>
    </div>
{/if}

<form action="" method="post">
    <div class="form-group">
        <label for="bg-image">Ingrese la URL de la imagen que desea en el Background de la publicidad</label>
        <input type="text" name="bg-image" id="bg-image" class="form-control" value="{$image_value}">
    </div>
    <div class="form-group">
        <label for="ad-title">Titulo del anuncio</label>
        <input type="text" name="ad-title" id="ad-title" class="form-control" value="{$title_value}">
    </div>
    <div class="form-group">
        <label for="bg-image">Descripción corta del anuncio</label>
        <input type="text" name="ad-description" id="ad-description" class="form-control" value="{$description_value}">
    </div>
    <div class="form-group">
        <label for="bg-image">Texto del 'Call to action'</label>
        <input type="text" name="cta-text" id="cta-text" class="form-control" value="{$cta_text_value}">
    </div>
    <div class="form-group">
        <label for="bg-image">URL a dónde dirigirá el 'Call to action'</label>
        <input type="text" name="cta-url" id="cta-url" class="form-control" value="{$cta_url_value}">
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="display-ad" id="display-ad-true" value="display">
        <label class="form-check-label" for="display-ad-true">Habilitar anuncio</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="display-ad" id="display-ad-false" value="nodisplay">
        <label class="form-check-label" for="display-ad-false">Deshabilitar anuncio</label>
    </div>
    <button type="submit" name="submit-ad" class="btn btn-primary">Enviar</button>
</form>
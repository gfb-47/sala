<div class="row">
    <div class="col-md-6">
        {!!Form::text('nome', 'Nome do Ambiente')
        ->required()
        ->attrs(['maxlength' => 45,'class'=>'required'])!!}
    </div>
    <div class="col-md-6">
        {!!Form::select('tipoambiente', 'Tipo do Ambiente')
        ->options($tipoambiente->prepend('Selecione...', ''))
        ->required() !!}
    </div>
    <div class="col-12">
        <label class="required">Termo de Uso</label><br />
        <canvas id="pdfViewer" class="pdf-miniatura" style="width:300px; height:500px; border: 1px solid black"></canvas>
        <div class="buttons-relatorio">
            <label class="btn btn-block btn-primary btn-gerar-relatorio">
                Anexar PDF (Tamanho max. 2Mb)
                <input class="custom-file-input form-control @if($errors->has('termodeuso')) is-invalid @endif"
                    style="display: none;" name="termodeuso" type="file" id="pdf" required/><br>
            </label>
        </div>

    </div>

</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-primary float-right mt-4">Salvar</button>
    </div>
</div>
@push('js')
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script>
$(":submit").on("click", function() {
         if($('#pdf').val() == ''){
            alert('Seleciona um PDF')
         }else{
             this.form.submit();
}});

$(document).ready(function() {
    stripes()


    // Loaded via <script> tag, create shortcut to access PDF.js exports.
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

    var validation = "{{ isset($item) && $item->termodeuso != null }}";
    var pdf = "{{(isset($item) && $item->termodeuso != null) ? asset('storage/'. $item->termodeuso) : '' }}";
    if (validation == 1) {
        pdfjsLib.getDocument({
            url: pdf
        }).promise.then(function(pdf) {
            var canvas = $("#pdfViewer")[0];
            var context = canvas.getContext('2d');

            pdf.getPage(1).then(function(page) {
                var scale = 1.5;
                var viewport = page.getViewport({
                    scale: scale
                });

                // Prepare canvas using PDF page dimensions
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                var renderTask = page.render(renderContext);
            });
        });
    }



    $("#pdf").on("change", function(e) {

        var file = e.target.files[0];
        var canvas = $("#pdfViewer")[0];
        var context = canvas.getContext('2d');

        if (file.type == "application/pdf") {
            if (file.size <= 2048000) {
                var fileReader = new FileReader();
                fileReader.onload = function() {
                    var pdfData = new Uint8Array(this.result);
                    // Using DocumentInitParameters object to load binary data.
                    var loadingTask = pdfjsLib.getDocument({
                        data: pdfData
                    });
                    loadingTask.promise.then(function(pdf) {
                        console.log('PDF loaded');
                        // Fetch the first page
                        var pageNumber = 1;
                        pdf.getPage(pageNumber).then(function(page) {
                            console.log('Page loaded');

                            var scale = 1.5;
                            var viewport = page.getViewport({
                                scale: scale
                            });
                            // Prepare canvas using PDF page dimensions
                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            // Render PDF page into canvas context
                            var renderContext = {
                                canvasContext: context,
                                viewport: viewport
                            };
                            var renderTask = page.render(renderContext);
                            renderTask.promise.then(function() {
                                console.log('Page rendered');
                            });
                        });
                    }, function(reason) {
                        // PDF loading error
                        console.error(reason);
                    });
                };
                fileReader.readAsArrayBuffer(file);
            } else {
                $(this).val('');
                canvas.height = 0;
                canvas.width = 0;
                alert('Desculpe, o tamanho do arquivo ultrapassa 2MB')
            }
        } else {
            $(this).val('');
            canvas.height = 0;
            canvas.width = 0;
            alert('Desculpe, o formato do arquivo deve ser .pdf')
        }

    });

    function stripes() {
        $(".control-group").each(function(i, el) {
            $(this).removeClass("striped");
            if (i !== 0) {
                $(this).addClass("mt-4");
                $(this).children('.col-12').removeClass("d-none");
            } else {
                $(this).children('.col-12').addClass("d-none");
            }
        });
        $(".control-group:odd").each(function() {
            $(this).addClass("striped");
        });
    }

});
</script>


@endpush
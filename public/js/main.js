(function ($) {
    "use strict";

    $body = $("body");

    $(document).on({
        ajaxStart: function () {
            $body.addClass("loading");
        },
        ajaxStop: function () {
            $body.removeClass("loading");
        },
    });

    $("input[required], select[required], textarea[required]")
        .siblings("label")
        .addClass("required");

    $(".cep").mask("00000-000");
    $(".cpf").mask("000.000.000-00", {
        reverse: true,
    });
    $(".cnpj").mask("00.000.000/0000-00", {
        reverse: true,
    });

    $(".money").mask("0.000.000,00", {
        reverse: true,
    });

    $(".time").mask("00:00");

    $(".account").mask("00000000000-0", {
        reverse: true,
    });

    $(".agency").mask("0000-0");

    $(".account").mask("00000000000-0", {
        reverse: true,
    });

    $(document).on("focus", ".money", function () {
        $(this).mask("0.000.000,00", {
            reverse: true,
        });
    });

    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, "").length === 11
                ? "(00) 00000-0000"
                : "(00) 0000-00009";
        },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            },
        };

    $(".phone").mask(SPMaskBehavior, spOptions);

    $("#image").change(function () {
        var imgPath = $(this)[0].value;
        var ext = imgPath.substring(imgPath.lastIndexOf(".") + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            window.utilities.readUrl(this);
        else
            alert("Por favor, selecione o arquivo de imagem (jpg, jpeg, png).");
    });
    $("#icone").change(function () {
        var imgPath = $(this)[0].value;
        var ext = imgPath.substring(imgPath.lastIndexOf(".") + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            window.utilities.readUrl(this);
        else
            alert("Por favor, selecione o arquivo de imagem (jpg, jpeg, png).");
    });

    $(".select2").select2({
        language: "pt-BR",
    });


    $(".btn-delete").on("click", function (e) {
        e.preventDefault();
        var form = $(this).parents("form").attr("id");
        swal({
            title: "Você está certo?",
            text:
                "Uma vez deletado, você não poderá recuperar esse item novamente!",
            icon: "warning",
            buttons: true,
            buttons: ["Cancelar", "Excluir"],
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                document.getElementById(form).submit();
            } else {
                swal("Este item está salvo!");
            }
        });
    });
    $(".btn-change").on("click", function (e) {
        e.preventDefault();
        var form = $(this).parents("form").attr("id");
        swal({
            title: "Você está certo?",
            text:
                "Atenção, você está preste a alterar o status deste item e isso pode alterar a visibilidade dele dentro do sistema. Tem certeza dessa operação?",
            icon: "warning",
            buttons: true,
            buttons: ["Cancelar", "Alterar"],
            dangerMode: true,
        }).then((isConfirm) => {
            if (isConfirm) {
                document.getElementById(form).submit();
            } else {
                swal("Status Mantido com sucesso");
            }
        });
    });

    $(".btn-add").on("click", function () {
        var $tr = $(".dynamic-form");
        var $clone = $tr.clone();
        $clone.show();
        $clone.removeClass("dynamic-form");
        $clone.find("input,select").val("");
        $(".table-dynamic tbody").append($clone);
    });

    $(".multi-select").bootstrapDualListbox({
        nonSelectedListLabel: "Disponíveis",
        selectedListLabel: "Selecionados",
        filterPlaceHolder: "Filtrar",
        filterTextClear: "Mostrar Todos",
        moveSelectedLabel: "Mover Selecionados",
        moveAllLabel: "Mover Todos",
        removeSelectedLabel: "Remover Selecionado",
        removeAllLabel: "Remover Todos",
        infoText: "Mostrando Todos - {0}",
        infoTextFiltered:
            '<span class="label label-warning">Filtrado</span> {0} DE {1}',
        infoTextEmpty: "Sem Dados",
        moveOnSelect: false,
    });

    $(document).delegate(".btn-remove", "click", function (e) {
        e.preventDefault();
        swal({
            title: "Você esta certo?",
            text: "Deseja remover esse item mesmo?",
            icon: "warning",
            buttons: true,
        }).then((willDelete) => {
            if (willDelete) {
                if ($(this).closest("tr").hasClass("remove")) {
                    $(this).closest("tr").hide();
                    $(this).siblings("input").val(1);
                } else {
                    $(this).closest("tr").remove();
                }
            }
        });
    });

    $(".imagem").on('change',function() {
        readURL(this);
    });
            
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                    
            reader.onload = function(e) {
            $('.image-thumbnail').attr('src', e.target.result);
            }
            $('#thumbnail').css('height','auto');
                    
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
})(jQuery);

function getUrl() {
    return document.getElementById("baseurl").value;
}

$(document).ready(function(){
  
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('#image-preview1').attr('src', e.target.result);
        $('#image-preview').attr('src', e.target.result);
        $('#image-preview1 ,#image-preview ').hide();
        $('#image-preview1 ,#image-preview ').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
    }

    $("#file-input").change(function() {
    readURL(this);
    });
 

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#image-previewdesign').attr('src', e.target.result);
                $('#image-previewdesign1').attr('src', e.target.result);
                $('#image-previewdesign ,#image-previewdesign1 ').hide();
                $('#image-previewdesign ,#image-previewdesign1 ').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
            }
    
            $("#file-input1").change(function() {
            readURL(this);
            });

        $('input[name="modalTitle"]').on('keydown, keyup', function () {
            var texInputValue = $('input[name="modalTitle"]').val();
            $('#preview-container .BarPreview .modaltitle').html(texInputValue);
          });
        
          $('textarea[name="Massage"]').on('keydown, keyup', function () {
            var texInputValue = $('textarea[name="Massage"]').val();
            $('#preview-container .BarPreview .addMassage').html(texInputValue);
          });

          $('input[name="addBtn"]').on('keydown, keyup', function () {
            var texInputValue = $('input[name="addBtn"]').val();
            $('#preview-container .BarPreview .Addmsgbtn').html(texInputValue);
          });

       
          

        // modal open close
        $(".Click-here").on('click', function() {
            $(".custom-model-main").addClass('model-open');
          }); 
          $(".close-btn, .bg-overlay").click(function(){
            $(".custom-model-main").removeClass('model-open');
          });
           //   Design page
        $('input[name="texticon"]').on('keydown, keyup', function () {
            var texInputValue = $('input[name="texticon"]').val();
            $('#settings-content .BarPreview .middletext').html(texInputValue);
          });

          $("#iconposition").on("change", function () {
            var valcolor = $("#iconposition").val();
            var posChange= $(this).closest('#settings-content').find(".BarPreview .iconpos ");
            var imgChange= $(this).closest('#settings-content').find(".BarPreview .iconpos #image-previewdesign1");
            var textChange= $(this).closest('#settings-content').find(".BarPreview .iconpos .middletext");
            if (valcolor== "0") {
              textChange.addClass("bottom__right");
              imgChange.removeClass("imgflex");
              posChange.removeClass("flexcenter");
              textChange.removeClass("bottomleft centerright bottomcenter");
            }
            else if (valcolor== "1") {
              imgChange.addClass("imgflex");
              textChange.addClass("bottom__right");
              posChange.removeClass("flexcenter iconwrap");
              textChange.removeClass("bottomleft centerright bottomcenter");
            }
            else if(valcolor== "2"){
              textChange.addClass("bottomleft  bottomcenter");
              posChange.addClass("iconwrap");
              imgChange.removeClass("imgflex");
              textChange.removeClass("bottom__right centerright ");
              posChange.removeClass("flexcenter");
            }
            else if(valcolor== "3"){
              textChange.addClass(" bottomcenter bottomleft");
              posChange.addClass("iconwrap");
              imgChange.addClass("imgflex");
              posChange.removeClass("flexcenter");
              textChange.removeClass("bottom__right  centerright");
            }
            else if(valcolor== "4"){
              textChange.addClass(" bottomcenter");
              // posChange.addClass("iconwrap");
              imgChange.addClass("imgflex");
              posChange.removeClass("iconwrap flexcenter");
              textChange.removeClass("bottomleft bottom__right centerright");
            }
            else if(valcolor== "5"){
              textChange.addClass("bottomright  ");
              posChange.addClass("iconwrap");
              imgChange.removeClass("imgflex");
              posChange.removeClass("flexcenter");
              textChange.removeClass("bottom__right bottomleft centerright bottomcenter");
            }
            else if(valcolor== "6"){
              posChange.addClass("flexcenter");
              posChange.removeClass("iconwrap");
              imgChange.addClass("imgmar");
              imgChange.removeClass("imgflex");
              textChange.removeClass("bottom__right bottomleft centerright bottomcenter");
            }
            else if(valcolor== "7"){
              imgChange.addClass("imgflex");
              textChange.addClass("centerright  ");
              posChange.removeClass("flexcenter iconwrap");
              textChange.removeClass("bottom__right bottomleft bottomcenter" );
            }
            else if(valcolor== "8"){
              imgChange.removeClass("imgflex");
              textChange.addClass("centerright  ");
              posChange.removeClass("flexcenter iconwrap");
              textChange.removeClass("bottom__right bottomleft bottomcenter");
            }
          });
          

});

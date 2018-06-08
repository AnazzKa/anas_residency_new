// Reponsive Menu Script
jQuery(document).ready(function($){ 
    $('.w-menu ul li:has(ul)').prepend('<span class="arrow-plus" />');
    $(".arrow-plus").click(function(){
        
        $(this).parent('li').find('ul:first').toggleClass('w-submenu');
        $(this).toggleClass('arrow-minimize');
    });

    $('.mobile-menu-icon').click(function(e){
        e.preventDefault();
        $(".mobile-menu-icon").toggleClass('icon-open');
        $(".mobile-menu").toggleClass('menu-open');
        $('.w-menu ul').removeClass('w-submenu');
        $('.arrow-plus').removeClass('arrow-minimize');
    });
})



$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });     
});
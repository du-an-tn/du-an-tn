jQuery(document).ready(function($) {
    $('#sort').on('change', function() {
        var url = $(this).val();
        // alert(url);
        if(url){
            window.location = url;
        }
        return false;
    });
    locdanhsach();
    function locdanhsach() {
        var url = window.location.href;

        $('select[name="sort"]').find('option[value="'+url+'"]').attr("selected",true);
    }


});
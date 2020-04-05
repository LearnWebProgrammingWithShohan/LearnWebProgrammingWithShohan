


(function($) {
    $('.add-tag-database').click(function (event) {
        event.preventDefault();
        let tags = $('#input-tags').val();
        if (tags.length == 0 || tags == undefined || tags == ''){
            $('#msg').text("Tag field must not be empty");
        }else{
            $('#msg').text("");
            $.get( "action/tag.php",{"tags": tags}, function( response ) {
                console.log(response);
                if (response.status == "success"){
                    $('#input-tags').val("");
                    $('#msg').text(response.message);
                }
                if(response.status == 'fail'){
                    $('#input-tags').val("");
                    $('#msg').text(response.message);
                }
            });
        }
    });

})(jQuery)









tinymce.init({
    selector: '.textarea',
    menubar: false,
    plugins: "link, image",
    block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3',
    toolbar: [
        'undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright |'
    ],
    branding: false
});
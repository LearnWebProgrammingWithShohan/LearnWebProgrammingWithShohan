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
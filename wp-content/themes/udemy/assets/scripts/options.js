jQuery(function($){
    var frame = wp.media({
        title: Select or upload logo',
        button: {
            text: 'Use this media'
        },
        multiple: false
    });

    $('#cu_uploadLogoImgBtn').on('click', function(e){
        e.preventDefault();
        frame.open();
    })

    frame.on('select', function() {
        var attachment = frame.state().get('selection').first().toJSON();
        $('input[name=cu_inputLogoImg]').val(attachment.url);
    })
});

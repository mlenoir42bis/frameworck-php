
    function resizeWidthTag(tag, parentTag) {
        let width = $(window).width();
        let widthParent = parentTag.outerWidth(true);
        let newWidth = 0;
        
        if (widthParent < width) {
            newWidth = widthParent;
        }
        else {
            newWidth = width;
        }
        
        tag.css({
            width : newWidth
        });
    }

    function resizeWithTagOnResize(tag, parentTag) {
        resizeWidthTag($(tag), $(parentTag));
        $( window ).resize(function() {
            resizeWidthTag($(tag), $(parentTag));
        });
    }

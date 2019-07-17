
    function changeActive() {
        $(".list-group").on('click', ".list-group-item", function(e){
            if (!$(this).hasClass("list-group-item-multi")) {
                $(this).parent().find('li').removeClass("active");
                $(this).addClass("active");
            }
        });
    }
    
    function changeActiveMulti() {
        $(".list-group").on('click', ".list-group-item-multi", function(e){
            if ($(this).hasClass("active"))
            {
                $(this).removeClass("active");
            }
            else {
                $(this).addClass("active");
            }
        });
    }

    function listGroupBoolShowOnActive(liActive, blockShow) {
        $(".list-group").on('click', ".list-group-item-bool", function(e){
            if ($(liActive).hasClass('active')) {
                $(blockShow).show();
            }
            else {
                $(blockShow).hide();
            }
        });
    }

/// <reference path="typedef/jquery.d.ts" />
/// <reference path="Types.ts" />

/**
 * Created by agustina on 29-ene-16.
 */
function togglefollow(user, toggle){
    $.post( APP_URL+"/user/follow", { "_method": "post", '_token': $('input[name="_token"]').val(), user: user, toggle: toggle } )
        .done(function( data ) {
            if(data === "ok"){
                var btn = $('#follow');
                var $count = $('#numberFollows');
                if(toggle === 'f'){
                    btn.html('<i class="fa fa-check m-r-5"></i>Follow');
                    btn.attr('onclick', "togglefollow("+user+", 'u')");
                    $count.text(parseInt($count.text(), 10)+1);
                }else if(toggle === 'u'){
                    btn.html('Follow');
                    btn.attr('onclick', "togglefollow("+user+", 'f')");
                    $count.text(parseInt($count.text(), 10)-1);
                }

            }
        });
}

function togglefavorite(user, toggle){
    $.post( APP_URL+"/user/favorite", { "_method": "post", '_token': $('input[name="_token"]').val(), user: user, toggle: toggle } )
        .done(function( data ) {
            var btn = $('#favorite');
            if(data === "ok"){
                var $count = $('#numberFavorites');
                if(toggle === 'f'){
                    $count.text(parseInt($count.text(), 10)+1);
                    btn.html('<i class="fa fa-check m-r-5"></i>Favorite');
                    btn.attr('onclick', "togglefavorite("+user+", 'u')");
                }else if(toggle === 'u'){
                    btn.text('Favorite');
                    btn.attr('onclick', "togglefavorite("+user+", 'f')");
                    $count.text(parseInt($count.text(), 10)-1);
                }

            }
        });
}

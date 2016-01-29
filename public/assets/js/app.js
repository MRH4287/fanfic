/**
 * Created by agustina on 29-ene-16.
 */
function togglefollow(user, toggle){
    $.post( APP_URL+"/user/follow", { "_method": "post", '_token': $('input[name="_token"]').val(), user: user, toggle: toggle } )
        .done(function( data ) {
            var btn = $('#follow');
            if(data == "ok"){
                if(toggle == 'f'){
                    btn.html('<i class="fa fa-check m-r-5"></i>Follow');
                    btn.attr('onclick', "togglefollow("+user+", 'u')");
                }else if(toggle == 'u'){
                    btn.html('Follow');
                    btn.attr('onclick', "togglefollow("+user+", 'f')");

                }

            }
        });
}

function togglefavorite(user, toggle){
    $.post( APP_URL+"/user/favorite", { "_method": "post", '_token': $('input[name="_token"]').val(), user: user, toggle: toggle } )
        .done(function( data ) {
            var btn = $('#favorite');
            if(data == "ok"){
                if(toggle == 'f'){
                    btn.html('<i class="fa fa-check m-r-5"></i>Favorite');
                    btn.attr('onclick', "togglefavorite("+user+", 'u')");
                }else if(toggle == 'u'){
                    btn.text('Favorite');
                    btn.attr('onclick', "togglefavorite("+user+", 'f')");

                }

            }
        });
}

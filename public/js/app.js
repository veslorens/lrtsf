function clog(d){console.log(d)}
function isEmpty(d){return d==="" && typeof d==="string"}
function flashMessage(con, msg){$(con).removeClass('hidden').text(msg);}
function vd8Empty(elm, msg){if(isEmpty($(elm).val())){flashMessage('.msgError', msg);return true;}}
function renode(url, con, dialog){
    $.get(url).fail(function(res){console.log(res)}).done(function(res){
        $(con).empty().append(res);
    }).always(function(){dialog.close()});
}
function CountDownTimer(dt, id, primeText, expiredText){
    var end = new Date(dt);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour   = _minute * 60;
    var _day    = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end.getTime() - now.getTime();
        if (distance < 0) {
            clearInterval(timer);
            $('#'+id).text(expiredText);
            return;
        }

        var hours   = Math.floor(distance / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        var output = primeText;
        output += hours   + ':';
        output += minutes + ':';
        output += seconds;
        $('#'+id).text(output);
    }
    timer = setInterval(showRemaining, 1000);
}
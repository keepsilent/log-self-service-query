
var request = (function () {

    var post = function (object) {
        var url = object.url;
        var data = object.data;
        var sCallback = object.success;
        var eCallback = object.error;
        var cCallback = object.complete;

        $.ajax({type: 'post',url: url, data: data, dataType: 'json',success:function (result) {
            if(result.code !== 0) {
                console.log(result.message);
                alert(result.message);
                return false;
            }

            if(typeof sCallback === "function") {
                sCallback(result);
            }

        }, error: function (result) {
            if(typeof eCallback === "function") {
                eCallback(result);
            }
        }, complete: function () {
            if(typeof cCallback === "function") {
                cCallback();
            }
        }});
    }

    return {
        post:post
    }
})();







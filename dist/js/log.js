/**
 * 查找文件日志
 * by keepsilent
 */
var log = (function () {

    /**
     * 查询
     * @method find
     */
    var find = function () {
        var url = '/api.php?action=getLog';
        var data = {
            path: $('#log-select').val(),
            page: $('input[name="page"]:checked').val()
        }

        if(data.path === '') {
            alert('请选择查询日志');
            return false;
        }

        $('#log-result').html('正在努力加载中....');
        request.post({url: url,data:data,success:function (result) {
            $('#log-result').html(result.data);
        }});
    }


    /**
     * 获取文件
     * @method getFile
     * @param  {String} path 文件根目录
     */
    var getFile = function (path) {
        var data = { path: path };
        var url = '/api.php?action=getFile';
        request.post({url: url,data:data,success:function (result) {
            var html = '<option value="">请选择日志</option>';
            for(var i in result.data) {
                path = data.path+result.data[i];
                html += '<option value="'+path+'">'+result.data[i]+'</option>';
            }
            $('#log-select').html(html);
        }});
    }

    /**
     * 选择文件路径
     * @method selectPath
     * @param {Object} _this 当前对象
     */
    var selectPath = function (_this) {
        var path = _this.val();
        getFile(path);
    }

    /**
     * 清空
     * @method clean
     */
    var clean = function () {
        $('#log-result').html('');
    }
    
    var init = function () {
        var path = $('input[name="path"]:checked').val();

        getFile(path);
    }

    return {
        init: init,
        find: find,
        clean: clean,
        selectPath: selectPath
    }
})();






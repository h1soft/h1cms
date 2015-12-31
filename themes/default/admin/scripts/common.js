$(document).ready(function () {
});
var REST = {
    post: function (reqUrl, reqData, reqDataType, successFunc, errorFunc) {
        $.ajax({
            url: reqUrl,
            type: 'POST',
            data: reqData,
            dataType: reqDataType,
            success: successFunc,
            error: errorFunc
        });
    },
    get: function (reqUrl, reqData, reqDataType, successFunc, errorFunc) {
        $.ajax({
            url: reqUrl,
            type: 'GET',
            data: reqData,
            dataType: reqDataType,
            success: successFunc,
            error: errorFunc
        });
    },
    delete: function (reqUrl, reqData, reqDataType, successFunc, errorFunc) {
        $.ajax({
            url: reqUrl,
            type: 'DELETE',
            data: reqData,
            dataType: reqDataType,
            success: successFunc,
            error: errorFunc
        });
    },
    put: function (reqUrl, reqData, reqDataType, successFunc, errorFunc) {
        $.ajax({
            url: reqUrl,
            type: 'PUT',
            data: reqData,
            dataType: reqDataType,
            success: successFunc,
            error: errorFunc
        });
    }
};
var confirmDialog;
var loading;
var messageDialog;
var UI = {
    confirm: function (message, title, okCallback, cancelCallback) {
        confirmDialog = dialog({
            title: title,
            content: message,
            fixed: true,
            okValue: '确定',
            ok: okCallback,
            cancelValue: '取消',
            cancel: cancelCallback
        });
        confirmDialog.width(300).height(50);
        confirmDialog.showModal();
    },
    loading: function (message) {
        loading = dialog({
            content: message,
            fixed: true
        }).showModal();
    },
    showMessage: function (message, title) {
        messageDialog = dialog({
            fixed: true,
            title: title,
            content: message,
            okValue: '确定',
            ok: function () {
                setTimeout(function () {
                    messageDialog.close().remove();
                }, 2000);
            }
        });
        messageDialog.width(300).height(50);
        messageDialog.show();
    }
};
function RESTDelete(url, params, message,redirect) {
    UI.confirm(message, '系统信息',
            function () { 
                confirmDialog.close().remove();
                UI.loading('<br/><span class="ui-dialog-loading">Loading..</span><br/>正在删除,请不要刷新!');
                REST.delete(url, params, 'json', function (data) {
                    if (data.code === 0) {
                        loading.close().remove();
                        if (typeof (redirect) === 'undefined') {
                            location.href = location.href;
                        } else {
                            location.href = redirect
                        }
                    } else {
                        UI.showMessage(data.message, '系统信息');
                    }

                });
                return false;
            }, 
            function () {

            }
    );
}
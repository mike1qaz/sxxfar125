/**
 * common.js
 *
 * 通用公共js
 *
 * */
// 星云框架全局变量对象,
var NBLF = NBLF || {};

/**
 * @desc 全局公用js
 * @depends jQuery,artTemplte
 */
(function ($, artTemplate) {
    NBLF.dialog = function (content, title, id, width, height, okValue, okCallback, cancelValue, cancelCallback) {
        $.artDialog({
            id: id || 'systemDialog',
            title: title || '系统弹出框',
            okValue: okValue || '确认',
            cancelValue: cancelValue || '取消',
            width: width || 800,   // 宽度默认800px
            height: height || null,// 高度默认自适应
            content: content,
            ok: function () {
                if ($.isFunction(okCallback) && okCallback() === false) {
                    return false;
                }
                ;
                this.close().remove();
            },
            cancel: function () {
                if ($.isFunction(cancelCallback) && cancelCallback() === false) {
                    return false;
                }
                ;
                this.close().remove();
            },
            lock: true
        }).showModal();
    }

    
    /**
     * 弹出信息
     */
    NBLF.showMsg = function (content, title, id, okCallback, width) {
        $.artDialog({
            id: id || 'systemMessage',
            title: title || '系统消息',
            okValue: '关闭',
            width: width || 320,
            content: '<div class="f16 msg-font-color ">' + content + '</div>',
            ok: function () {
                $.isFunction(okCallback) && okCallback();
                return true;
            },
            lock: true
        }).showModal();
    }



    /**
     * 弹出信息(操作成功)
     */
    NBLF.showOk = function (content, title, okCallback) {
        var id = 'systemOk';
        var content = '<div class="fl f16 success-color" style="width:270px;height:40px;padding-top:10px;"><span class="inblo wrap break" style="line-height:20px;">' + ( content || '操作成功！' ) + '</span></div>';
        var title = title || '系统消息';
        NBLF.showMsg(content, title, id, okCallback);
    }
   
    NBLF.showOkMsg = function (content, title, okCallback, that) {
        var id = 'systemOk';
        var content = '<div class="fl f16 success-color" style="width:270px;height:40px;padding-top:10px;"><span class="inblo wrap break" style="line-height:20px;">' + ( content || '操作成功！' ) + '</span></div>';
        var title = title || '系统消息';
        NBLF.showMsgnomodal(content, title, id, okCallback, that);
    }

    /**
     * 弹出信息(操作失败)
     */
    NBLF.showErr = function (content, title, okCallback,width) {
        var id = 'systemError';
        var content = '<div class="inblo vm warning-color" style="height:50px;line-height:40px;width:45px;font-size:40px;"><i class="icon-exclamation-sign"></i></div>'
            + '<div class="inblo f16 warning-color" style="width:270px;height:50px;padding-top:10px;"><span class="inblo wrap break" style="line-height:20px;">' + ( content || '操作失败！' ) + '</span></div>';
        var title = title || '系统消息';
        NBLF.showMsg(content, title, id, okCallback,width);
    }
    
    NBLF.showErrMsg = function (content, title, okCallback, that,width) {
        var id = 'systemError';
        var content = '<div class="inblo vm warning-color" style="height:50px;line-height:40px;width:45px;font-size:40px;"><i class="icon-exclamation-sign"></i></div>'
            + '<div class="inblo f16 warning-color" style="width:270px;height:50px;padding-top:10px;"><span class="inblo wrap break" style="line-height:20px;">' + ( content || '操作失败！' ) + '</span></div>';
        var title = title || '系统消息';
        NBLF.showMsgnomodal(content, title, id, okCallback, that,width);
    }

    /**
     * 弹出确认
     */
    NBLF.confirm = function (content, yes, no) {
        var content = '<div class="inblo vm warning-color" style="height:50px;line-height:40px;width:45px;font-size:40px;"><i class="icon-exclamation-sign"></i></div>'
            + '<div class="inblo f16 msg-font-color" style="width:270px;height:50px;padding-top:10px;"><span class="inblo" style="line-height:20px;">' + ( content || '操作失败！' ) + '</span></div>';
        return $.artDialog({
            id: 'Confirm',
            title: '操作确认',
            width: 320,
            lock: true,
            content: content,
            okValue: '确认',
            cancelValue: '取消',
            ok: function (here) {
                return yes && yes.call(this, here);
            },
            cancel: function (here) {
                return no && no.call(this, here);
            }
        }).showModal();
    }

    /**
     *
     * @param content
     * @param yes
     * @param no
     * @param that
     * @param id
     * @returns {*}
     */
    NBLF.confirmnomodal = function (content, yes, no, that, id, exclusive) {
        if(exclusive){
            $.each($.artDialog.list, function(index, obj){
                obj.close();
            });
        }
        var content = '<div class="inblo vm warning-color" style="height:50px;line-height:40px;width:45px;font-size:40px;"><i class="icon-exclamation-sign"></i></div>'
            + '<div class="inblo f16 msg-font-color" style="width:270px;height:50px;padding-top:10px;"><span class="inblo" style="line-height:20px;">' + ( content || '操作失败！' ) + '</span></div>';
        return $.artDialog({
            id: id || 'Confirm',
            title: '操作确认',
            width: 320,
            lock: true,
            content: content,
            okValue: '确认',
            cancelValue: '取消',
            ok: function (here) {
                return yes && yes.call(this, here);
            },
            cancel: function (here) {
                return no && no.call(this, here);
            }
        }).show(that);
    }

    NBLF.mobileconfirmnocancel = function (content, yes) {
        var content = '<div class="inblo f16 msg-font-color" style="width:240px;height:40px;padding-top:10px;"><span class="inblo" style="line-height:20px;">' + ( content || '操作失败！' ) + '</span></div>';
        return $.artDialog({
            id: 'Confirm',
            title: '操作确认',
            width: 240,
            lock: true,
            content: content,
            okValue: '确认',
            ok: function (here) {
                return yes && yes.call(this, here);
            }
        }).showModal();
    }

    /**
     * 遮罩
     * @params  {String}  遮罩提示
     * @params  {String}    'open'  打开mask
     *                        'close' 关闭mask
     */
    NBLF.mask = function (tips, type) {
        tips = tips || '请求处理中，请耐心等待...';

        NBLF._maskDialog = NBLF._maskDialog || $.artDialog({
            id: 'waiting',
            title: '请稍后',
            width: 320,
            lock: true,
            content: '<div style="height:70px;"><div class="loadingSpan inblo vm"></div><div class="inblo vm f14" style="height:70px;line-height:70px; padding-left:10px;">' + tips + '</div></div>',
            cancelValue: '关闭',
            cancel: false
        });

        // 设置tips内容
        NBLF._maskDialog.content('<div style="height:70px;"><div class="loadingSpan inblo vm"></div><div class="inblo vm f14" style="height:70px;line-height:70px; padding-left:10px;">' + tips + '</div></div>');

        if (type) {
            if (type === 'open') {
                NBLF._maskDialog.showModal();
                //return newMaskDialog();
            } else if (type === 'close') {
                NBLF._maskDialog.close();
            }
        } else if (NBLF._maskDialog && NBLF._maskDialog.open) {
            NBLF._maskDialog.close();
        } else {
            NBLF._maskDialog.showModal();
        }
    }
 
    /**
     * 短暂提示
     * @param    {String}    提示内容
     * @param    {Number}    显示时间 (默认1.5秒)
     */
    NBLF.tips = function (content, time) {
        var dialog = $.artDialog({
            id: 'Tips',
            title: false,
            cancel: false,
            content: '<div style="padding: 0 1em;">' + content + '</div>',
            fixed: true,
            lock: false
        });
        dialog.show();
        setTimeout(function () {
            dialog.remove();
        }, time || 1500);
    };

   
})(jQuery, template);

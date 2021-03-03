<?php
include "./util/checksession.php";
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <title>用户管理</title>
<?php
getcss("ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css");
getcss("ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css");
getcss("ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css");
getcss("ajax/libs/bootstrap-select/2.0.0-beta1/css/bootstrap-select.min.css");
getcss("./css/popup.css", true);
getcss("./css/loadingImage.css", true);

getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js");
getjs("ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js");
getjs("ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js");
getjs("ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js");
getjs("js/layer/layer.js", true);
?>
    <style type="text/css">
        h1 {
            display: inline-block;
        }

        h3 {
            display: inline;
        }

        .vip_input {
            margin-top: 10px;
        }

        .buttons {
            margin-top: 10px;
        }

        .popup {
            height: auto;
            width: 260px;
        }

        .setting-section {
            border-bottom: silver solid 1px;
            padding: 24px 0;
        }

        .setting-label {
            display: inline-block;
            font-size: 16px;
            margin: 0 10px;
            min-width: 100px;
            font-weight: 700 !important;
        }

        .setting-item {
            margin: 10px 0;
        }
    </style>

    <script type="text/javascript">
        $(function () {
            refreshTbl();
            initMenu();
            $('#user_auth').on('shown.bs.modal', function (e) {
                $("#user_id_auth").val(e.relatedTarget.dataset.userId);
                $('.toggle-button').bootstrapToggle('off')
                $.ajax({
                    url: "util/userOperation?op=6&userid="+e.relatedTarget.dataset.userId,
                    success: function (res) {
                        res = JSON.parse(res);
                        let auth = [];
                        Object.keys(res.auth).forEach(m => {
                            res.auth[m].forEach(d => {
                                auth.push("m_" + m + "_" + d);
                            })
                        });
                        auth.forEach(m => {console.log(m);$("#" + m).bootstrapToggle('on')});
                    }
                });
            });
        });

        function refreshTbl(keyword) {
            $("#loadingImage").show();
            $("#tbl_user").bootstrapTable("destroy");
            $("#tbl_user").bootstrapTable({
                method: "post",
                uniqueId: "id",
                url: "util/userOperation?keyword=",
                pagination: true,
                pageSize: 40,
                pageList: [40, 60, 100],
                // sidePagination: "client",
                pageNumber: 1,
                queryParamsType: "",
                contentType: "application/x-www-form-urlencoded",
                onPostBody: function () {
                    $("#loadingImage").hide();
                },
                rowAttributes: function (row, index) {
                    return {
                        id: "tr_user_" + row.id,
                    }
                },
                rowStyle: function (row, index) {
                    return row.status > 0 ? {
                        classes: "success"
                    } : {
                        classes: "danger"
                    };
                },
                columns: [{
                    title: '姓名',
                    field: 'name',
                    align: 'center',
                    valign: 'middle',
                }, {
                    title: '登录名',
                    field: 'login',
                    align: 'center',
                    valign: 'middle',
                }, {
                    title: '最近登录',
                    field: 'lastlogin',
                    align: 'center',
                    valign: 'middle',
                }, {
                    title: '操作',
                    field: 'name',
                    align: 'center',
                    valign: 'middle',
                    formatter: function (value, row, index) {
                        return "<button type='button' class='btn btn-primary btn-sm btn-update' data-user-id='" + row.id + "' onclick='switchUser(this)' >" + (row.status > 0 ? "休眠" : "启用") + "</button> " +
                            "<button type='button' class='btn btn-primary btn-sm btn-update' data-toggle='modal' data-target='#user_auth' data-user-id='" + row.id + "' onclick='' >授权</button> ";
                    }
                }]
            });
        }

        function switchUser(obj) {
            $.post("util/userOperation?op=2", {
                userId: obj.dataset.userId
            }, (res) => {
                res = JSON.parse(res);
                if (res.msg.status > 0) {
                    $("#tr_user_" + obj.dataset.userId).removeClass("danger");
                    $("#tr_user_" + obj.dataset.userId).addClass("success");
                    obj.innerHTML = "休眠";
                } else {
                    $("#tr_user_" + obj.dataset.userId).removeClass("success");
                    $("#tr_user_" + obj.dataset.userId).addClass("danger");
                    obj.innerHTML = "启用";
                }
            });
        }

        function showForm() {
            window.location = '#popup1';
            $("input#input_pwd").val("");
            $("input#input_name").val("");
            $("input#input_group").val("");
        }

        function addOne() {
            if ($("input#input_name").val() == "") {
                layer.confirm("请输入姓名", {
                    btn: ['确定']
                });
                return false;
            }

            if ($("input#input_login").val() == "") {
                layer.confirm("请输入登录名", {
                    btn: ['确定']
                });
                return false;
            }

            if ($("input#input_pwd").val() != $("input#input_pwd_check").val()) {
                layer.confirm("两次密码不一致", {
                    btn: ['确定']
                });
                return false;
            }
            var obj = {
                name: $("input#input_name").val(),
                pwd: $("input#input_pwd").val(),
                login: $("input#input_login").val()
            };
            $.ajax({
                type: "POST",
                url: "./util/userOperation?op=1",
                data: obj,
                cache: false,
                success: function (res) {
                    res = JSON.parse(res);
                    if (res.code >= 0) {
                        layer.confirm("添加成功", {
                            btn: ['确定']
                        });
                        window.location = "#";
                        refreshTbl();
                    } else {
                        layer.confirm("添加失败 - " + res.msg, {
                            btn: ['确定']
                        });
                    }

                }
            });
        }

        function initMenu() {
            $.ajax({
                'url': './util/userOperation?op=4',
                'method': 'post',
                success: function (res) {
                    var str = '<ul class="nav nav-tabs" role="tablist">',
                        res = JSON.parse(res);
                    str += '<li role="presentation" class="active"><a href="#tab_district_0" class="port-tab" data-toggle="tab" id="tab_tab_district_0">通用</a></li>';
                    str += '</ul>';
                    str += '<div class="tab-content" id="all-tab-contents">';
                    str += "<div role='tabpanel' class='tab-pane active' id='tab_district_0'>";
                    str += "<form class='form-horizontal form-menu' >"
                    length = res.menuGeneral.length % 2 == 1 ? (res.menuGeneral.length - 1) : res.menuGeneral.length;
                    for (var i = 0; i < length;) {
                        str += "<div class='form-group'>";
                        str += "<div class='setting-item col-sm-6'>";
                        str += "<div class='checkbox'>";
                        str += "<label for='m_" + res.menuGeneral[i]['id'] + "_0" + "' class='setting-label'>" + res.menuGeneral[i]['name'] + "</label>";
                        str += "<input type='checkbox' name='m_" + res.menuGeneral[i]['id'] + "_0" + "' id='m_" + res.menuGeneral[i]['id'] + "_0" +
                            "' checked class='toggle-button setting-check' data-toggle='toggle' data-size='normal' data-on='开' data-off='关' data-onstyle='danger' data-offstyle='default'>";
                        str += "</div>";
                        str += "</div>";
                        i++;
                        // <input type='checkbox' id='m_" + res.menuGeneral[i]['id']+0" + "' checked class="toggle-button setting-check" data-toggle="toggle" data-size="normal" data-on="是" data-off="否" data-onstyle="danger" data-offstyle="default">
                        str += "<div class='setting-item col-sm-6'>";
                        str += "<div class='checkbox'>";
                        str += "<label for='m_" + res.menuGeneral[i]['id'] + "_0" + "' class='setting-label'>" + res.menuGeneral[i]['name'] + "</label>";
                        str += "<input type='checkbox' name='m_" + res.menuGeneral[i]['id'] + "_0" + "' id='m_" + res.menuGeneral[i]['id'] + "_0" +
                            "' checked class='toggle-button setting-check' data-toggle='toggle' data-size='normal' data-on='开' data-off='关' data-onstyle='danger' data-offstyle='default'>";

                        str += "</div>";
                        str += "</div>";
                        str += "</div>";
                        i++;
                    }

                    if (i == res.menuGeneral.length - 1) {
                        str += "<div class='form-group'>";
                        str += "<div class='setting-item col-sm-6'>";
                        str += "<div class='checkbox'>";
                        str += "<label for='m_" + res.menuGeneral[i]['id'] + "_0" + "' class='setting-label'>" + res.menuGeneral[i]['name'] + "</label>";
                        str += "<input type='checkbox' name='m_" + res.menuGeneral[i]['id'] + "_0" + "' id='m_" + res.menuGeneral[i]['id'] + "_0" +
                            "' checked class='toggle-button setting-check' data-toggle='toggle' data-size='normal' data-on='开' data-off='关' data-onstyle='danger' data-offstyle='default'>";
                        str += "</div>";
                        str += "</div>";
                        str += "</div>";
                    }
                    str += "</form>";
                    str += "</div>";


                    for (var j = 0; j < res.district.length; j++) {
                        length = res.menu.length % 2 == 1 ? (res.menu.length - 1) : res.menu.length;
                        str += "<div role='tabpanel' class='tab-pane ' id='tab_district_" + res.district[j].id + "'>";
                        str += "<form class='form-horizontal form-menu' >"
                        for (var i = 0; i < length;) {
                            str += "<div class='form-group'>";
                            str += "<div class='setting-item col-sm-6'>";
                            str += "<div class='checkbox'>";
                            str += "<label for='m_" + res.menu[i]['id'] + "_" + res.district[j].id + "' class='setting-label'>" + res.menu[i]['name'] + "</label>";
                            str += "<input type='checkbox' name='m_" + res.menu[i]['id'] + "_" + res.district[j].id + "' id='m_" + res.menu[i]['id'] + "_" + res.district[j].id +
                                "' checked class='toggle-button setting-check' data-toggle='toggle' data-size='normal' data-on='开' data-off='关' data-onstyle='danger' data-offstyle='default'>";
                            str += "</div>";
                            str += "</div>";
                            i++;
                            // <input type='checkbox' id='m_" + res.menu[i]['id']+"_"+res.district[j].id + "' checked class="toggle-button setting-check" data-toggle="toggle" data-size="normal" data-on="是" data-off="否" data-onstyle="danger" data-offstyle="default">
                            str += "<div class='setting-item col-sm-6'>";
                            str += "<div class='checkbox'>";
                            str += "<label for='m_" + res.menu[i]['id'] + "_" + res.district[j].id + "' class='setting-label'>" + res.menu[i]['name'] + "</label>";
                            str += "<input type='checkbox' name='m_" + res.menu[i]['id'] + "_" + res.district[j].id + "' id='m_" + res.menu[i]['id'] + "_" + res.district[j].id +
                                "' checked class='toggle-button setting-check' data-toggle='toggle' data-size='normal' data-on='开' data-off='关' data-onstyle='danger' data-offstyle='default'>";

                            str += "</div>";
                            str += "</div>";
                            str += "</div>";
                            i++;
                        }

                        if (i == res.menu.length - 1) {
                            str += "<div class='form-group'>";
                            str += "<div class='setting-item col-sm-6'>";
                            str += "<div class='checkbox'>";
                            str += "<label for='m_" + res.menu[i]['id'] + "_" + res.district[j].id + "' class='setting-label'>" + res.menu[i]['name'] + "</label>";
                            str += "<input type='checkbox' name='m_" + res.menu[i]['id'] + "_" + res.district[j].id + "' id='m_" + res.menu[i]['id'] + "_" + res.district[j].id +
                                "' checked class='toggle-button setting-check' data-toggle='toggle' data-size='normal' data-on='开' data-off='关' data-onstyle='danger' data-offstyle='default'>";
                            str += "</div>";
                            str += "</div>";
                            str += "</div>";
                        }
                        str += "</form>";
                        str += "</div>";
                    }
                    str += "</div>";
                    $("#user_auth_body").append(str);
                    $('.toggle-button').bootstrapToggle();
                }
            });
        }

        function saveUserAuth() {
            let data = {
                userid: $("#user_id_auth").val(),
                auth: []
            };
            $(".setting-check").each((i, e) => (e.checked) ? data.auth.push(e.id) : null);
            $.ajax({
                url: "util/userOperation?op=5",
                type: "POST",
                data: JSON.stringify(data),
                success: function (res) {
                    res = JSON.parse(res);
                    if (res.code == 0) {
                        layer.msg("修改成功");
                        $("#user_auth").modal('hide');
                        // window.location = "#";
                    } else {
                        layer.confirm("错误 - " + res.msg, {
                            btn: ['确定']
                        });
                    }
                }
            });
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="codrops-top clearfix">
        </div>
        <header>
            <h1>用户管理</h1>
        </header>

        <div>
            <div id='buttons' style="float:right">
                <button type="button" class="btn btn-primary " onclick='showForm()'>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><b> 添加</b>
                </button>
                <button type="button" class="btn btn-primary" onclick='refreshTbl()'>
                    <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span><b> 刷新</b>
                </button>
            </div>
            <div style="margin-top: 20px;" id="div_table">
                <table id="tbl_user"></table>
            </div>
        </div>
    </div>

    <div id="loadingImage"></div>
    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>添加新用户</h2>
            <a class="close" href="#">×</a>
            <div class="content">
                <form class="form-inline" action="#" id="form_add" method="POST">
                    <div style="width: 200px">
                        <input type="text" class="form-control vip_input" autocomplete="nope" placeholder="姓名..." id="input_name">
                        <input type="text" class="form-control vip_input" autocomplete="nope" placeholder="登陆名" id="input_login">
                        <input type="password" class="form-control vip_input" autocomplete="new-password" placeholder="密码..." id="input_pwd">
                        <input type="password" class="form-control vip_input" autocomplete="new-password" placeholder="确认密码..." id="input_pwd_check">
                        <div class="buttons">
                            <button type="button" class="btn btn-primary" onclick="addOne();">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 确定</button>

                            <button type="button" class="btn btn-primary" onclick="window.location='#'">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 取消</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="user_auth">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">用户授权</h4>
                </div>
                <input type="hidden" id="user_id_auth">
                <div class="modal-body" id="user_auth_body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" onclick="saveUserAuth();">保存</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

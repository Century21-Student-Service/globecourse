<?php include "util/checksession.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>领域 - 移民</title>
  <?php
getcss("ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css");
getcss("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.css");
getcss("ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
getcss("ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css");
getcss("js/layer/theme/default/layer.css", true);
?>
  <style>
    .field-title {
      font-weight: 700;
    }

    h1 {
      margin: 18px 0;
    }

    .btn-field-del {
      float: right;
      display: none;
    }

    .field-title:hover .btn-field-del {
      display: block;
    }

    span.toggle {
      cursor: pointer;
    }

    button.btn-update {
      margin: 4px 0 4px 4px;
    }

    input.update {
      max-width: 150px;
    }

    span.empty-name {
      padding: 15px;
      font-weight: bold;
    }

    table {
      font-size: 17px;
    }
  </style>
</head>

<body>
  <div class='container'>
    <header>
      <h1></h1>
    </header>
    <table id="tbl-state"></table>
    <div style="float: left; margin: 15px 0;">
      <button type="button" class="btn btn-primary" id='btn_add'>
        添加
      </button>
    </div>
    <div style="float: right; margin: 15px 0;">
      <button type="button" class="btn btn-primary" id='btn_save'>
        保存
      </button>
      <button type="button" class="btn btn-default" id='btn_close'>
        关闭
      </button>
    </div>
  </div>

  <?php

getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("ajax/libs/popper.js/1.16.1/umd/popper.min.js");
getjs("ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/locale/bootstrap-table-zh-CN.min.js");
getjs("ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js");
getjs("js/layer/layer.js", true);
?>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const pid = urlParams.get('pid');
    let
      states = [],
      immi = [],
      data = [];
    parent.fields.forEach(e => {
      if (e.id == pid) $("h1").html(e.name);
    });

    function dismissName(id, en = false) {
      if (en) {
        $('#toggle_rename_en_' + id).popover('hide');
      } else {
        $('#toggle_rename_' + id).popover('hide');
      }
    }

    function saveName(id) {
      $("#btn_saveName_" + id).attr('disabled', 'disabled');
      $("#btn_dismissName_" + id).attr('disabled', 'disabled');
      let oldName = $("#toggle_rename_" + id).html().trim();
      let newName = $("#input_rename_" + id).val().trim();
      if (newName.length !== 0 && newName != oldName) {
        $.post('util/fieldOperation?op=7', {
          name: newName,
          id,
        }, res => {
          try {
            res = JSON.parse(res)
          } catch (e) {
            layer.alert(res, {
              title: "错误",
              icon: 2
            });
            $("#btn_saveName_" + id).removeAttr('disabled');
            $("#btn_dismissName_" + id).removeAttr('disabled');
          }
          if (res.code == 0) {
            $("#toggle_rename_" + id).html(newName);
            dismissName(id);
          } else {
            layer.alert(res.msg, {
              title: "错误",
              icon: 2
            });
            $("#btn_saveName_" + id).removeAttr('disabled');
            $("#btn_dismissName_" + id).removeAttr('disabled');
          }
        })
      } else {
        dismissName(id);
      }
    }

    function saveNameEn(id) {
      $("#btn_saveName_en_" + id).attr('disabled', 'disabled');
      $("#btn_dismissName_en_" + id).attr('disabled', 'disabled');
      let oldName = $("#toggle_rename_en_" + id).html().trim();
      let newName = $("#input_rename_en_" + id).val().trim();
      if (newName.length !== 0 && newName != oldName) {
        $.post('util/fieldOperation?op=7', {
          name_en: newName,
          id,
        }, res => {
          try {
            res = JSON.parse(res)
          } catch (e) {
            layer.alert(res, {
              title: "错误",
              icon: 2
            });
            $("#btn_saveName_en_" + id).removeAttr('disabled');
            $("#btn_dismissName_en_" + id).removeAttr('disabled');
          }
          if (res.code == 0) {
            $("#toggle_rename_en_" + id).html(newName);
            dismissName(id, true);
          } else {
            layer.alert(res.msg, {
              title: "错误",
              icon: 2
            });
            $("#btn_saveName_en_" + id).removeAttr('disabled');
            $("#btn_dismissName_en_" + id).removeAttr('disabled');
          }
        })
      } else {
        dismissName(id, true);
      }
    }


    function refreshTable() {
      const getStates = $.get("util/fieldOperation.php?op=1", res => {
        states = JSON.parse(res);
      });
      // const getFields = $.get("util/fieldOperation.php?op=2&pid=" + pid, res => {
      //   fields = JSON.parse(res);
      // });
      const getImmi = $.get("util/fieldOperation.php?op=3&pid=" + pid, res => {
        immi = JSON.parse(res);
      });

      Promise.all([getStates, getImmi]).then(res => {
        let columns = [{
          field: 'field_name',
          title: '名称',
          valign: 'middle',
          width: 180,
          class: "field-title",
          formatter: function (value, row, index) {
            var content = `<input id='input_rename_${row.field_id}' class='form-control update' type='text'>
          <button type='button' class='btn btn-success btn-sm btn-update' id='btn_saveName_${row.field_id}' onclick='saveName(${row.field_id})'>
          <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>
          <button type='button' class='btn btn-danger btn-sm btn-update' id='btn_dismissName_${row.field_id}' onclick='dismissName(${row.field_id})'>
          <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>`;
            return `<span id="toggle_rename_${row.field_id}" class="toggle toggle-text" data-toggle="popover"
                title="修改名称" data-content="${content}">${value}</span>
            <button class='btn btn-sm btn-danger btn-field-del' data-fieldid='${row.field_id}'>删除</button>`;
          }
        }, {
          field: 'field_name_en',
          title: '英文名称',
          valign: 'middle',
          width: 180,
          formatter: function (value, row, index) {
            const toggleClass = value || "empty-name";
            value = value || "-";
            const content = `<input id='input_rename_en_${row.field_id}' class='form-control update' type='text'>
          <button type='button' class='btn btn-success btn-sm btn-update' id='btn_saveName_en_${row.field_id}' onclick='saveNameEn(${row.field_id},true)'>
          <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>
          <button type='button' class='btn btn-danger btn-sm btn-update' id='btn_dismissName_en_${row.field_id}' onclick='dismissName(${row.field_id},true)'>
          <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>`;
            return `<span id="toggle_rename_en_${row.field_id}" class="toggle toggle-text ${toggleClass}" data-toggle="popover"
                title="修改名称" data-content="${content}">${value}</span>`;
          }
        }, {
          field: '0',
          title: 'Non-Regional',
          width: 50,
          align: "center",
          valign: 'middle',
          formatter: function (value, row, index) {
            var checked = value == '1' ? 'checked' : '';
            return `<input type="checkbox" ${checked} data-stateid="0" data-fieldid="${row.field_id}" ` +
              '" class="toggle-button" data-on="是" data-off="否" />';
          }
        }];
        states.forEach(e => {
          columns.push({
            field: e.id,
            title: e.code,
            width: 50,
            align: "center",
            valign: 'middle',
            formatter: function (value, row, index) {
              var checked = value == '1' ? 'checked' : '';
              return `<input type="checkbox" ${checked} data-stateid="${e.id}" data-fieldid="${row.field_id}" ` +
                '" class="toggle-button" data-on="是" data-off="否" />';
            }
          });
        });
        $("#tbl-state").bootstrapTable("destroy");
        $("#tbl-state").bootstrapTable({
          uniqueId: "field_id",
          data: immi,
          columns,
          onPostBody: function () {
            $('[data-toggle="popover"]').popover({
              html: true,
            });
            $('[data-toggle="popover"]').on('shown.bs.popover', function (e) {
              if (!/_en_/g.test(e.currentTarget.id))
                $("#input_rename_" + e.currentTarget.id.replace(/^toggle_rename_/g, '')).val($(this).html());
            });
            $('[data-toggle="popover"]').on('show.bs.popover', function (e) {
              $('[data-toggle="popover"]:not(#' + e.currentTarget.id + ')').popover('hide');
            });
            $('.toggle-button').bootstrapToggle();
            $(".btn-field-del").click(e => {
              const fid = $(e.currentTarget).data("fieldid");
              $.post("util/fieldOperation.php?op=6", {
                fid
              }, res => {
                try {
                  res = JSON.parse(res);
                } catch (e) {
                  layer.alert('未知错误：' + res, {
                    title: "错误",
                    icon: 2
                  });
                  console.log(res);
                  return;
                }
                if (res.code == 0) {
                  refreshTable();
                } else if (res.code == 10) {
                  let msg = `不能删除 - 此领域下包含「${res.msg.rows.length}」门课程<br>`;
                  let i = 0;
                  res.msg.rows.forEach(e => {
                    i++;
                    msg += `${i}. ${e.course}<br>${e.inst}<br><br>`; // i+e.course + e.inst + "<br>";
                  });
                  msg = msg.replace(/<br><br>$/g, '');
                  layer.alert(msg, {
                    title: "错误",
                    icon: 2
                  });
                  return;
                } else {
                  layer.alert(res.msg, {
                    title: "错误",
                    icon: 2
                  });
                  return;
                }
              });
            });
          },
        });
      });
    }

    $("#btn_close").click(e => {
      parent.layer.close(parent.form);
    });

    $("#btn_save").click(e => {
      let data = [];
      $("input.toggle-button").each((i, e) => {
        data.push({
          state: $(e).data("stateid"),
          field: $(e).data("fieldid"),
          checked: $(e)[0].checked,
        });
      });
      $.post('util/fieldOperation.php?op=4', JSON.stringify(data), res => {
        try {
          res = JSON.parse(res);
        } catch (e) {
          layer.alert('未知错误：' + res, {
            title: "错误",
            icon: 2
          });
          console.log(res);
          return;
        }
        if (res.code == 0) {
          parent.layer.close(parent.form);
        } else {
          layer.alert(res.msg, {
            title: "错误",
            icon: 2
          });
          return;
        }
      });
    });

    $("#btn_add").click(e => {
      layer.prompt({
        title: '请输入领域名称',
      }, function (name, index) {
        $.post("util/fieldOperation.php?op=5", {
          pid,
          name
        }, res => {
          try {
            res = JSON.parse(res);
          } catch (e) {
            layer.alert('未知错误：' + res, {
              title: "错误",
              icon: 2
            });
            console.log(res);
            return;
          }
          if (res.code == 0) {
            layer.close(index);
            refreshTable();
          } else {
            layer.alert(res.msg, {
              title: "错误",
              icon: 2
            });
            return;
          }
        });

      });
    });

    refreshTable();
  </script>
</body>

</html>
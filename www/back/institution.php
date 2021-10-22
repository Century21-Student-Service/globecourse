<?php include "util/checksession.php";?>
<!DOCTYPE html>
<html>

<head>
  <title>学院管理</title>
  <?php
getcss("ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css");
getcss("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.css");
getcss("css/magnific-popup.css", true);
getcss("js/layer/theme/default/layer.css", true);
?>

  <style>
    button.btn-update {
      margin: 4px 0 4px 4px;
    }

    span.toggle {
      cursor: pointer;
    }

    #search_keyword {
      border-radius: 0px 4px 4px 0px;
    }

    .preinput-control {
      margin-right: 5px;
    }

    .cell-found {
      font-weight: bold;
    }

    .tbl-badge {
      max-width: 100px;
      height: 60px;
    }

    .btn-edit {
      margin-right: 4px;
    }

    .popover-title {
      width: 110px;
    }

    .tbl-course {
      min-height: 200px;
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <h1>院校管理2</h1>
    </header>
    <div class="input-group" style="float:left; margin-top: 10px; margin-bottom: 10px;">
      <span class="input-group-btn">
        <button type="button" class="btn btn-primary" id="search-btn" onclick='refresh()'>
          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
      </span>
      <input id="search_keyword" type="text" class="preinput-control form-control " style="position: static;width:200px;" placeholder="输入院校名称...">
      <select id="states" name="states" class="btn btn-default preinput-control" style="width: 205px;"></select>

      <div style="float: right;">
        <button type="button" class="btn btn-primary " onclick='FromInst(false)'>
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><b> 添加院校</b>
        </button>
        <button type="button" class="btn btn-primary btn-control" id="refresh_unuse" onclick="refresh();">
          <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 刷新
        </button>
      </div>
    </div>

    <table class="table table-sm table-hover" id="institutionTab"></table>

  </div>

  <?php
getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/locale/bootstrap-table-zh-CN.min.js");
getjs("js/jquery.magnific-popup.min.js", true);
getjs("js/layer/layer.js", true);
?>
  <script type="text/javascript">
    var form = null;
    var current_scroll = {
      x: 0,
      y: 0
    };
    const columns_institution = [{
        title: '校徽',
        field: 'badge',
        align: 'center',
        valign: 'middle',
        width: 100,
        formatter: function (value, row, index) {
          if (value.split('')[0] != '/')
            value = '/' + value;
          return "<img class='tbl-badge' src='" + value + "'/>";
        }
      }, {
        title: '中文名称',
        field: 'name',
        align: 'left',
        valign: 'middle',
        sortable: true,
        width: 300,
        cellStyle: cellStyle
      }, {
        title: '英文名称',
        field: 'name_en',
        align: 'left',
        valign: 'middle',
        sortable: true,
        width: 300,
        cellStyle: cellStyle
      },
      {
          title: '所在国家',
          field: 'country',
          align: 'center',
          valign: 'middle',
          sortable: true,
        },
      {
        title: '所在州',
        field: 'state',
        align: 'center',
        valign: 'middle',
        sortable: true,
      },
      {
        title: '操作',
        field: 'id',
        align: 'center',
        valign: 'middle',
        width: 100,
        sortable: true,
        formatter: function (value, row, index) {
          var edit =
            "<button type='button' title='修改' class='btn btn-primary btn-sm btn-edit btn-op' onclick='FromInst(" + row['id'] +
            ")'><span class='glyphicon glyphicon-edit' aria-hidden='true'></button>";
          var content =
            "<button type='button' class='btn btn-success btn-sm btn-update' onclick='deleteInstitution(" +
            row['id'] +
            ")' > " + "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>" +
            "<button type='button' class='btn btn-danger btn-sm btn-update' onclick='dismissDelete(" +
            row[
              'id'] + ")'> " +
            "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>";
          var del = '<span id="toggle_delete_' + row['id'] +
            '" class="toggle" data-toggle="popover" title="确认删除吗" data-content="' +
            content +
            '"><button class="btn btn-danger btn-sm btn-delete btn-op"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></span>';
          return edit + del;
        }
      },
    ];

    const column_course = [{
      title: '名称',
      field: 'name',
      align: 'left',
      valign: 'middle',
      formatter: function (value, row, index) {
        return `<a href='#' onClick='FromCourse("",${row.id})'>${value}</a>`;
      }
    }, {
      title: '级别',
      field: 'level',
      align: 'center',
      valign: 'middle',
      width: 150,
    }, {
      title: '领域',
      field: 'field',
      align: 'center',
      valign: 'middle',
      width: 100,
      formatter: function (value, row, index) {
        if (value.length > 0) {
          return value.substring(1).replace(/:/g, "<br>");
        }
      }
    }, {
      title: '课时',
      field: 'months',
      align: 'center',
      valign: 'middle',
      width: 100,
      formatter: function (value, row, index) {
        if (value > 0) return value + '个月';
        else return '-';
      }
    }, {
      title: '学费',
      field: 'fees',
      align: 'right',
      valign: 'middle',
      width: 100,
      formatter: function (value, row, index) {
        var result = '';
        arr = value.trim().split('');
        var j = 0;
        for (var i = arr.length - 1; i >= 0; i--) {
          result = arr[i] + result;
          j++;
          if (j % 3 === 0 && j !== arr.length) {
            result = ',' + result;
          }
        }
        return '$' + result;
      }
    }, ];
    $(function () {
      $("#search_keyword").keypress(function (e) {
        if (e.which == 13) {
          $("#search-btn").click();
          return false;
        }
      });

      $.get('./util/institutionOperation.php?op=1', function (res) {
        res = JSON.parse(res);
        if (res.code == 0) {
          $("#states")
            .empty()
            .append('<option value="-1">全部</option>').append(res.states.map(function (e) {
              return '<option value="' + e['id'] + '">' + e['name'] + '</option>';
            }).join(''))
            .change(function (op) {
              refresh();
            })
        } else {
          alert(res.msg);
        }
        refresh();
      });
    });


    function refresh() {
      $("#institutionTab").bootstrapTable("destroy");
      $("#institutionTab").bootstrapTable({
        method: "post",
        uniqueId: "id",
        url: "util/institutionOperation.php?",
        pagination: true,
        pageSize: 20,
        pageList: [20, 40, 60, 100],
        sidePagination: "server",
        pageNumber: 1,
        contentType: "application/x-www-form-urlencoded",
        locale: 'zh-CN',
        // classes: "table",
        columns: columns_institution,
        queryParams: function (params) {
          params.keyword = $("#search_keyword").val().trim();
          params.state = $("#states").val().trim();
          return params;
        },
        detailView: true,
        detailViewByClick: false,
        detailViewIcon: false,
        onPostBody: function () {
          $('[data-toggle="popover"]').popover({
            html: true,
          });
        },
        onClickCell: function (field, value, row, element) {
          if (field == "id") {
            return false;
          } else {
            const index = element.parent().data('index');
            $("#institutionTab").bootstrapTable('toggleDetailView', index);
          }
        },
        onExpandRow: function (index, row, $detail) {
          const inst_id = row['id'];
          $("#tbl_course_" + inst_id).bootstrapTable("destroy");
          $("#tbl_course_" + inst_id).bootstrapTable({
            // $detail.html('<table></table>').find('table').bootstrapTable({
            classes: "table table-sm table-hover",
            columns: column_course,
            method: "post",
            uniqueId: "id",
            url: "util/courseOperation.php?op=0&inst=" + inst_id,
            pagination: true,
            pageSize: 10,
            pageList: [10, 20],
            sidePagination: "server",
            pageNumber: 1,
            contentType: "application/x-www-form-urlencoded",
          });
        },
        detailFormatter: function (index, row) {
          var str = '';
          str += '<div style="float:right;">';
          str +=
            `<button type="button" class="btn btn-success" onclick="FromCourse(${row.id})"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><b> 添加课程</b></button>`;
          str += '</div>';
          str +=
            '<ul class="nav nav-tabs" role="tablist"><li role="presentation" class="active"><a href="#detail_course" class="port-tab" data-toggle="tab" id="tab_detail_course">课程</a></li></ul>';
          str += '<div role="tabpanel" class="tab-pane active" id="detail_course">';
          str += `<table class='tbl-course' id='tbl_course_${row.id}'></table>`;
          str += '</div>';
          return str;
        },
        rowStyle: function rowStyle(row, index) {
          var result = {
            css: {
              'height': '70px',
              'font-weight': 'bold',
              // 'font-size': '16px',
            }
          };
          if (row.status == -1)
            result.classes = "danger";
          return result;
        },
      });
    }

    function dismissType(id) {
      $('#toggle_type_' + id).popover('hide');
    }

    function savetype(id) {
      const value = $("#input_type_" + id).val();
      const sel = $("#input_type_" + id)[0];
      const text = sel.options[sel.selectedIndex].text
      if (value == null || value.trim().length === 0) return;
      $.post("util/institutionOperation.php?op=8", {
          id,
          value
        },
        function (res) {
          res = JSON.parse(res);
          if (res.code == 0) {
            // $('#toggle_type_' + id).html(text);
            $('#toggle_type_' + id).popover('hide');
            $("#institutionTab").bootstrapTable('refresh', {
              silent: true
            });
          } else {
            layer.alert(res.msg, {
              shadeClose: true
            });
          }
        });
    }

    function changetypegoahead(target) {
      $(target).parent().parent().remove();
    }

    function cellStyle(value) {
      var target = $("#search_keyword").val().trim();
      if (value == null || target.length == 0 || !value.includes(target)) return {};
      else {
        return {
          classes: "cell-found"
        };
      }
    }

    function dismissDelete(id) {
      $('#toggle_delete_' + id).popover('hide');
    }

    function deleteInstitution(id) {
      $.post("util/institutionOperation.php?op=2", {
          id: id,
        },
        function (res) {
          res = JSON.parse(res);
          if (res.code == 0) {
            $('#toggle_delete_' + id).popover('hide');
            $("#institutionTab").bootstrapTable("removeByUniqueId", id);
          } else {
            alert(res.msg);
          }
        });
    }

    function FromInst(id) {
      form = layer.open({
        type: 2,
        title: '添加院校',
        shade: 0.8,
        area: ['100%', '100%'],
        content: id ? 'newinst?inst_id=' + id : 'newinst',
      });
    }

    function FromCourse(inst_id, id) {
      current_scroll = {
        x: window.pageXOffset,
        y: window.pageYOffset
      };
      const url = `newcourse?inst_id=${inst_id}`;
      form = layer.open({
        type: 2,
        title: '添加课程',
        shade: 0.8,
        area: ['100%', '100%'],
        content: id ? `${url}&id=${id}` : url,
      });
    }
  </script>
</body>

</html>
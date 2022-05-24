<?php include "util/checksession.php";?>
<!DOCTYPE html>
<html>

<head>
  <title>特价课程管理</title>
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
      <h1>特价课程管理</h1>
    </header>
    <div class="input-group" style="float:left; margin-top: 10px; margin-bottom: 10px;">
      <span class="input-group-btn">
        <button type="button" class="btn btn-primary" id="search-btn" onclick='refresh()'>
          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
      </span>
      <input id="search_keyword" type="text" class="preinput-control form-control " style="position: static;width:200px;" placeholder="输入名称...">
      

      <div style="float: right;">
        <button type="button" class="btn btn-primary " onclick='FromInst(false)'>
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><b> 添加</b>
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
        title: '封面',
        field: 'image',
        align: 'center',
        valign: 'middle',
        width: 160,
        formatter: function (value, row, index) {
          if (value.split('')[0] != '/')
            value = '/' + value;
          return "<img class='tbl-badge' src='" + value + "'/>";
        }
      }, {
        title: '名称',
        field: 'title',
        align: 'left',
        valign: 'middle',
        sortable: false,
        width: 240,
        cellStyle: cellStyle
      }, {
        title: '标签',
        field: 'tag',
        align: 'left',
        valign: 'middle',
        sortable: false,
        width: 100,
        cellStyle: cellStyle
      },{
          title: '点击量',
          field: 'read_count',
          align: 'left',
          valign: 'middle',
          sortable: false,
          width: 100,
          cellStyle: cellStyle
        },
      {
          title: '排序',
          field: 'sort',
          align: 'center',
          valign: 'middle',
          sortable: false,
          width: 100,
        },
        {
            title: '添加人',
            field: 'add_user',
            align: 'center',
            valign: 'middle',
            sortable: false,
            width: 100,
          },
        {
            title: '最后修改时间',
            field: 'update_time',
            align: 'center',
            valign: 'middle',
            sortable: false,
            width: 100,
          },
      {
        title: '操作',
        field: 'id',
        align: 'center',
        valign: 'middle',
        width: 100,
        sortable: false,
        formatter: function (value, row, index) {
          var edit =
            "<button type='button' title='修改' class='btn btn-primary btn-sm btn-edit btn-op' onclick='FromInst(" + row['id'] +
            ")'><span class='glyphicon glyphicon-edit' aria-hidden='true'></button>";
          var content =
            "<button type='button' class='btn btn-success btn-sm btn-update' onclick='deleteData(" +
            row['id'] +
            ")' > " + "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>" +
            "<button type='button' class='btn btn-danger btn-sm btn-update' onclick='dismissDelete(" +
            row[
              'id'] + ")'> " +
            "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>";
          var del = '<span id="toggle_delete_' + row['id'] +
            '" class="toggle" data-toggle="popover" title="确认删除吗" onclick="deleteData(' +
                    row['id'] +
                    ')"><button class="btn btn-danger btn-sm btn-delete btn-op"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></span>';
          return edit + del;
        }
      },
    ];

    
    $(function () {
      $("#search_keyword").keypress(function (e) {
        if (e.which == 13) {
          $("#search-btn").click();
          return false;
        }
      });

      
      refresh();
    });


    function refresh() {
      $("#institutionTab").bootstrapTable("destroy");
      $("#institutionTab").bootstrapTable({
        method: "post",
        uniqueId: "id",
        url: "util/course_speOperation.php?",
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
          return params;
        },
        detailView: true,
        detailViewByClick: false,
        detailViewIcon: false,
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

    function deleteData(id) {
      $.post("util/course_speOperation.php?op=2", {
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
        title: '添加',
        shade: 0.8,
        area: ['100%', '100%'],
        content: id ? 'newcourse_spe?id=' + id : 'newcourse_spe',
      });
    }

  </script>
</body>

</html>
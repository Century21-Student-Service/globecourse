<?php include "util/checksession.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>课程申请</title>
  <?php
getcss("ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css");
getcss("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.css");
getcss("css/magnific-popup.css", true);
getcss("js/layer/theme/default/layer.css", true);
?>
  <style>
    .container {
      width: 90%;
    }

    a.file {
      padding-left: 4px;
    }

    a.file.empty {
      color: red;
    }

    table {
      font-weight: bold;
    }

    .cell-detail-title {
      width: 150px;
      text-align: center;
    }

    .cell-detail-data {
      font-weight: 400;
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <h1>课程申请</h1>
    </header>
    <table class="table" id="appTab"></table>
  </div>

  <?php
getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/locale/bootstrap-table-zh-CN.min.js");
getjs("js/jquery.magnific-popup.min.js", true);
getjs("js/layer/layer.js", true);
?>
  <script>
    const columns_app = [{
      title: '申请时间',
      field: 'apply_time',
      align: 'center',
      valign: 'middle',
      width: 150,
      sortable: true,
      formatter: function (value, row, index) {
        return value.substring(0, 16);
      }
    }, {
      title: '申请人姓名',
      field: 'name',
      align: 'center',
      valign: 'middle',
      width: 100,
      sortable: true,
      formatter: function (value, row, index) {
          return `<a href='application_detail.php?id=${row.id}' target='_blank'>${value}</a>`;
        }
    }, {
      title: '出生年月',
      field: 'birth',
      align: 'center',
      width: 120,
      valign: 'middle',
      sortable: true,
      formatter: function (value, row, index) {
        let age = 0;
        const today = new Date();
        birth = value.split('-');
        age = today.getFullYear() - Number.parseInt(birth[0]);
        if (Number.parseInt(birth[1]) > today.getMonth())
          age--;
        return value + ` (${age}岁)`;
      }
    }, {
      title: '院校和课程',
      field: 'course',
      align: 'left',
      valign: 'middle',
      sortable: true,
      formatter: function (value, row, index) {
        return row.institution + "<br>" + value;
      }
    }, {
      title: '文件',
      field: 'id',
      align: 'center',
      valign: 'middle',
      width: 220,
      sortable: true,
      formatter: function (value, row, index) {
        const reg = /globecourse\/[0-9a-z]{32}\.pdf/g;
        let passport = row.passport.length > 0 ? `<a class='file ${reg.test(row.passport)?"pdf":"img"}' href='${row.passport}'>护照</a>` :
          `<a class='file empty' href=''>护照</a>`;
        let graduated = row.graduated.length > 0 ? `<a class='file ${reg.test(row.graduated)?"pdf":"img"}' href='${row.graduated}'>毕业证</a>` :
          `<a class='file empty' href=''>毕业证</a>`;
        let diploma = row.diploma.length > 0 ? `<a class='file ${reg.test(row.diploma)?"pdf":"img"}' href='${row.diploma}'>学位证</a>` :
          `<a class='file empty' href=''>学位证</a>`;
        let scoresheet = row.scoresheet.length > 0 ? `<a class='file ${reg.test(row.scoresheet)?"pdf":"img"}' href='${row.scoresheet}'>成绩单</a>` :
          `<a class='file empty' href=''>成绩单</a>`;
        let ielts_photo = row.ielts_photo.length > 0 ? `<a class='file ${reg.test(row.ielts_photo)?"pdf":"img"}' href='${row.ielts_photo}'>雅思</a>` :
          `<a class='file empty' href=''>雅思</a>`;
        return passport + graduated + diploma + scoresheet + ielts_photo;
      }
    }, {
      title: '状态',
      field: 'status',
      align: 'center',
      valign: 'middle',
      width: 80,
      sortable: true,
    }, ];

    function refresh() {
      $("#appTab").bootstrapTable("destroy");
      $("#appTab").bootstrapTable({
        method: "post",
        uniqueId: "id",
        url: "util/applicationOperation.php",
        pagination: true,
        pageSize: 20,
        pageList: [20, 40, 60, 100],
        sidePagination: "server",
        pageNumber: 1,
        contentType: "application/x-www-form-urlencoded",
        locale: 'zh-CN',
        columns: columns_app,
        detailView: true,
        detailViewByClick: true,
        detailViewIcon: false,
        onPostBody: function () {
          $('a.file.img').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
          });

          $("a.file.pdf").magnificPopup({
            type: 'iframe',
            fixedBgPos: true,
            closeOnContentClick: true,
          });

          $("a.file.empty").click(e => {
            return false;
          });
        },
        detailFormatter: function (index, row) {
          var str = '';
          str += `<table class='tbl-detail'>`;
          str += `<tr>`;
          str += `<th class='cell-detail-title'>联系电话</th>`;
          str += `<td class='cell-detail-data'>${row.phone===null ? "无" : row.phone}</td>`;
          str += `</tr>`;
          str += `<tr>`;
          str += `<th class='cell-detail-title'>电子邮件</th>`;
          str += `<td class='cell-detail-data'>${row.email===null ? "无" : row.email}</td>`;
          str += `</tr>`;
          str += `<tr>`;
          str += `<th class='cell-detail-title'>毕业或在读院校名称</th>`;
          str += `<td class='cell-detail-data'>${row.entry_inst===null ? "无" : row.entry_inst}</td>`;
          str += `</tr>`;
          str += `<tr>`;
          str += `<th class='cell-detail-title'>雅思分数</th>`;
          str += `<td class='cell-detail-data'>${row.ielts===null ? "无" : row.ielts}</td>`;
          str += `</tr>`;
          str += `<tr><th class='cell-detail-title'>备注</th>`;
          str += `<td class='cell-detail-data'>${row.comment===null ? "无" : row.comment}</td>`;
          str += `</tr></table>`;

          return str;
        }
      });
    }

    $(() => {
      refresh();
    });
  </script>
</body>

</html>
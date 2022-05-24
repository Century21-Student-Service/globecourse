<?php include "util/checksession.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>添加特价课程</title>
  
  <?php

getcss("ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css");
//getcss("ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
getcss("ajax/libs/font-awesome/5.15.3/css/all.min.css");
getcss("ajax/libs/jqueryui/1.12.1/jquery-ui.min.css");
getcss("js/layer/theme/default/layer.css", true);
getcss("ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css");
?>

  <style>
    .input-group {
      margin-top: 15px;
    }

    .input-select {
      display: inline-flex;
    }

    .nav-tabs {
      margin-top: 15px;
    }

    .progress {
      position: absolute;
      width: 90%;
      height: 25px;
      left: 10px;
      top: 50px;
      transition: all .3s ease;
    }

    .progress.hide {
      display: none;
      transition: all .3s ease;
    }

    span.uploading {
      color: white;
      margin: auto;
      font-size: medium;
      font-weight: 500;
      position: absolute;
      margin-top: 12px;
      margin-left: 75px;
    }

    .badge {
      display: block;
      margin: auto;
      padding: 0;
      margin-top: 14px;
      position: relative;
      width: 200px;
      overflow: hidden;
      transition: all .3s ease;
    }

    .badge:hover .img-badge {
      opacity: .5;
    }

    .img-badge {
      width: 200px;
      transition: all .3s ease;
    }

    .tab-pane {
      border-style: solid;
      border-color: rgb(201, 216, 219);
      border-width: 1px;
    }

    .upload-button {
      position: absolute;
      bottom: -25px;
      left: 0;
      height: 25px;
      width: 100%;
      color: white;
      font-size: 22px;
      background-color: #0062a9;
    }

    .badge:hover .upload-button {
      transition: all .3s ease;
      transform: translate(0px, -25px);
      cursor: pointer;
    }

    .pics-card:hover .pics-img {
      opacity: .7;
    }

    .pics-card .uploading {
      opacity: .1;
    }

    .pics-remove {
      position: absolute;
      bottom: -25px;
      left: 0;
      height: 25px;
      width: 100%;
      color: white;
      font-size: 18px;
      font-weight: bold;
      background-color: #F25045;
      display: none;
      text-align: center;
      border-bottom-left-radius: 6px;
      border-bottom-right-radius: 6px;
    }

    .pics-card:hover .pics-remove {
      transition: all .3s ease;
      transform: translate(0px, -25px);
      cursor: pointer;
      display: block;
    }

    .file-upload {
      display: none;
    }

    .video-card {
      display: inline-table;
      position: relative;
      transition: all .3s ease;
      margin: 15px;
      width: 230px;
      height: 140px;
      cursor: pointer;
    }

    .video-img {
      width: 100%;
      height: 100%;
      max-height: 140px;
      object-fit: cover;
      border-radius: 6px;
      box-shadow: 0px 2px 8px #0000008a;
      transition: all .3s ease;
    }

    .video-add {
      display: inline-table;
      position: relative;
      margin: 15px;
      width: 230px;
      height: 140px;
      color: rgb(201, 216, 219);
      font-size: 80px;
      border: solid 2px;
      border-radius: 12px;
      border-color: rgb(201, 216, 219);
      text-align: center;
      vertical-align: middle;
      box-shadow: 1px 1px 15px -5px black;
      transition: all .3s ease;
    }

    .video-add i {
      margin-top: 35px;
    }

    .video-add:hover {
      opacity: .7;
    }

    .video-top {
      color: white;
      position: absolute;
      top: 2px;
      left: 0;
      height: 25px;
      width: 100%;
      font-size: 18px;
      padding: 0 4px;
      line-height: 19px;
    }

    .video-bottom {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 25px;
      width: 100%;
      font-size: 18px;
      padding: 0 4px;
    }

    .video-duration {
      display: inline-block;
      font-size: 14px;
      font-weight: 400;
      color: white;
    }

    .video-control {
      font-size: 16px;
      font-weight: 400;
      color: white;
      float: right;
    }

    .video-control .far {
      padding-left: 4px;
    }

    .video-control .fa-trash-alt:hover {
      color: #F25045;
    }

    .video-control .fa-edit:hover {
      color: #0062a9;
    }

    .pics-card {
      display: inline-table;
      position: relative;
      transition: all .3s ease;
      margin: 15px;
      width: 230px;
      height: 140px;
    }

    .pics-img {
      width: 100%;
      height: 100%;
      max-height: 140px;
      object-fit: cover;
      border-radius: 6px;
      box-shadow: 0px 2px 8px #0000008a;
      transition: all .3s ease;
    }

    .pics-add {
      border-color: rgb(201, 216, 219);
      color: rgb(201, 216, 219);
      font-size: 55px;
      border: solid 2px;
      border-radius: 12px;
      width: 100px;
      height: 100px;
      text-align: center;
      vertical-align: middle;
      box-shadow: 0px 2px 8px #0000008a;
      /* box-shadow: 1px 1px 15px -5px black; */
    }

    .pics-add:hover {
      opacity: .7;
    }

    .pics-add i {
      vertical-align: middle;
    }

    .layui-layer-input {
      display: block;
      width: 230px;
      height: 36px;
      margin: 10px;
      line-height: 30px;
      padding-left: 10px;
      border: 1px solid #e6e6e6;
      color: #333;
      margin-bottom: 10px;
    }

    .layui-layer-content {
      /* padding: 15px; */
      overflow-y: hidden !important;
    }

    /* .layui-layer-btn0 {
      background-color: #0062a9 !important;
      border-color: #0062a9 !important;
    } */

    button.disabled {
      cursor: not-allowed;
    }
  </style>
</head>

<body>
  <div class='container'>
    <div class='badge-wrap'>
      <div class='badge'>
        <img id='img_badge' class="img-badge" src='images/nopic.jpg'>
        <div class="upload-button" onclick="document.getElementById('file_upload_badge').click();">
          修改
        </div>
        <input class="file-upload badge-upload" id="file_upload_badge" type="file" accept="image/*" />
        <input class="file-upload" id="input_image_path" type="hidden" />
      </div>
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">名称</span>
      </div>
      <input type="text" class="form-control" placeholder="名称" id="input_title">
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">英文名称</span>
      </div>
      <input type="text" class="form-control" placeholder="英文名称" id="input_title_en">
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">标签</span>
      </div>
      <input type="text" class="form-control" placeholder="标签" id="input_tag">
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">英文标签</span>
      </div>
      <input type="text" class="form-control" placeholder="英文标签" id="input_tag_en">
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">排序</span>
      </div>
      <input type="text" class="form-control" placeholder="排序，值越大越优先" id="input_sort">
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">添加人</span>
      </div>
      <input type="text" class="form-control" placeholder="添加人" id="input_add_user">
    </div>
    
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="intro_tab" data-toggle="tab" href="#input_intro" role="tab" aria-controls="intro" aria-selected="true">正文</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" id="intro_en_tab" data-toggle="tab" href="#input_intro_en" role="tab" aria-controls="intro" aria-selected="true">英文正文</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="intro_tab" id="input_intro"></div>
      <div class="tab-pane fade" role="tabpanel" aria-labelledby="intro_en_tab" id="input_intro_en"></div>
    </div>

    <div style="float: right; margin-top: 15px;">
      <button type="button" class="btn btn-primary" id='btn_save'>
        保存
        <div class="spinner-border text-light spinner-border-sm" role="status" style="display: none;" id="save_loading">
          <span class="sr-only">Loading...</span>
        </div>
      </button>
      <button type="button" class="btn btn-default" id='btn_close'>
        关闭
      </button>
    </div>
  </div>

  <?php

getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("ajax/libs/jqueryui/1.12.1/jquery-ui.min.js");
getjs("ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.js");
//getjs("js/wangEditor.min.js", true);
getjs("js/layer/layer.js", true);
?>

<script type="text/javascript" src="./lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="./lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="./lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
  <script>
	var opts = {elementPathEnabled : false, wordCount:false, textarea:'content'};
	var editor_intro = UE.getEditor('input_intro',opts);
	var editor_intro_en = UE.getEditor('input_intro_en',opts);
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    let data_old = {},
      data_new = {
      },
      states = [];

    $(function () {
      $("#img_badge").on('error', function (e) {
        $("#img_badge").attr('src',
          'images/nopic.jpg');
      });
      $(".pics-add").on('click', function () {
        $("#file_upload_pics")[0].click();
      });

      $('#input_inst_regional').bootstrapToggle();
      // $(".video-change").on('click', function (e) {
      //   // document.getElementById('file_upload_video').click();
      //   $("#file_upload_video").click();
      // });

      $("#file_upload_badge").on('change', function () {
        const old_src = $("#img_badge").attr('src');
        if (this.files && this.files[0]) {
          const file = this.files[0];
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#img_badge').attr('src', e.target.result);
          }
          uploadFile(file, function (res) {
            try {
              res = JSON.parse(res);
            } catch (e) {
              layer.alert('未知错误：' + res, {
                title: "错误",
                icon: 2
              });
              console.log(res);
              $("#img_badge").attr('src', old_src);
              return;
            }
            if (res.code == 0) {
              const path_old = $("#input_image_path").val().trim();
              if (path_old.length > 0) {
                deletepic(path_old);
              }
              $("#input_image_path").val(res.url);
            } else {
              layer.alert(res.msg, {
                title: "错误",
                icon: 2
              });
              $("#img_badge").attr('src', old_src);
              return;
            }
          });
          reader.readAsDataURL(file);
        };
      });

      $("#file_upload_pics").on("change", function (e) {
        if (this.files) {
          let length = data_old.pics.length;
          [...this.files].forEach(file => {
            let reader = new FileReader();
            reader.onload = function (e) {
              str = `<div class="pics-card uploading" id="pics_card_${length}" data-index="${length}">
                <img class="pics-img" src="${e.target.result}">
                <div class="pics-remove img-remove">删除</div></div>`;
              $("#input_images").prepend(str);
              length++;
              $(".img-remove").off("click");
              $(".img-remove").click(deleteHandle);

              uploadFile(file, function (res) {
                try {
                  res = JSON.parse(res);
                } catch (e) {
                  layer.alert('未知错误：' + res, {
                    title: "错误",
                    icon: 2
                  });
                  console.log(res);
                  $("#pics_card_" + length).remove();
                  return;
                }
                if (res.code == 0) {
                  $("#pics_card_" + length).removeClass("uploading");
                  data_new.pics.push({
                    img: res.url,
                    alt: "",
                  });
                } else {
                  layer.alert(res.msg, {
                    title: "错误",
                    icon: 2
                  });
                  $("#pics_card_" + length).remove();
                  return;
                }
              });
            };
            reader.readAsDataURL(file);
          });
        }
      });

      if (id) {
          $.get(
            "util/course_speOperation?op=4&id=" + id,
            res => {
              res = JSON.parse(res);
              
              $("#img_badge").attr('src', res.image);
              $("#input_title").val(res.title);
              $("#input_title_en").val(res.title_en);
              $("#input_tag").val(res.tag);
              $("#input_tag_en").val(res.tag_en);
              $("#input_sort").val(res.sort);
              $("#input_add_user").val(res.add_user);
              editor_intro.setContent(res.content);
              editor_intro_en.setContent(res.content_en);
              data_old = res;
              initImages(data_old.image);
            }
          );
        }


      $("#btn_save").click(e => {
        data_new.image = $("#input_image_path").val().trim();
        data_new.id = data_old.id;
        data_new.content = editor_intro.getContent();
        data_new.content_en = editor_intro_en.getContent();
        data_new.title = $("#input_title").val().trim();
        data_new.title_en = $("#input_title_en").val().trim();
        data_new.tag = $("#input_tag").val().trim();
        data_new.tag_en = $("#input_tag_en").val().trim();
        data_new.sort = $("#input_sort").val();
        data_new.add_user = $("#input_add_user").val();

       
        if (data_old.id) {
          if (sameValue(data_new.title, data_old.title)) data_new.title = null;
          if (sameValue(data_new.title_en, data_old.title_en)) data_new.title_en = null;
          if (sameValue(data_new.tag, data_old.tag)) data_new.tag = null;
          if (sameValue(data_new.tag_en, data_old.tag_en)) data_new.tag_en = null;
          if (sameValue(data_new.sort, data_old.sort)) data_new.sort = null;
          if (sameValue(data_new.add_user, data_old.add_user)) data_new.add_user = null;
          //if (sameValue(data_new.content, data_old.content)) data_new.content = null;
          //if (sameValue(data_new.content_en, data_old.content_en)) data_new.content_en = null;
          
          if (
            data_new.image.length == 0 &&
            data_new.title == null &&
            data_new.title_en == null &&
            data_new.tag == null &&
            data_new.tag_en == null &&
            data_new.sort == null &&
            data_new.add_user == null &&
            data_new.content == null &&
            data_new.content_en == null 
          ) {
            parent.layer.close(parent.form);
            return;
          }
        }

        $("#btn_save").attr("disabled", "disabled");
        $("#btn_save").addClass("disabled");
        $("#btn_close").attr("disabled", "disabled");
        $("#btn_close").addClass("disabled");
        $("#save_loading").show();
        
        $.post('util/course_speOperation.php?op=7', JSON.stringify(data_new), res => {
          $("#btn_save").removeClass("disabled");
          $("#btn_save").removeAttr("disabled");
          $("#btn_close").removeClass("disabled");
          $("#btn_close").removeAttr("disabled");
          $("#save_loading").hide();
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
        	  parent.refresh();
            parent.layer.close(parent.form);
            //TODO 更新原有的表
          } else {
            layer.alert(res.msg, {
              title: "错误",
              icon: 2
            });
            return;
          }
        });
      });

      $("#btn_close").click(e => {
        parent.refresh();
          parent.layer.close(parent.form);
        
      });

    });

    function samePics(picsA, picsB) {
      if (!picsA && !picsB) return true;
      if (!picsA && picsB.length == 0) return true;
      if (!picsB && picsA.length == 0) return true;
      if (!Array.isArray(picsA)) return false;
      if (!Array.isArray(picsB)) return false;
      if (picsA.length !== picsB.length) return false;
      for (let i = 0; i < picsA.length; i++) {
        if (picsA[i] == null || picsB[i] == null) return false;
        if (picsA[i]['img'] != picsB[i]['img']) return false;
      }
      return true;
    }


    function sameValue(valueA, valueB) {
      if (valueA == null) valueA = "";
      if (valueB == null) valueB = "";
      valueA = valueA.trim();
      valueB = valueB.trim();
      return valueA == valueB;
    }

    function uploadFile(file, callback, progressId, video = false) {
      var formData = new FormData();
      formData.append("fileupload", file);
      const url = video ? 'util/course_speOperation.php?op=9' : 'util/course_speOperation.php?op=5';
      $.ajax({
        url,
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        xhr: function () {
          var xhr = new XMLHttpRequest();
          if (progressId)
            xhr.upload.addEventListener("progress", function (evt) {
              if (evt.lengthComputable) {
                var percentComplete = Math.round(evt.loaded / evt.total * 100);
                percentComplete += '%';
                $("#" + progressId).css("width", percentComplete);
              }
            }, false);
          return xhr;
        },
        success: function (res) {
          callback(res);
        },
        error: function (xhr, status, error) {
          callback(null, error);
        },
        complete: function () {
          if (progressId)
            $("#" + progressId).css("width", "0%");
        }
      });
    }

    function deletepic(pic_path) {
      if (!Array.isArray(pic_path))
        pic_path = [pic_path]
      $.post('util/course_speOperation.php?op=6', {
        path: JSON.stringify(pic_path)
      });
    }

    function deleteHandle(e) {
      const index = $(e.currentTarget).parent().data('index');
      $("#pics_card_" + index).effect('fade', null, 500, e => $("#pics_card_" + index).remove());
      data_new.pics[index] = null;
    }

    function initImages(pics) {
      if (pics && Array.isArray(pics)) {
        for (let i = pics.length - 1; i >= 0; i--) {
          let e = pics[i],
            str = '<div class="pics-card" id="pics_card_' + i + '" data-index="' + i + '">' +
            '<img class="pics-img" src="' + e.img + '">' +
            '<div class="pics-remove img-remove">删除</div></div>';
          $("#input_images").prepend(str);
        }
      }
      $(".img-remove").off("click");
      $(".img-remove").click(deleteHandle);
    }

    
  </script>
</body>

</html>
<?php include "util/checksession.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>添加院校</title>
  <?php

getcss("ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css");
getcss("ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
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
      width: 40%;
      height: 25px;
      margin: auto;
      margin-top: 15px;
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
      margin-left: 197px;
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

    .video-intro {
      height: 278px;
      box-shadow: 1px 1px 15px -5px black;
      margin: auto;
      margin-top: 10px;
      display: block;
    }

    .video-intro.hide {
      display: none;
    }

    .video-add {
      border-color: rgb(201, 216, 219);
      color: rgb(201, 216, 219);
      font-size: 55px;
      border: solid 2px;
      border-radius: 12px;
      width: 50%;
      height: 240px;
      text-align: center;
      vertical-align: middle;
      box-shadow: 1px 1px 15px -5px black;
      margin: auto;
      margin-top: 45px;
      transition: all .3s ease;
    }

    .video-add.hide {
      display: none;
    }

    .video-add:hover {
      opacity: .7;
    }

    .btn.video-change {
      margin: auto;
      display: block;
      margin-top: 10px;
      width: 140px;
      transition: all .3s ease;
    }

    .btn.video-change.hide {
      display: none;
      transition: all .3s ease;
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
        <input class="file-upload" id="input_badge_path" type="hidden" />
      </div>
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">学院名称</span>
      </div>
      <input type="text" class="form-control" aria-label="学院名称" id="input_inst_name">
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">英文名称</span>
      </div>
      <input type="text" class="form-control" aria-label="英文名称" id="input_inst_ename">
    </div>
    <div class="input-group input-select" style="width: 20%;">
      <div class="input-group-prepend">
        <label class="input-group-text" for="input_inst_country">所在国家</label>
      </div>
      <select class="custom-select" id="input_inst_country">
        <option selected>澳大利亚</option>
      </select>
    </div>

    <div class="input-group input-select" style="width: 20%;">
      <div class="input-group-prepend">
        <label class="input-group-text" for="input_inst_state">所在州</label>
      </div>
      <select class="custom-select" id="input_inst_state">
      </select>
    </div>

    <div class="input-group">
      <input type="checkbox" id="input_inst_regional" data-on="偏远地区" data-off="非偏远地区">
    </div>

    <!-- <div class="input-group">
      <div class="input-group-prepend">
        <label class="input-group-text" for="input_inst_state">偏远地区</label>
      </div>
      <input type="checkbox" id="input_inst_regional" data-on="是" data-off="否">
    </div> -->

    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="intro_tab" data-toggle="tab" href="#input_intro" role="tab" aria-controls="intro" aria-selected="true">简介</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " id="description_tab" data-toggle="tab" href="#input_description" role="tab" aria-controls="description"
          aria-selected="true">详细介绍</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="images_tab" data-toggle="tab" href="#input_images" role="tab" aria-controls="images" aria-selected="false">组图</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="video_tab" data-toggle="tab" href="#input_video" role="tab" aria-controls="images" aria-selected="false">视频</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="intro_tab" id="input_intro"></div>
      <div class="tab-pane fade " role="tabpanel" aria-labelledby="description_tab" id="input_description"></div>
      <div class="tab-pane fade " role="tabpanel" aria-labelledby="images_tab" id="input_images" style="height: 342px;overflow: auto;">
        <div class="pics-card pics-add">
          <i class="fa fa-plus" aria-hidden="true"></i>
          <input class="file-upload pics-upload" id="file_upload_pics" type="file" multiple accept="image/*" />
        </div>
      </div>
      <div class="tab-pane fade " role="tabpanel" aria-labelledby="video_tab" id="input_video" style="height: 342px;">
        <div class="video-wrap">
          <video controls class="video-intro hide"> 您的浏览器不能显示视频。 </video>
          <div class="video-add" onclick="document.getElementById('file_upload_video').click();">
            <i class="fa fa-plus" aria-hidden="true" style="font-size:170px;margin-top: 40px;"></i>
          </div>
          <button class="btn btn-primary btn-xl video-change hide" onclick="document.getElementById('file_upload_video').click();">修改</button>
          <div class="progress position-relative progress-upload hide">
            <div class="progress-bar" id="video_progress_bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            <span class="uploading">上传中</span>
          </div>
          <input class="file-upload pics-upload" id="file_upload_video" type="file" accept="video/*" />
          <input class="file-upload" id="input_inst_video" type="hidden" />
        </div>
      </div>
    </div>

    <div style="float: right; margin-top: 15px;">
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
getjs("ajax/libs/jqueryui/1.12.1/jquery-ui.min.js");
getjs("ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.js");
getjs("js/wangEditor.min.js", true);
getjs("js/layer/layer.js", true);
?>
  <script>
    const E = window.wangEditor
    const editor_intro = new E(document.getElementById('input_intro'))
    editor_intro.config.placeholder = '请输入简介';
    editor_intro.create();
    const editor_description = new E(document.getElementById('input_description'))
    editor_description.config.placeholder = '请输入详细介绍';
    editor_description.create();
    const urlParams = new URLSearchParams(window.location.search);
    const inst_id = urlParams.get('inst_id');
    let data_old = {},
      data_new = {
        pics: []
      };

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
              const path_old = $("#input_badge_path").val().trim();
              if (path_old.length > 0) {
                deletepic(path_old);
              }
              $("#input_badge_path").val(res.url);
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
              str = '<div class="pics-card uploading" id="pics_card_' + length + '" data-index="' + length + '">' +
                '<img class="pics-img" src="' + e.target.result + '">' +
                '<div class="pics-remove">删除</div></div>';
              $("#input_images").prepend(str);
              length++;
              $(".pics-remove").off("click");
              $(".pics-remove").click(deleteHandle);

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

      $("#file_upload_video").on("change", function (e) {
        if (this.files && this.files[0]) {
          const MAX_SIZE = 1024 * 1024 * 64;
          const old_src = $(".video-intro").attr('src');
          const file = this.files[0];

          if (file.size > MAX_SIZE) {
            layer.alert("文件太大，请选择小于64M的文件", {
              title: "错误",
              icon: 2
            });
            return;
          }

          $(".video-add").addClass("hide");
          $(".video-change").addClass("hide");
          $(".video-intro").removeClass("hide");
          $(".progress-upload").removeClass("hide");
          var reader = new FileReader();
          reader.onload = function (e) {
            $('.video-intro').attr('src', e.target.result);
            $('.video-intro')[0].play();
          }
          reader.readAsDataURL(file);
          uploadFile(file, function (res, error) {
            $(".video-add").addClass("hide");
            $(".video-change").removeClass("hide");
            $(".progress-upload").addClass("hide");
            if (error) {
              layer.alert('未知错误：' + error, {
                title: "错误",
                icon: 2
              });
              if (old_src) {
                $(".video-intro").attr('src', old_src);
              } else {
                $(".video-add").removeClass("hide");
                $(".video-change").addClass("hide");
                $('.video-intro').removeAttr('src');
                $('.video-intro').addClass("hide");
              }
              return;
            }
            try {
              res = JSON.parse(res);
            } catch (e) {
              layer.alert('未知错误：' + res, {
                title: "错误",
                icon: 2
              });
              if (old_src) {
                $(".video-intro").attr('src', old_src);
              } else {
                $(".video-add").removeClass("hide");
                $(".video-change").addClass("hide");
                $('.video-intro').removeAttr('src');
                $('.video-intro').addClass("hide");
              }

              console.log(res);
              return;
            }
            if (res.code == 0) {
              const video_old = $("#input_inst_video").val().trim();
              if (video_old.length > 0) {
                deletepic(video_old);
              }
              $("#input_inst_video").val(res.url);
            } else {
              layer.alert(res.msg, {
                title: "错误",
                icon: 2
              });
              if (old_src) {
                $(".video-intro").attr('src', old_src);
              } else {
                $(".video-add").removeClass("hide");
                $(".video-change").addClass("hide");
                $('.video-intro').removeAttr('src');
                $('.video-intro').addClass("hide");
              }

              return;
            }
          }, "video_progress_bar");
        }
      });


      $("#btn_save").click(e => {
        data_new.badge = $("#input_badge_path").val().trim();
        data_new.id = data_old.id;
        data_new.description = editor_description.txt.html().trim();
        data_new.intro = editor_intro.txt.html().trim();
        data_new.name = $("#input_inst_name").val().trim();
        data_new.ename = $("#input_inst_ename").val().trim();
        data_new.state_id = $("#input_inst_state").val();
        data_new.video = $("#input_inst_video").val();
        data_new.regional = $("#input_inst_regional")[0].checked ? "1" : "0";

        if (data_old.id) {
          if (sameValue(data_new.name, data_old.name)) data_new.name = null;
          if (sameValue(data_new.ename, data_old.ename)) data_new.ename = null;
          if (sameValue(data_new.state_id, data_old.state_id)) data_new.state_id = null;
          if (sameValue(data_new.description, data_old.description)) data_new.description = null;
          if (sameValue(data_new.intro, data_old.intro)) data_new.intro = null;
          if (sameValue(data_new.regional, data_old.regional)) data_new.regional = null;
          if (samePics(data_new.pics, data_old.pics)) data_new.pics = null;
          if (
            data_new.badge.length == 0 &&
            data_new.video.length == 0 &&
            data_new.name == null &&
            data_new.ename == null &&
            data_new.state_id == null &&
            data_new.description == null &&
            data_new.intro == null &&
            data_new.regional == null &&
            data_new.pics == null
          ) {
            parent.layer.close(parent.form);
            return;
          }
        }

        $.post('util/institutionOperation.php?op=7', JSON.stringify(data_new), res => {
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
        data_new.badge = $("#input_badge_path").val().trim();
        data_new.id = data_old.id;
        data_new.description = editor_description.txt.html().trim();
        data_new.intro = editor_intro.txt.html().trim();
        data_new.name = $("#input_inst_name").val().trim();
        data_new.ename = $("#input_inst_ename").val().trim();
        data_new.state_id = $("#input_inst_state").val();
        data_new.video = $("#input_inst_video").val().trim();
        data_new.regional = $("#input_inst_regional")[0].checked ? "1" : "0";
        if (data_old.id) {
          if (
            data_new.badge.length > 0 ||
            data_new.video.length > 0 ||
            !sameValue(data_new.name, data_old.name) ||
            !sameValue(data_new.ename, data_old.ename) ||
            !sameValue(data_new.state_id, data_old.state_id) ||
            !sameValue(data_new.description, data_old.description) ||
            !sameValue(data_new.intro, data_old.intro) ||
            !sameValue(data_new.regional, data_old.regional) ||
            !samePics(data_new.pics, data_old.pics)
          ) {
            // if (!sameValue(data_new.name, data_old.name)) console.log("name", data_new.name, data_old.name);
            // if (!sameValue(data_new.ename, data_old.ename)) console.log("ename", data_new.ename, data_old.ename);
            // if (!sameValue(data_new.state_id, data_old.state_id)) console.log("state", data_new.state_id, data_old.state_id);
            // if (!sameValue(data_new.description, data_old.description)) {
            //   console.log("des");
            //   console.log(data_new.description);
            //   console.log(data_old.description);
            // }
            // if (!sameValue(data_new.regional, data_old.regional)) console.log("regional", data_new.regional, data_old.regional);
            // if (!sameValue(data_new.intro, data_old.intro)) console.log("intro", data_new.intro, data_old.intro);
            // if (!samePics(data_new.pics, data_old.pics)) console.log("pics", data_new.pics, data_old.pics);
            layer.confirm('关闭后修改不会被保存，确定关闭？', {
              btn: ['关闭', '取消'] //按钮
            }, function () {
              parent.layer.close(parent.form);
              return;
            });
          } else {
            parent.layer.close(parent.form);
          }
        } else {
          parent.layer.close(parent.form);
        }
      });

      $.get("util/institutionOperation?op=1", states => {
        states = JSON.parse(states)
        $("#input_inst_state").html("");
        $("#input_inst_state").html(states.states.map(s => "<option value='" + s.id + "'>" + s.name + "</option>").join(''));
        if (inst_id) {
          $.get(
            "util/institutionOperation?op=4&instid=" + inst_id,
            res => {
              res = JSON.parse(res);
              if (res.video) {
                $(".video-intro").attr('src', res.video);
                $(".video-intro").removeClass("hide");
                $(".video-add").addClass("hide");
                $(".video-change").removeClass("hide");
              }
              $("#img_badge").attr('src', (res.badge.split('')[0] == '/') ? res.badge : ('/' + res.badge));
              $("#input_inst_name").val(res.name);
              $("#input_inst_ename").val(res.ename);
              $("#input_inst_state>option").each((i, e) => {
                e.removeAttribute("selected");
                if (e.value == res.state_id)
                  e.setAttribute('selected', 'selected');
              });
              res.regional > 0 ? $("#input_inst_regional").bootstrapToggle('on') : $("#input_inst_regional").bootstrapToggle('off');
              editor_description.txt.html(res.description);
              editor_intro.txt.html(res.intro);
              data_old = res;
              data_new.pics = [...res.pics];
              initImages(data_old.pics);
            }
          );
        }
      })
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

    function uploadFile(file, callback, progressId) {
      var formData = new FormData();
      formData.append("fileupload", file);
      $.ajax({
        url: 'util/institutionOperation.php?op=5',
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
      $.post('util/institutionOperation.php?op=6', {
        path: JSON.stringify(pic_path)
      });
    }

    function deleteHandle(e) {
      const index = $(e.currentTarget).parent().data('index');
      $("#pics_card_" + index).effect('fade', null, 500, e => $("#pics_card_" + index).remove());
      data_new.pics[index] = null;
      console.log(data_old);
      console.log(data_new);
    }

    function initImages(pics) {
      if (pics && Array.isArray(pics)) {
        for (let i = pics.length - 1; i >= 0; i--) {
          let e = pics[i],
            str = '<div class="pics-card" id="pics_card_' + i + '" data-index="' + i + '">' +
            '<img class="pics-img" src="' + e.img + '">' +
            '<div class="pics-remove">删除</div></div>';
          $("#input_images").prepend(str);
        }
      }
      $(".pics-remove").off("click");
      $(".pics-remove").click(deleteHandle);
    }
  </script>
</body>

</html>
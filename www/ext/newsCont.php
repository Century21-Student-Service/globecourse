  <?php

  //检测文档正确性
  $row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE id=$id");
  if(is_array($row))
  {
      //增加一次点击量
      $dosql->ExecNoneQuery("UPDATE `#@__infolist` SET hits=hits+1 WHERE id=$id");
	 
	  $newsTit=$row['title'];
	  $time=GetDateTime($row['posttime']);
	  $hits=$row['hits'];
	  $author=$row['author'];
	  if($row['content'] != '')
		 $cont=GetContPage($row['content']);
	  else
		 $cont='网站资料更新中...';

  	 //获取上一篇信息
	 $r = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=".$row['classid']." AND orderid<".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
	  if($r < 1)
	  {
		 $per= '上一篇：已经没有了';
	  }
	  else
	  {
		  if($cfg_isreurl != 'Y')
			  $gourl = 'newsshow.php?cid='.$r['classid'].'&id='.$r['id'];
		  else
			  $gourl = 'newsshow-'.$r['classid'].'-'.$r['id'].'-1.html';
  
		 $per= '上一篇：<a href="'.$gourl.'">'.$r['title'].'</a>';
	  }
				
	  //获取下一篇信息
	  $r = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=".$row['classid']." AND orderid>".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid ASC");
	  if($r < 1)
	  {
		  $next= '下一篇：已经没有了';
	  }
	  else
	  {
		  if($cfg_isreurl != 'Y')
			  $gourl = 'newsshow.php?cid='.$r['classid'].'&id='.$r['id'];
		  else
			  $gourl = 'newsshow-'.$r['classid'].'-'.$r['id'].'-1.html';

		  $next= '下一篇：<a href="'.$gourl.'">'.$r['title'].'</a>';
	  }

	  $pagebar=$per."<br />".$next;
	  
 }
?>
  
  <div class="NewsTit"><?php echo($newsTit);?></div>
  <div class="NewsBar"><?php echo("发布时间：".$time." &nbsp;&nbsp;|&nbsp;&nbsp; 点击：".$hits." &nbsp;&nbsp;|&nbsp;&nbsp; 作者：".$author);?></div>
  <div class="NewsBody"><?php echo($cont);?></div>
  <div class="PageBar"><?php echo($pagebar);?></div>
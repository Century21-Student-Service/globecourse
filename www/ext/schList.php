
	<?php
	    
		$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND school='".$id."' AND checkinfo=true ORDER BY orderid DESC",5);
        while($row = $dosql->GetArray())
			{			
				if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
				else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
				else $gourl = $row['linkurl'];

				$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
				if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
				else $gourl2 = 'news-'.$row['classid'].'-1.html';
			?>
            <li>
               <div class="Tit"><a href="<?php echo $gourl; ?>" style="color:<?php echo $row['colorval']; ?>;font-weight:<?php echo $row['boldval']; ?>;"><?php echo($row['title']);?></a></div>
               <div class="Cont"><?php echo(ReStrLen($row['description'],154));?></div>
              <div class="Txt"><div class="R1"><a href="newsshow.php?cid=<?php echo($id);?>&id=<?php echo($row['id']);?>">查看详情</a></div><?php echo GetDateTime($row['posttime']); ?></div>
            </li>
            
	<?php
	  }
	?>
<div style=" clear:both"></div>




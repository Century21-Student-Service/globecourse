
	<?php
	    
		$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",$cfg_pagenum);
        while($row = $dosql->GetArray())
			{			
				if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
				else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
				else $gourl = $row['linkurl'];

				$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
				if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
				else $gourl2 = 'news-'.$row['classid'].'-1.html';
			?>
            <li><span class="R1"><?php echo GetDateMk($row['posttime']); ?></span><a href="<?php echo $gourl; ?>" style="color:<?php echo $row['colorval']; ?>;font-weight:<?php echo $row['boldval']; ?>;"><?php echo($row['title']);?></a></li>
            
	<?php
	  }
	?>
<div style=" clear:both"></div>



